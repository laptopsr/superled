<?php
/* @var $this SiteController */
?>
<style>
body{
  overflow-x: hidden;
  overflow-y: hidden;
}
#dropLaatikko {
	width: 100%;
	height: auto;
}
#dropLaatikko img{

}
/*
#dropLaatikko {
	width: 100%;
	height: 450px;
	background-image: url("../../img/pohjakuva.jpg");
	background-size: 100% 100%;
	background-repeat: no-repeat;
}
*/
.dragLaatikko{
	margin-bottom: 5px;
}
.dragLaatikko img, .dropped img{
	width: 30px;
}
</style>

<br>
<div id="etusivu">

 <div class="row">

  <div class="col-sm-10">
   <div id="dropLaatikko">
     <img src="../../img/pohjakuva.jpg">
   </div>
  </div>

  <div class="col-sm-2">

  <?php echo CHtml::button('Tallenna projekti', 
	array(
	'class' => 'btn btn-primary btn-block savePicture',
	'data-toggle'=>'tooltip',
	'data-placement'=>'left',
	'title'=>'Jos Projekti nimike kentää ei ole tyhjä, niin se luo uusi projekti.'
  )); ?>
  <input type="text" class="form-control" id="nimike" placeholder="Projektin nimike">
  <br>
  <select class="form-control projektit">
  <option value="">Valitse projekti</option>
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

  <h2>Tuotteet</h2>
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
		   <div class="dragLaatikko">
		     <img src="../../uploaded/icons/'.$item->icon_tiedoston_nimi.'">
	   	   </div>
		 </div>
		 <div class="form-group">
		   '.$item->nimi.'
		 </div>
		</div>
		';
	   }
	}
   ?>

  </div>
 </div>


</div><!-- etusivu -->




<script type="text/javascript">
$(document).ready(function(){

dragAndDrop();
function dragAndDrop(){

    $("#dropLaatikko").droppable({
	//accept: '.dragLaatikko',
        drop: function(event, ui) {
            var _this = jQuery(this);
            if (!ui.draggable.hasClass("dropped")) {
                var cloned = jQuery(ui.draggable).clone().addClass('dropped').removeClass('dragLaatikko').draggable();
                jQuery(cloned).appendTo(this).offset({
                    top : ui.offset.top,
                    left: ui.offset.left
                });
            }  
        }
    });
    $(".dragLaatikko").draggable({
        helper: 'clone',
	cursor: 'move',
	containment: "document",
    });
    $(".dropped").draggable({

    });
}


 $(".savePicture").click(function(){

	var kontentti = $("#dropLaatikko").html().trim();
	var avoin = $(".projektit option:selected").val();

	if(($('#nimike').val() === '') && (avoin == ''))
	{
		$('#nimike').css({"border":"2px red solid"});
		return false;
	}



        $.ajax({
          type: 'POST',
          url: 'uusi_projekti',
          data: { nimike : $('#nimike').val(), kontentti : kontentti, avoin : avoin },
          success: function(data) {
		window.location.href="valaistus_suunnitelma";
          },
          error:  function(xhr, str){
	    console.log('error: ' + xhr.responseCode);
          }
        });


 });

 $(".projektit").change(function(){

	var forID = $(".projektit option:selected").val();

        $.ajax({
          type: 'POST',
          url: 'hyppa_projektin',
          data: { id : forID },
          success: function(data) {
		data = JSON.parse(data);
		$('#dropLaatikko').html(data);
		dragAndDrop();
          },
          error:  function(xhr, str){
	    console.log('error: ' + xhr.responseCode);
          }
        });


 });




/*
 $(document).delegate(".savePicture","click",function(){

 });
*/

});

</script>


	
