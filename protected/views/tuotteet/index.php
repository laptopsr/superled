<?php
/* @var $this TuotteetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tuotteets',
);

$this->menu=array(
	array('label'=>'Lisää uusi tuote', 'url'=>array('create')),
	array('label'=>'Hallitse tuotteita', 'url'=>array('admin')),
);
?>

<h1>Tuotteet</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
