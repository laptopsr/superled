<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tuotteet', 'url'=>array('index')),
	array('label'=>'Create Tuotteet', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tuotteet-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tuotteets</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tuotteet-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'time',
		'nimi',
		'merkki',
		'malli',
		'url_osoite',
		/*
		'hinta',
		'vari',
		'valon_maara',
		'teho',
		'jannite',
		'lampun_koko',
		'avauskulma',
		'himmennettava',
		'lisatiedot',
		'icon_tiedoston_nimi',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
