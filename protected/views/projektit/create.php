<?php
/* @var $this ProjektitController */
/* @var $model Projektit */

$this->breadcrumbs=array(
	'Projektits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Projektit', 'url'=>array('index')),
	array('label'=>'Manage Projektit', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
