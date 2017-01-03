<?php
/* @var $this ProjektitController */
/* @var $data Projektit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nimike')); ?>:</b>
	<?php echo CHtml::encode($data->nimike); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontentti')); ?>:</b>
	<?php echo CHtml::encode($data->kontentti); ?>
	<br />


</div>