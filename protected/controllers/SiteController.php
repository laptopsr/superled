<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
            		'yiichat'=>array('class'=>'YiiChatAction'),
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('valaistus_suunnitelma', 'uusi_projekti', 'hyppa_projektin'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$this->render('index', array(
		));
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionUusi_projekti()
	{

		if(isset($_POST['kontentti']) and isset($_POST['id']) and !empty($_POST['id']))
		{
			$model = Projektit::model()->updateByPk($_POST['id'], array('kontentti'=>$_POST['kontentti'], 'jpeg_data'=>$_POST['jpeg_data']));
		}

	}

	public function actionHyppa_projektin()
	{

		if(isset($_POST['id']))
		{
			$model = Projektit::model()->findByPk($_POST['id']);
			if(isset($model->id))
			{
				$arr = array(
					'kontentti'=>$model->kontentti,
					/*
					'nimike'=>$model->nimike,
					'asiakkaan_nimi'=>$model->asiakkaan_nimi,
					'asiakkaan_sahkoposti'=>$model->asiakkaan_sahkoposti,
					'asiakkaan_osoite'=>$model->asiakkaan_osoite,
					'asiakkaan_postinumero'=>$model->asiakkaan_postinumero,
					'asiakkaan_postitoimipaikka'=>$model->asiakkaan_postitoimipaikka,
					'asiakkaan_puhelinnumero'=>$model->asiakkaan_puhelinnumero,
					*/
					'pohjakuva'=>$model->pohjakuva,
				);
				echo json_encode($arr);
			}
		}

	}



	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionValaistus_suunnitelma()
	{

		$projekti = new Projektit;
		if(isset($_GET['id']))
		$projekti = Projektit::model()->findByPk($_GET['id']);


		if(isset($_GET['pdf']) and !empty($projekti->kontentti))
		{
		  $html = '<style>
body{
	margin: 0;
}
#dropLaatikko, #resultIkonista{
	width: 700px;
}
#pohjakuva{
	width: 100%;
	height: auto;
}
.dragLaatikko img, .dropped img{
	width: 20px;
}
</style>';

		  $html .= '<img src='.$projekti->jpeg_data.'>';

	          $html2pdf = Yii::app()->ePdf->HTML2PDF('P', 'A4', 'en');
		  $html2pdf->setDefaultFont('Arial');
	          $html2pdf->WriteHTML($html);
	          $html2pdf->Output();
		  exit;
		}



		$this->render('valaistus_suunnitelma', array('projekti'=>$projekti));
	}


}
