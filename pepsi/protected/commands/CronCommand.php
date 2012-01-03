<?php

class CronCommand extends CConsoleCommand
{

    public function __construct($name,$runner)
    {
        parent::__construct($name,$runner);

    }

    public function actionIndex()
    {
        echo $this->help;
    }
    
    public function actionQueueSync()
    {
        $result = @file_get_contents(Yii::app()->params['siteUrl'].'da/queue/sync');
        var_dump($result);
    } 

    public function actionSessionKeepAlive()
    {
        SessionKey::keepAlive();
    }

    public function actionUserLikeUpdate()
    {
        $dbCommand = Yii::app()->db->createCommand("
            SELECT template_id,count(*) as count from user_like group by template_id");
        $counts =$dbCommand->queryAll();
        foreach($counts as $count)
        {
            $template = Template::model()->findByPk($count['template_id']); 
            $template->like_count = $count['count'];
            $template->save();
        }
    
        $dbCommand = Yii::app()->db->createCommand("
            SELECT template_id,count(*) as count from meal group by template_id");
        $counts =$dbCommand->queryAll();
        foreach($counts as $count)
        {
            $template = Template::model()->findByPk($count['template_id']); 
            $template->user_count = $count['count'];
            $template->save();
        } 

    }
    
    public function actionSessionClearTimeout()
    {
	echo date('Y-m-d H:m:s');
        var_dump(SessionKey::ClearTimeout());
    }  

}




?>
