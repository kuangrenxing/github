<?php


Yii::import("admin.models.*");

class DefaultController extends Controller
{
    public  function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'=>array('login','error','contact','test','price'),
                'users'=>array('*'),
            ),
            array(
                'allow',
                'actions'=>array('index','logout','like'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $top=Yii::app()->top;

        $cs=Yii::app()->getClientScript();
        $req = new VasSubscribeGetRequest;
        $req->setNick(Yii::app()->user->getName());
        $req->setArticleCode("ts-12230");
        $resp =$top->execute($req,Yii::app()->user->getId());
        
        $this->render('index',array(
            'deadline'=>isset($resp->article_user_subscribes->article_user_subscribe[0]->deadline) ? $resp->article_user_subscribes->article_user_subscribe[0]->deadline : '暂时无法取得到期时间',
            'topActiveUsers'=>User::getTopActiveUsers(),
        	'postItems'=>Post::getItems(),
        ));

    }

    public function actionTest()
    {


        //$dapei->template_id = 2;
        //$dapei->html ="aaa";
        $desc = "start<div title=\"xdb-2-2-685dc96319384034c79c1694c09ed7d1\">dasfasdfasdf</div>end";
      
		$doc = new simple_html_dom();
        $doc->load($desc);
		$div = $doc->find('div[title]',0);
		
		
		if(preg_match('/^xdb(\-[\d+]{1}){1,2}\-[\w+]{32}$/', $div->attr['title']))
			$div->outertext ='';
		//var_dump($div->attr['title']);
		//exit;
		// 
		
		$desc = (string) $doc;
		echo $desc;
        exit;


        $top=Yii::app()->top;

        $req = new PromotionLimitdiscountGetRequest;
        //$req->setLimitDiscountId(0);
        //$req->setStatus("DOING");
        //$req->setStartTime("2000-01-01 00:00:00");
        //$req->setEndTime("2000-01-01 00:00:00");
        $req->setPageNumber(1);
        //$resp = $c->execute($req, $sessionKey);
        $resp =$top->execute($req,Yii::app()->user->getId());

        var_dump($resp);
        exit;
    } 
    /*
     */

    public function actionError()
    {
        $this->layout='//layouts/column1';
        $error=Yii::app()->errorHandler->error;
        $flash=Yii::app()->user->getFlash('ErrorMsg');
        if($flash)
        {
            if($flash['code']==27 || $flash['code']==26)
            {
                //session 失效
                if(!Yii::app()->user->isGuest)
                {
                    Yii::app()->user->logout();
                    $this->redirect(array('login'));
                }
            }
            $error=$flash;
        }

        if($error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
        else
        {
            $this->redirect(array('index'));
        }

    }

    public function actionLogin()
    {
        if(!empty($_GET))
        {
         $this->_processCallBack();
        }

        if(Yii::app()->user->isGuest)
        {
         $this->redirect(Yii::app()->top->getAuthUrl());
        }
         $this->redirect(array('index'));
    }

    public function actionLogout()
    {
        Yii::app()->getSession()->regenerateID();
        Yii::app()->user->logout();
        $this->redirect('https://login.taobao.com/member/logout.jhtml?f=top');
    }

    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $userInfo = "\r\n From: nick:".Yii::app()->user->name. " user_id:".Yii::app()->user->getState('user_id'); 
            $model->attributes=$_POST['ContactForm'];
            $model->email = Yii::app()->user->getState('email');
            $model->body .= $userInfo;
            if($model->validate())
            {
                //$headers="From: {$model->email}\r\nReply-To: {$model->email}";
                $headers="From: noreply@xindianbao.com\r\nReply-To: noreply@xindianbao.com\r\n";
		$headers.= 'Content-type: text/html; charset=utf-8'. "\r\n"; 
		mail(Yii::app()->params['adminEmail'],"=?UTF-8?B?".base64_encode($model->subject)."?=",$model->body,$headers);
                Yii::app()->user->setFlash('contact','感谢您的反馈,我们将尽快做出答复');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    public function actionLike()
    {
        if(isset($_GET['template']))
        {
            echo CJSON::encode(UserLike::like((int) $_GET['template']));
            Yii::app()->end();
        }
    }

    public function actionPrice()
    {
        $this->render('price');
    }

    private function _processCallBack()
    {
        $token = Yii::app()->top->getCallbackResponse($_GET);
        if ($token !== false)
        {
            $sessionKey=$token['sessionKey'];
            $name=$token['visitor_nick'];
            $req = new UserGetRequest;
            $req->setFields("user_id,uid,sex,nick,email,seller_credit,buyer_credit,location,created,last_visit,birthday,type,consumer_protection,alipay_account,alipay_no,avatar, liangpin,sign_food_seller_promise,is_lighting_consignment,vip_info,vertical_market");
            $req->setNick($name);
            $resp = Yii::app()->top->execute($req,$sessionKey);
            if (!$resp)
            {
                $msg = '连接淘宝出错,确保你的登录正确!'; 
                Yii::log($msg,CLogger::LEVEL_ERROR);
                Yii::app()->user->setFlash('ErrorMsg',array('code'=>500,'message'=>$msg));
                $this->redirect(array('error'));
            }

            $req = new ShopGetRequest;
            $req->setFields("sid,cid,title,nick,pic_path,created,modified,shop_score,remain_count,all_count,used_count");
            $req->setNick($name);
            $resshop = Yii::app()->top->execute($req);
            if (!$resshop || !isset($resshop->shop))
            {
                $msg = '连接淘宝出错,确保你已经开设了淘宝店铺!'; 
                Yii::app()->user->setFlash('ErrorMsg',array('code'=>500,'message'=>$msg));
                $this->redirect(array('error'));
            }
            //Yii::app()->getSession()->regenerateID();
            Yii::app()->user->setState('user_id',$resp->user->user_id);
            Yii::app()->user->setState('shop_url','http://shop'.$resshop->shop->sid.'.taobao.com');
            Yii::app()->user->setId($sessionKey);
            Yii::app()->user->setName($name);
            Yii::app()->user->setState('email',$resp->user->email);
            
            $this->_setUserGrade($name,$sessionKey);
            $this->_setUserInfo($resp->user,$resshop->shop);
            $this->_setSessionKey($name,$sessionKey);
        }
        else
        {
            $msg = '淘宝认证失败';
            Yii::app()->user->setFlash('ErrorMsg', $msg);
            $this->redirect(array('error'));
        }
    }
	
    private function _setUserInfo($userInfo,$shopInfo)
    {
        Yii::app()->user->setState('info',$userInfo); 
        $user = User::model()->findByPk($userInfo->user_id);
        $user = $user?$user:(new User);
        $user = User::setUserInfoFromTop($user,$userInfo,$shopInfo);
        Yii::app()->user->setState('betaUser',(in_array($userInfo->nick,Yii::app()->params['betaUserNicks'])?true:false));
        $user->last_login=time();
        $user->login_count=$user->login_count+1;
       	
        if(!$user->save()){
            Yii::log(implode(' - ', array($user->attributes,$user->errors)), CLogger::LEVEL_ERROR);
        }
    
    }

    private function _setUserGrade($nick,$sessionKey)
    {
        $req = new VasSubscribeGetRequest;
        $req->setNick($nick);
        $req->setArticleCode("ts-12230");
        $resp = Yii::app()->top->execute($req,$sessionKey);
        $serviceList = isset($resp->article_user_subscribes->article_user_subscribe)?($resp->article_user_subscribes->article_user_subscribe):array();
        $grade=0;
        forEach($serviceList as $service)
        {
            if(isset($service->item_code))
            {
                switch($service->item_code)
                {
                case 'ts-12230-1':
                    $grade=($grade>0)?$grade:0;
                    break;
                case 'ts-12230-5':
                    $grade=($grade>1)?$grade:1;
                    break;
                }
            }
        }
        Yii::app()->user->setState('serviceList',$serviceList);
        Yii::app()->user->setState('grade',$grade);
    }

    private function _setSessionKey($nick,$topSessionKey)
    {
        $sessionKey = SessionKey::model()->findByAttributes(array('user_id'=>Yii::app()->user->getState('user_id')));
        $sessionKey = $sessionKey?$sessionKey:(new SessionKey); 
        $sessionKey->id          = Yii::app()->session->sessionID;
        $sessionKey->nick        = $nick;
        $sessionKey->user_id     = Yii::app()->user->getState('user_id');
        $sessionKey->app_key     = Yii::app()->top->appkey;
        $sessionKey->top_session_key = $topSessionKey;
        
        if(!$sessionKey->save())
        {
            $message = array(
                'nick'   => $nick,
                'errors' => $sessionKey->errors,
            );
            XLogger::xlog($message,'warning','pepsi.controller.default.setSessionKey.save');
        }
    
    }
}
