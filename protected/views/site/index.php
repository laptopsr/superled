<?php
/* @var $this SiteController */
?>
<br>
<div id="etusivu">

 <div class="row"><!-- row-->
<!-- Admin -->
<?php if(!Yii::app()->user->isGuest and Yii::app()->user->isAdmin()) : ?>

	 <!--laatiko alka-->
	 <div class="col-sm-4">
	  <?php echo CHtml::link('Tuotteet',Yii::app()->request->baseUrl.'/index.php/tuotteet/admin',
			array('class'=>'painike btn btn-primary btn-block btn-lg')); 
	  ?>
	 </div>
	 <!--laatiko loppu-->

	 <!--laatiko alka-->
	 <div class="col-sm-4">
	  <?php echo CHtml::link('Uusi valaistussuunnitelma',Yii::app()->request->baseUrl.'/index.php/site/valaistus_suunnitelma',
			array('class'=>'painike btn btn-primary btn-block btn-lg')); 
	  ?>
	 </div>
	 <!--laatiko loppu-->

	 <!--laatiko alka-->
	 <div class="col-sm-4">
	  <?php echo CHtml::link('Valaistussuunnitelmat',Yii::app()->request->baseUrl.'/index.php/projektit/admin',
			array('class'=>'painike btn btn-primary btn-block btn-lg')); 
	  ?>
	 </div>
	 <!--laatiko loppu-->
<br><br><br>
	 <!--laatiko alka-->
	 <div class="col-sm-4">
	  <?php echo CHtml::link('Tarjoukset',Yii::app()->request->baseUrl.'/index.php/site/valaistus_suunnitelma',
			array('class'=>'painike btn btn-primary btn-block btn-lg')); 
	  ?>
	 </div>
	 <!--laatiko loppu-->


<?php endif; ?>
<!-- Admin -->




 </div><!-- row-->
</div><!-- etusivu -->



	
