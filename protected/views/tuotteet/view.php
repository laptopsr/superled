<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tuotteet', 'url'=>array('index')),
	array('label'=>'Create Tuotteet', 'url'=>array('create')),
	array('label'=>'Update Tuotteet', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tuotteet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tuotteet', 'url'=>array('admin')),
);
?>

<h1>View Tuotteet #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		'nimi',
		'merkki',
		'malli',
		'url_osoite',
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
	),
)); ?>
