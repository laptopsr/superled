<?php
/* @var $this SiteController */
?>
<style>
#dropLaatikko {
	width: 100%;
	height: 450px;
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
.dragLaatikko img{
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


    $("#dropLaatikko").droppable({
	accept: '.dragLaatikko',
        drop: function(event, ui) {
            var _this = jQuery(this);
            if (!ui.draggable.hasClass("dropped")) {
                var cloned = jQuery(ui.draggable).clone().addClass("dropped").draggable();
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


/*
 $(document).delegate(".poistaKansio","click",function(){

 });
*/

});

</script>


	
