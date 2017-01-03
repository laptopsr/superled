<?php
/* @var $this ProjektitController */
/* @var $model Projektit */

$this->breadcrumbs=array(
	'Projektits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Projektit', 'url'=>array('index')),
	array('label'=>'Create Projektit', 'url'=>array('create')),
	array('label'=>'View Projektit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Projektit', 'url'=>array('admin')),
);
?>

<h1>Update Projektit <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>