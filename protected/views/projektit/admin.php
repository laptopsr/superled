<?php
/* @var $this ProjektitController */
/* @var $model Projektit */

$this->breadcrumbs=array(
	'Projektits'=>array('index'),
	'Manage',
);

//$this->menu=array(
	//array('label'=>'List Projektit', 'url'=>array('index')),
	//array('label'=>'Create Projektit', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#projektit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Valaistussuunnitelmat</h1>




<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projektit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'time',
		'nimike',
		//'kontentti',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
