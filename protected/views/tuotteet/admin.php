<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'listaa tuotteet', 'url'=>array('index')),
	array('label'=>'Lisää uusi tuote', 'url'=>array('create')),
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

<h1>Hallitse tuotteita</h1>


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
		//'time',
		'nimi',
		//'merkki',
		//'malli',
		'hinta',
		'url_osoite',
		/*

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
