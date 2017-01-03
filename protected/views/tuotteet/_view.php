<?php
/* @var $this TuotteetController */
/* @var $data Tuotteet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nimi')); ?>:</b>
	<?php echo CHtml::encode($data->nimi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merkki')); ?>:</b>
	<?php echo CHtml::encode($data->merkki); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('malli')); ?>:</b>
	<?php echo CHtml::encode($data->malli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_osoite')); ?>:</b>
	<?php echo CHtml::encode($data->url_osoite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hinta')); ?>:</b>
	<?php echo CHtml::encode($data->hinta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vari')); ?>:</b>
	<?php echo CHtml::encode($data->vari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valon_maara')); ?>:</b>
	<?php echo CHtml::encode($data->valon_maara); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teho')); ?>:</b>
	<?php echo CHtml::encode($data->teho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jannite')); ?>:</b>
	<?php echo CHtml::encode($data->jannite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampun_koko')); ?>:</b>
	<?php echo CHtml::encode($data->lampun_koko); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avauskulma')); ?>:</b>
	<?php echo CHtml::encode($data->avauskulma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('himmennettava')); ?>:</b>
	<?php echo CHtml::encode($data->himmennettava); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lisatiedot')); ?>:</b>
	<?php echo CHtml::encode($data->lisatiedot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icon_tiedoston_nimi')); ?>:</b>
	<?php echo CHtml::encode($data->icon_tiedoston_nimi); ?>
	<br />

	*/ ?>

</div>