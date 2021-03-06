<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo "CustomController\n"; ?>
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new <?php echo $this->modelClass; ?>;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['<?php echo $this->modelClass; ?>'])  && COMMONFUNCTION::_isTokenValid("<?php echo $this->class2id($this->modelClass); ?>-form", $_POST))
		{
			$model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if ($model->save()) {
                            Yii::app()->user->setFlash('success', Yii::t('app', 'insert.success'
                                            , array(
                                        '{module}' => Yii::t('app', 'label.<?php echo $this->modelClass; ?>'),
                                        '{name}' => $model->id
                            )));
                            $this->redirect(array('index'));
                        }
		}
                COMMONFUNCTION::_setTokenFormField('<?php echo $this->class2id($this->modelClass); ?>-form');
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['<?php echo $this->modelClass; ?>']) && COMMONFUNCTION::_isTokenValid("<?php echo $this->class2id($this->modelClass); ?>-form", $_POST))
		{
			$model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if ($model->save()) {
                            Yii::app()->user->setFlash('success', Yii::t('app', 'update.success'
                                            , array(
                                        '{module}' => Yii::t('app', 'label.<?php echo $this->modelClass; ?>'),
                                        '{name}' => $model->id
                            )));
                            $this->redirect(array('index'));
                        }
		}
                COMMONFUNCTION::_setTokenFormField('<?php echo $this->class2id($this->modelClass); ?>-form');
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest  && Yii::app()->request->isAjaxRequest)
		{
			// we only allow deletion via POST request
			$message = "";
                        $status = COMMONCONSTANT::FALSE_STATUS;
                        try {
                            $model = $this->loadModel($id);
                            $model->delete();
                            $status = COMMONCONSTANT::TRUE_STATUS;
                            $message = Yii::t('app', 'delete.success', array("{module}" => Yii::t('app', 'label.<?php echo $this->modelClass; ?>'), "{name}" => $id));
                        } catch (Exception $exc) {
                            $message = Yii::t('app', 'delete.fail', array("{module}" => Yii::t('app', 'label.<?php echo $this->modelClass; ?>'), "{name}" => $id));
                        }

                        $data = array(
                            'status' => $status,
                            'message' => $message,
                        );
                        echo json_encode($data);

			// if AJAX request (triggered by deletion via index grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
			//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,Yii::t('app', 'ajax.request.warning'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();  // clear any default values
		if(Yii::app()->request->isAjaxRequest && isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes=$_GET['<?php echo $this->modelClass; ?>'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=<?php echo $this->modelClass; ?>::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, Yii::t('app', 'request.not.exist'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
