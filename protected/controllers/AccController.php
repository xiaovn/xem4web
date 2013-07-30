<?php

class AccController extends Controller
{
	public function actionTaoMoi()
	{
        $acc = new Account();
        if(isset($_POST['Account']))
        {
            $acc->attributes = $_POST['Account'];
            if($acc->validate())
            {
                if($acc->save())
                {
                    Yii::app()->user->setFlash("ThanhCong",'Cám Ơn Đã Đăng Ký');
                    $this->redirect($this->render('thank'));
                }
            }

        }
        $this->render('TaoMoi',array("acc"=>$acc));
	}
    public function actionDangNhap()
    {
        $acc = new Account();
        if(isset($_POST['Account']))
        {
            $acc->attributes = $_POST['Account'];
            if($acc->login())
            {
                $this->redirect('index.php');
            }
        }
        $this->render('DangNhap',array("acc"=>$acc));

    }
    public function actionIndex()
	{
		$this->render('index');
	}

	// -----------------------------------------------------------
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