<?php
/* @var $this ProjektitController */
/* @var $model Projektit */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">
  <div class="panel-heading">Uusi projekti</div>
  <div class="panel-body">


<div class="form row">
 <div class="col-sm-4">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tuotteet-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'nimike'); ?>
		<?php echo $form->textField($model,'nimike',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nimike'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiakkaan_nimi'); ?>
		<?php echo $form->textField($model,'asiakkaan_nimi',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'asiakkaan_nimi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiakkaan_sahkoposti'); ?>
		<?php echo $form->textField($model,'asiakkaan_sahkoposti',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'asiakkaan_sahkoposti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiakkaan_osoite'); ?>
		<?php echo $form->textField($model,'asiakkaan_osoite',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'asiakkaan_osoite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiakkaan_postinumero'); ?>
		<?php echo $form->numberField($model,'asiakkaan_postinumero',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'asiakkaan_postinumero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiakkaan_postitoimipaikka'); ?>
		<?php echo $form->textField($model,'asiakkaan_postitoimipaikka',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'asiakkaan_postitoimipaikka'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiakkaan_puhelinnumero'); ?>
		<?php echo $form->textField($model,'asiakkaan_puhelinnumero',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'asiakkaan_puhelinnumero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pohjakuva'); ?>
		<?php echo $form->fileField($model,'pohjakuva'); ?>
		<?php echo $form->error($model,'pohjakuva'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Luo' : 'Tallenna', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
 </div>
</div><!-- form -->


  </div>
</div>
