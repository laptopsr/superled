<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tuotteet', 'url'=>array('index')),
	array('label'=>'Manage Tuotteet', 'url'=>array('admin')),
);
?>

<h1>Create Tuotteet</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>