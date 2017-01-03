<?php
/* @var $this TuotteetController */
/* @var $model Tuotteet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tuotteet-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'nimi'); ?>
		<?php echo $form->textField($model,'nimi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nimi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merkki'); ?>
		<?php echo $form->textField($model,'merkki',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'merkki'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'malli'); ?>
		<?php echo $form->textField($model,'malli',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'malli'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_osoite'); ?>
		<?php echo $form->textField($model,'url_osoite',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'url_osoite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hinta'); ?>
		<?php echo $form->textField($model,'hinta'); ?>
		<?php echo $form->error($model,'hinta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vari'); ?>
		<?php echo $form->textField($model,'vari',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'vari'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valon_maara'); ?>
		<?php echo $form->textField($model,'valon_maara',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'valon_maara'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teho'); ?>
		<?php echo $form->textField($model,'teho',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'teho'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jannite'); ?>
		<?php echo $form->textField($model,'jannite',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jannite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampun_koko'); ?>
		<?php echo $form->textField($model,'lampun_koko',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lampun_koko'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avauskulma'); ?>
		<?php echo $form->textField($model,'avauskulma',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'avauskulma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'himmennettava'); ?>
		<?php echo $form->textField($model,'himmennettava',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'himmennettava'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lisatiedot'); ?>
		<?php echo $form->textArea($model,'lisatiedot',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'lisatiedot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icon_tiedoston_nimi'); ?>
		<?php echo $form->fileField($model,'icon_tiedoston_nimi'); ?>
		<?php echo $form->error($model,'icon_tiedoston_nimi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
