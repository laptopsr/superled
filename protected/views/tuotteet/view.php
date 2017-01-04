<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */

$this->breadcrumbs=array(
	'Tuotteets'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Tuotteet', 'url'=>array('index')),
	array('label'=>'Lisää uusi tuote', 'url'=>array('create')),
	array('label'=>'Muokkaa tuotetta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Poista tuote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Haluatko varmasti poistaa tuotteen pysyvästi?')),
	array('label'=>'Hallitse tuotteita', 'url'=>array('admin')),
);
?>

<h1>Tuote #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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
	),
)); ?>
