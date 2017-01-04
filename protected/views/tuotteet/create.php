<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Tuotteet', 'url'=>array('index')),
	array('label'=>'Hallitse tuotteita', 'url'=>array('admin')),
);
?>

<h1>Luo uusi tuote</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
