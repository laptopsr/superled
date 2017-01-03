<?php
/* @var $this SiteController */
?>
<br>
<div id="etusivu">

 <div class="row"><!-- row-->
<!-- Admin -->
<?php if(!Yii::app()->user->isGuest and Yii::app()->user->isAdmin()) : ?>

	 <!--laatiko alka-->
	 <div class="col-sm-3">
	  <?php echo CHtml::link('Tuotteet',Yii::app()->request->baseUrl.'/index.php/tuotteet',
			array('class'=>'painike btn btn-primary btn-block btn-lg')); 
	  ?>
	 </div>
	 <!--laatiko loppu-->

	 <!--laatiko alka-->
	 <div class="col-sm-3">
	  <?php echo CHtml::link('Uusi valaistussuunnitelma',Yii::app()->request->baseUrl.'/index.php/site/valaistus_suunnitelma',
			array('class'=>'painike btn btn-primary btn-block btn-lg')); 
	  ?>
	 </div>
	 <!--laatiko loppu-->


<?php endif; ?>
<!-- Admin -->




 </div><!-- row-->
</div><!-- etusivu -->



	
