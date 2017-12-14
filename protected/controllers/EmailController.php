<?php

class EmailController extends Controller
{
	public function actionIndex()
	{
	    $success = false;
	    $model = new EmailForm();
	    if (!empty($_POST['EmailForm']))
        {
            $model->setAttributes($_POST['EmailForm']);
            if ($model->validate())
            {
                $success = true;
            }
        }
		$this->render('index', array(
		    'model' => $model,
            'success' => $success,
        ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}