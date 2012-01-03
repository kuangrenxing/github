<?php 

class CAdminAccessControlFilter extends CAccessControlFilter  

{  

    protected function preFilter($filterChain)  
    {  

        $app=Yii::app();  

        $request=$app->getRequest();  

        $user = Yii::app()->admin;  
	
        $verb=$request->getRequestType();  

        $ip=$request->getUserHostAddress();  

      

        foreach($this->getRules() as $rule)  

        {  

            if(($allow=$rule->isUserAllowed($user,$filterChain->controller,$filterChain->action,$ip,$verb))>0) // allowed  

                break;  

            else if($allow<0) // denied  

            {  

                $this->accessDenied($user, "未被授权进行该操作!");  

                return false;  

            }  

        }  

        return true;  

    }  

} 

?>