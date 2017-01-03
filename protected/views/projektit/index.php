<?php
/* @var $this ProjektitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projektits',
);

$this->menu=array(
	array('label'=>'Create Projektit', 'url'=>array('create')),
	array('label'=>'Manage Projektit', 'url'=>array('admin')),
);
?>

<h1>Projektits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
