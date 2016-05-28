<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.cookie.js'); ?>"></script>
<script src="<?php echo base_url('assets/royalslider/jquery.royalslider.min.js'); ?>"></script>

<script type="text/javascript">

// selecting types on "opret-annonce" page
$(".type").click(function(e){
	e.preventDefault();

	var typeId = $(this).attr('id');

	$(this).parent('div').find('a').removeClass('active');
	$(this).addClass('active');
	$(".type-list-item").hide();
	$(".category-list-item").hide();
	$(".type-" + typeId).show();

});
 

// selecting categories on "opret-annonce" page
$(".category").click(function(e){
	e.preventDefault();

	var categoryId = $(this).attr('id');

	$(this).parent('div').find('a').removeClass('active');
	$(this).addClass('active');
	$(".category-list-item").hide();
	$(".category-" + categoryId).show();

});

// selecting categories on "opret-annonce" page
$(".subcategory").click(function(){

	var categoryId = $(this).attr('id');

	$(this).parent('div').find('a').removeClass('active');
	$(this).addClass('active');
	$(".subcategory-list-item").hide();
	$(".subcategory-" + categoryId).show();

});
 

// switching between existing and new users when creating ad on "opret-annonce"
$("input[name=user]:radio").change(function () {

	$(".user-type").hide();

	var userType = $(this).val();

	$("#" + userType + "-user").slideDown();

	if(userType == "new"){
		$("#ad-login-btn").hide();
		$("#create-ad-btn").html('Næste');
		$("#create-ad-btn").attr('disabled', false);
	}
	else
	{
		$("#ad-login-btn").show();
		$("#create-ad-btn").html('Opret annonce');
		$("#create-ad-btn").attr('disabled', true);
	}

});

// if error response during 'signup' only contain password errors, open modal for submitting password
var modal_check = $("#modal-check").val();
if(modal_check == "open"){
	$("#createUser").modal('show');
}

// custom button bootstrap tab navigating
$(".get-tab").click(function(e){
	e.preventDefault();

	var tab = $(this).attr('id').split('-');

	var tab_number = tab[3];
	if(tab[0] == "prev"){
		tab_number = parseInt(tab[3])-1;		
	} else {
		tab_number = parseInt(tab[3])+1;
	}

	$('#' + tab[1] + "-" + tab[2] + ' a[href="#' + tab[1] + "-" + tab[2] + '-'+ tab_number +'"]').tab('show');

});

$(".wrap-extend").css
	(
		{
			'height': function(){
						return $(this).data('height')
					},
			'overflow': 'hidden'

		}
	);



$(".btn-wrap-extend").click(function(e){
	e.preventDefault();

	$(this).prev('.wrap-extend').css('height','auto');
	$(this).hide();
});








$('.autocomplete-row').each(function(i, el) {
    param2id = $(el).attr("id");
    $(el).autocomplete({
        minLength: 1,
        max: 10,
        source: "<?php echo base_url('api/getRows') ?>/" + param2id + "",
        focus: function(event, ui) {
            $(this).val(ui.item.value);
            return false;
        },
        select: function(event, ui) {
            $(this).val(ui.item.value);
            return false;
        }
    });

    $( el ).autocomplete( "option", "appendTo", ".ui-widget" );
});






$("#ad-login-btn").click(function(e){
	e.preventDefault();
		
	$("#flow-message").html("");

	var original_HTML = $(this).html();
	var email = $("#flow-login-email").val();
	var password = $("#flow-login-password").val();

	if(email == "" || password == ""){

		$(this).removeClass('btn-primary').addClass('btn-danger').html("Indtastning mangler.. prøv igen"); 

		setTimeout(function(){ 


		
			$("#ad-login-btn").removeClass('btn-danger').addClass('btn-primary').html(original_HTML); 
		
		}, 2500);
		
		
	}
	else
	{


		$(this).html("Vent venligst <i class='fa fa-spinner fa-pulse'></i>");

		$.post("<?php echo base_url('api/flowLogin'); ?>", {email:email, password:password}, function(response){


			var obj = jQuery.parseJSON(response);
			
			
			if(obj.response == false)
			{
				$("#flow-message").html("<p class='color-red'>"+obj.msg+"<p>");
				$("#ad-login-btn").html(original_HTML);
			}
			else if(obj.response == "true")
			{
				$("#flow-panel-body").slideUp();
				$("#flow-panel-heading").html("<h4>Logget ind som: " + obj.user.nameSlug + "</h4>");
				$("#flow-submit-ad").html('<input type="submit" name="submit-create-ad" class="btn btn-warning btn-lg br4" value="Opret annocnce">');
			
			}
			
		
		}).then(function(){

			$("#ad-login-btn").html(original_HTML);

		});

	}

});


function _(el){
	return document.getElementById(el);
}


$("body").on('click', '.trigger-upload', function() {
	
   // var val = $(this).find('.imageUpload').click();
    $(this).next().next().find('.imageUpload').click();
});


$(".imageUpload").change(function(){
	
	var input = this;
	var img_id = $(this).attr('id').split('_')[1];
	var nextId = parseInt(img_id) + 1;
	


	if (input.files && input.files[0]) {

		// initialize reader
		var reader = new FileReader();

        reader.onload = function (e) {
			console.log(e);
			$(".outer-"+img_id).removeAttr('role').removeClass('trigger-upload');
			$(".outer-"+nextId).addClass('trigger-upload').css('background-color', 'white').attr('role', 'button');
			$(".edit-panel-" + img_id).removeClass('hide');
            $('.image_' + img_id).attr('src', e.target.result);
            $('.remove_'+ img_id).removeClass('hide');
            $('.emblem_status_' + img_id).removeClass('hide');
            $(".image_"+nextId).attr('src', '../assets/ico/green_plus.png' );
        }

		reader.readAsDataURL(input.files[0]);
	 
	    // initialize form send
		var formdata = new FormData();

		formdata.append("image", input.files[0]);

		var ajax = new XMLHttpRequest();

		ajax.upload.addEventListener("progress", progressHandler.bind(null, img_id), false);
		ajax.addEventListener("load", completeHandler.bind(null, img_id), false);
		ajax.addEventListener("error", errorHandler, false);
		ajax.addEventListener("abort", abortHandler, false);
		ajax.open("POST", "<?php echo base_url('api/upload_single_image') ?>");
		ajax.send(formdata);
		
		//$(".image_" + parseInt(img_id) + 1).attr('src', 'http://dentaspotter.dk/assets/img/camiconblack.png');

       // reader.readAsDataURL(input.files[0]);
    }

});


$("body").on('click', '.remove-image', function(e){
	e.preventDefault();
	var conf = confirm('Vil du fjerne billedet?');

	if(conf){
		window.location.href = $(this).attr('href');	
	}

	
});

function progressHandler(i, event){

	$("#loaded_n_total").html("Uploaded "+ event.loaded + " of total " + event.total);

	var percent = (event.loaded / event.total) * 100;

	$(".emblem_status_text_"+i).html(Math.round(percent));

	$("#progressBar").val(Math.round(percent));

	$("#status").html(Math.round(percent) + "% upload, please wait.");

}

function completeHandler(i, event){

	$("#status").html(event.target.responseText);
	$(".emblem_status_"+i).html(event.target.responseText);
	$("#progressBar").val() = 0;

}

function errorHandler(event){
	$("#status").innerHTML = "uploade failed";	
}

function abortHandler(event){
	$("#status").innerHTML = "upload aborted";
}





jQuery(document).ready(function($) {
    $(".royalSlider").royalSlider({
        // options go here
        // as an example, enable keyboard arrows nav
        keyboardNavEnabled: true,
       
        controlNavigation: 'thumbnails',
        fullscreen: {
    		// fullscreen options go gere
    		enabled: true,
    		nativeFS: false
    	}
    });  
});

function priceRange(){
	var lower = $("#amount").attr('data-lower');
	var upper = $("#amount").attr('data-upper');
	var obj = { lower : lower, upper:upper }
	return obj;
}


$( ".price-range" ).slider({
	range: true,
	/*min: min,
	max: max,*/
	values: [ priceRange().lower, priceRange().upper ],
	slide: function( event, ui ) {
		$( ".amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	}
});



$(".price-range").slider('option', 'min', parseInt($("#endpoint-min").val()));
$(".price-range").slider('option', 'max', parseInt($("#endpoint-max").val()));

$( ".amount" ).val( $( ".price-range" ).slider( "values", 0 ) +
" - " + $( ".price-range" ).slider( "values", 1 ) );

$(".clear-field").click(function(e){
	e.preventDefault();
		
	$(".category-search").val("");
	$(this).css('display', 'none');
	$("#category-search-results").slideUp().html("");
	$(".content").slideDown().addClass('mobile-hidden');

});

$(".category-search").keydown(function(e){
	 if(e.which === 13){

        $("#free-search").submit();
        e.preventDefault();
        return false;
    }

	var query = $(this);
	var adsList = $(".content");
	var resultDiv = $("#category-search-results");
	var deleteButton = $(".clear-field");


	if(query.val() == "" || query.val().length < 1){
		resultDiv.html('');	
		adsList.slideDown().addClass('mobile-hidden');
		deleteButton.css('display', 'none');
		
	} else if(query.val().length > 1){

		$.post("<?php echo base_url() ?>api/generalSearch", {term:query.val()}, function(data){
			
			var obj = $.parseJSON(data);
			//console.log(obj);
			var results = "<div style='background-color:#E0E0E0;padding-left:15px;padding-top:5px;'><small style='line-height:20px;'>Resultat af din søgning</small></div>";			

			$.each(obj, function(i, item){

				var url = "<?php echo base_url('category/"+item.typeSlug+"/"+item.categorySlug+"/"+item.subcategorySlug+"'); ?>";
		
				//console.log(item.typeName);
				results += "<a class='list-group-item bg-light-grey' href='"+url+"'>";
				results += item.typeName + "<br><small>"+item.categoryName+" > "+item.subcategoryName+"</small>";
				results += "</a>";

			});

			deleteButton.css('display', 'inline-block');
			resultDiv.css('display', 'block').html(results);

		});

		adsList.slideUp().addClass('mobile-hidden');

	}

	

});

$("input, select, textarea").on('focus', function() {
		$(".fixed-top-menu").css({
			'position': 'absolute',
			'top': $(document).scrollTop()
		});
		focusing = true;
	})
	$("input, select, textarea").on('blur', function() {
		$(".fixed-top-menu").css({
			'position': 'fixed',
			'top': 0
		});
		focusing = false;
	})

$(window).scroll(function() {
	if ( focusing ) $(".fixed-top-menu").css({ 'top': $(document).scrollTop() });
});


$("input.disable-space").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});


function displayMap() {
	var ele = $("#map_canvas");
	if(ele.css('display') == "none"){
		ele.css('display', 'block');
		initialize_map();
	}
}



$(".flow-facebook-login").click(function(e){
	e.preventDefault();

	var productName;
	var title;
	var description;
	var price;

	var obj = { 
		productName: $("#productName").val(),
		title: $("#title").val(),
		description: $("#description").val(),
		price: $("#price").val()
	}

	$.post('<?php echo base_url("api/setValues") ?>', obj).then(function(){

		$.post('<?php echo base_url("api/facebookLoginUrl") ?>', function(response){


			window.location.href = response;

		});

	});



});

$("body").on('click','.add-favorites', function(){

	var btn = $(this);
	var item = btn.attr('id').split('-');
	var favoriteType = item[0];
	var adId = item[1];

	// start spinning
	btn.html('favorit <i class="fa fa-spinner"></i>');

	$.post('<?php echo base_url("api/addFavorites"); ?>', {favoriteType:favoriteType, adId: adId}, function(response){
		
		obj = jQuery.parseJSON(response);
		
		if(obj.response == true){
			btn.html(obj.html);

		} else {
			var conf = confirm('Vil du logge ind, for at tilføje til favorit?');
			if(conf){
				window.location.href = "<?php echo base_url('login'); ?>";
			}else{
				btn.html(obj.html);
			}
		}

	}).then(function(){
		
	});



});


	
$(".make-info-visible").click(function(){

	var btn = $(this);
	var btn_att = btn.attr('id').split('-');
	var info_type = btn_att[0];
	var hashUserId = btn_att[1];

	var container = $("#"+info_type+"-container");
	var cur_html = container.html();

	container.html("<i class='fa fa-spinner fa-spin'></i>");
	btn.hide();

	$.post('<?php echo base_url("api/getUserInfo/'+info_type+'"); ?>', {hashUserId:hashUserId}, function(response){

		var obj = jQuery.parseJSON(response);

		if(obj.response == true)
		{
			container.html(obj.msg);
		}
		else
		{
			container.html(cur_html);
			btn.show();
		}
		
	});

});

</script>



<style>
.ui-autocomplete-loading {
background: white url("<?php echo base_url(); ?>assets/img/ui-anim_basic_16x16.gif") right center no-repeat;
}
</style>


<!-- 
	GOOGLE PLACES AUTOCOMPLETE 
		-only used on signup page
 --> 
<?php if($this->uri->segment(1) == "signup" || $this->uri->segment(1) == "create-ad" || $this->uri->segment(1) == "dashboard"){ ?>

<script>
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['address']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        var components = place.address_components;

        var city = null;
		var postal_code = null;
		var street = null;
		for (var i = 0, component; component = components[i]; i++) {
			
			console.log(component);
			
			if (component.types[0] == 'locality') {
				city = component['long_name'];
			}
			if (component.types[0] == 'postal_code') {
				postal_code = component['long_name'];
			}
			if (component.types[0] == 'route') {
				street = component['long_name'];
			}

		
		}

        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();

        //$("#autocomplete").val(street)
        $("#postalCode").val(postal_code);
        $("#city").val(city);
        $("#lat").val(lat);
        $("#lng").val(lng);

      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA77jUPPqj03Clf5H5UJ8ltE3CwdblMwMs&libraries=places&callback=initAutocomplete"
async defer></script>

<?php } ?>

