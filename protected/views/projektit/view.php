<?php
/* @var $this ProjektitController */
/* @var $model Projektit */

$this->breadcrumbs=array(
	'Projektits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Projektit', 'url'=>array('index')),
	array('label'=>'Create Projektit', 'url'=>array('create')),
	array('label'=>'Update Projektit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Projektit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projektit', 'url'=>array('admin')),
);
?>

<h1>View Projektit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		'nimike',
		'kontentti',
	),
)); ?>
