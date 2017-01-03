<?php
/* @var $this TuotteetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tuotteets',
);

$this->menu=array(
	array('label'=>'Create Tuotteet', 'url'=>array('create')),
	array('label'=>'Manage Tuotteet', 'url'=>array('admin')),
);
?>

<h1>Tuotteets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
