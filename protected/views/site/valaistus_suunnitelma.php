<?php
/* @var $this SiteController */
?>
<input type="hidden" id="projekti_id" value="<?php echo $projekti->id; ?>">
<style>
body{
  overflow-x: hidden;
  overflow-y: scroll;
}
#dropLaatikko, #resultIkonista{
	width: 700px;
}
#pohjakuva{
	width: 100%;
	height: 100%;
}
.dragLaatikko{
	/*margin-bottom: 5px;*/
}
.dragLaatikko img, .dropped img{
	width: 20px;
}
</style>

<br>
<div id="etusivu">

 <div class="row">

  <div class="col-sm-8">


   <div id="dropLaatikko" data-toggle="tooltip"	data-placement="top" title="Klikkaa ikonia kaksi kertaa poistaaaksesi se.">
     <?php if(!empty($projekti->pohjakuva) and empty($projekti->kontentti) and file_exists("uploaded/pohjakuvat/".$projekti->pohjakuva)) : ?>
     <img src="../../uploaded/pohjakuvat/<?php echo $projekti->pohjakuva; ?>" id="pohjakuva">
     <?php elseif(!empty($projekti->pohjakuva) and !empty($projekti->kontentti) and file_exists("uploaded/pohjakuvat/".$projekti->pohjakuva)) : ?>
     <?php echo $projekti->kontentti; ?>
     <?php endif; ?>
   </div>

     <?php if(!empty($projekti->pohjakuva) and !empty($projekti->kontentti) and file_exists("uploaded/pohjakuvat/".$projekti->pohjakuva)) : ?>
     <div id="resultIkonista"></div>
     <?php endif; ?>

  </div>


  <div class="col-sm-2">

  <legend><h4>Tuotteet</h4></legend>
   <?php 
	$criteria = new CDbCriteria;
	$criteria->order = " id DESC ";
	$criteria->condition = " icon_tiedoston_nimi!='' ";
	$tuotteet = Tuotteet::model()->findAll($criteria);

	foreach($tuotteet as $item){
	   if(file_exists('uploaded/icons/'.$item->icon_tiedoston_nimi))
	   {

		echo '
		<div class="form-inline">
		 <div class="form-group">
		   <div class="dragLaatikko" tuoteID="'.$item->id.'" nimi="'.$item->nimi.'">
		     <img src="../../uploaded/icons/'.$item->icon_tiedoston_nimi.'">
	   	   </div>
		 </div>
		 <div class="form-group">';

		if(!empty($item->url_osoite))
			echo '<a href="'.$item->url_osoite.'" target="_blank">'.$item->nimi.'</a>';
		else
			echo $item->nimi;

		echo '
		 </div>
		</div>
		';
	   }
	}
   ?>


  </div>


  <div class="col-sm-2">

  <legend><h4>Valaistussuunnitelmat</h4></legend>
  <?php echo CHtml::link('Hallinta', Yii::app()->request->baseUrl.'/index.php/projektit/admin',
	array(
	'class' => 'btn btn-primary btn-block',
  )); ?>
  <?php echo CHtml::link('Luo uusi', Yii::app()->request->baseUrl.'/index.php/projektit/create',
	array(
	'class' => 'btn btn-primary btn-block',
  )); ?>
  <br>
Tai valiste valikosta vanha suunnitelma<br>

  <select class="form-control projektit">
  <option value="">Valitse valaistussuunnitelma</option>
   <?php 
	$criteria = new CDbCriteria;
	$criteria->order = " id DESC ";
	//$criteria->condition = "  ";
	$pr = Projektit::model()->findAll($criteria);

	foreach($pr as $item){
		echo '<option value="'.$item->id.'">'.$item->nimike.'</option>';
	}
   ?>
  </select>
  <br>
  <?php echo CHtml::button('Tallenna', 
	array(
	'class' => 'btn btn-primary btn-block savePicture',
	'data-toggle'=>'tooltip',
	'data-placement'=>'left',
	'title'=>'Tallenna valaistussuunnitelma'
  )); ?>

  <br>
  <?php 
	echo CHtml::link('PDF',
	'valaistus_suunnitelma?id='.$projekti->id.'&pdf=true',
    	array(
	'class' => 'btn btn-primary btn-block',
    	)
	);
  ?>


  </div>
 </div>


</div><!-- etusivu -->

    <div id="previewImage">
    </div>

  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/html2canvas.js"></script>

<script type="text/javascript">
$(document).ready(function(){

dragAndDrop();
function dragAndDrop(){


    $("#dropLaatikko").droppable({
	accept: '.dragLaatikko',
        drop: function(event, ui) {
            var _this = jQuery(this);
            if (!ui.draggable.hasClass("dropped")) {
                var cloned = jQuery(ui.draggable).clone().addClass('dropped').removeClass('dragLaatikko').draggable().css("position", "absolute");
                jQuery(cloned).appendTo(this).offset({
                    top : ui.offset.top,
                    left: ui.offset.left
                });
            }  

	    laskeIkonia();
        }
    });
    $(".dragLaatikko").draggable({
        helper: 'clone',
	cursor: 'move',
	containment: "document",
    });
    $(".dropped").draggable();
}




 $(".savePicture").click(function(){

	var kontentti = $("#dropLaatikko").html().trim();
	var id = $("#projekti_id").val();

	var element = $("#dropLaatikko"); // global variable
	var getCanvas; // global variable
	var jpegUrl = '';
         html2canvas(element, {
         onrendered: function (canvas) {
		jpeg_data = canvas.toDataURL("image/jpeg");


        $.ajax({
          type: 'POST',
          url: 'uusi_projekti',
          data: { kontentti : kontentti, id : id, jpeg_data : jpeg_data },
          success: function(data) {
		window.location.reload();
          },
          error:  function(xhr, str){
	    console.log('error: ' + xhr.responseCode);
          }
        });


             }
         });


 });

 $(".projektit").change(function(){

	var id = $(".projektit option:selected").val();
	window.location.href="valaistus_suunnitelma?id="+id;
/*
        $.ajax({
          type: 'POST',
          url: 'hyppa_projektin',
          data: { id : forID },
          success: function(data) {
		data = JSON.parse(data);
		//console.log(data)
		$('#dropLaatikko').html(data['kontentti']);
		$('#nimike').val(data['nimike']);
		$('#asiakkaan_nimi').val(data['asiakkaan_nimi']);
		$('#asiakkaan_osoite').val(data['asiakkaan_osoite']);
		$('#asiakkaan_postinumero').val(data['asiakkaan_postinumero']);
		$('#asiakkaan_postitoimipaikka').val(data['asiakkaan_postitoimipaikka']);
		$('#asiakkaan_puhelinnumero').val(data['asiakkaan_puhelinnumero']);
		$('#asiakkaan_sahkoposti').val(data['asiakkaan_sahkoposti']);
		dragAndDrop();
		laskeIkonia();
          },
          error:  function(xhr, str){
	    console.log('error: ' + xhr.responseCode);
          }
        });
*/


 });

laskeIkonia();
function laskeIkonia(){

    $('#resultIkonista').html( '' );
    var counts = {};
    $("#dropLaatikko .dropped").each(function(){

	  if (!counts.hasOwnProperty( $(this).attr('nimi') )) {
	    counts[$(this).attr('nimi')] = 1;
	  } else {
	    counts[$(this).attr('nimi')]++;
	  }
    });
    var res = '';
    $.each( counts, function( key, value ) {
	res += key +' ('+ value + ')<br>';
    });

    $('#resultIkonista').html( '<br><div class="alert alert-success">' + res + '</div>' );

}





 $(document).delegate(".dropped","dblclick",function(){
	$(this).remove();
 });


});

</script>


	
