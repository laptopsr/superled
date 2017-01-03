<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tuotteet', 'url'=>array('index')),
	array('label'=>'Create Tuotteet', 'url'=>array('create')),
	array('label'=>'View Tuotteet', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tuotteet', 'url'=>array('admin')),
);
?>

<h1>Update Tuotteet <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>