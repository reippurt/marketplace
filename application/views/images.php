<style type="text/css">

.w360{ max-width: 360px; }
.border-grey{ border:1px solid #ddd;  }
.m0auto{ margin:0 auto; }

.outer{ height:130px;width: 100%; border:1px solid #ddd; display: table;}
.inner{ display: table-cell;vertical-align: middle; text-align: center; }


.col-half{ width:50%;float: left; position: relative; }
input{ position:absolute;left:-1000px; }


.image-container{ max-height: 128px; }


.emblem{
	line-height: 35px;
	padding: 2px 10px;
	border-radius: 50%;
	color: white;
	position: absolute;
}

.emblem-remove{
	bottom: 10px;
	left:10px;
	z-index: 1000;
	background-color: #C61313;
	font-size: 25px;
}

.emblem-status{
	bottom:10px;
	right:10px;
	background-color: #3AC73A;
	font-size: 17px
}

</style>




<?php

$defaultImg = base_url('assets/img/camiconblack.png');

$imgSrcOne = $defaultImg;
$imgSrcTwo = $defaultImg;
$imgSrcThree = $defaultImg;
$imgSrcFour = $defaultImg;
$imgSrcFive = $defaultImg;
$imgSrcSix = $defaultImg;

$visibleOne = "hide";
$visibleTwo = "hide";
$visibleThree = "hide";
$visibleFour = "hide";
$visibleFive = "hide";
$visibleSix = "hide";

if($cookieImages){

	if(array_key_exists(0, $cookieImages)){
		$imgSrcOne = base_url("assets/img/" . $cookieImages[0]);
		$visibleOne = "";
	}
	if(array_key_exists(1, $cookieImages)){
		$imgSrcTwo = base_url("assets/img/" . $cookieImages[1]);
		$visibleTwo = "";
	}
	if(array_key_exists(2, $cookieImages)){
		$imgSrcThree = base_url("assets/img/" . $cookieImages[2]);
		$visibleThree = "";
	}
	if(array_key_exists(3, $cookieImages)){
		$imgSrcFour = base_url("assets/img/" . $cookieImages[3]);
		$visibleFour = "";
	}
	if(array_key_exists(4, $cookieImages)){
		$imgSrcFive = base_url("assets/img/" . $cookieImages[4]);
		$visibleFive = "";
	}
	if(array_key_exists(5, $cookieImages)){
		$imgSrcSix = base_url("assets/img/" . $cookieImages[5]);
		$visibleSix = "";
	}

	

}

?>

<div class="container-fluid bg-dark-theme">
	<div class="w360 m0auto">

		<h4 class="color-white">
			<a href="<?php echo base_url() ?>" class="color-white">
				<i class="fa fa-chevron-left"></i>
			</a>

			<span class="pull-right">Vælg billeder</span>
		</h4>
	</div>

</div>

<div class="w360 m0auto">
	
	<div class="col-md-9 col-xs-9">
		<progress id="progressBar" value="0" max="100" style="width:100%;" class="mt20 mb15"></progress>
	</div>
	<div class="col-md-3 col-xs-3 pt15">
		<small class=""><a class="" href="<?php echo base_url('api/deleteCookies/images'); ?>">Ryd alle <i class="fa fa-trash"></i></a></small>
	</div>

</div>

<div class="clearfix"></div>


<div class="w360 border-grey m0auto">



	<!-- ---------- IMAGE 1  ------------ -->
	<div class="col-half" role="button">
		<i class="fa fa-trash emblem emblem-remove remove_1 <?php echo $visibleOne ?>" role="button"></i>
		<span class="emblem emblem-status emblem_status_1 hide">
			<strong class="emblem_status_text_1">-</strong>			
		</span>
		<div class="outer">
			<div class="inner">
				<img class="image-container image_1 img-responsive display-table m0auto" src="<?php echo $imgSrcOne; ?>">		
			</div>
		</div>
	</div>
	<div class="form-container">
		<form class="form_1" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
			<input type="file" class="imageUpload" id="image_1">		  
		</form>	
	</div>

	<!-- ---------- IMAGE 2 ----------- -->
	<div class="col-half" role="button" disabled="disabled">
		<i class="fa fa-trash emblem emblem-remove remove_2 <?php echo $visibleTwo ?>" role="button"></i>
		<span class="emblem emblem-status emblem_status_2 hide">
			<strong class="emblem_status_text_2">-</strong>			
		</span>
		<div class="outer">
			<div class="inner">
				<img class="image-container image_2 img-responsive display-table m0auto" src="<?php echo $imgSrcTwo ?>">		
			</div>
		</div>
	</div>
	<div class="form-container">
		<form class="form_2" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
			<input type="file" class="imageUpload" id="image_2">		  
		</form>	
	</div>
	

	<!-- ---------- IMAGE 3 ----------- -->
	<div class="col-half" role="button">
		<i class="fa fa-trash emblem emblem-remove remove_3 <?php echo $visibleThree ?>" role="button"></i>
		<span class="emblem emblem-status emblem_status_3 hide">
			<strong class="emblem_status_text_3">-</strong>			
		</span>
		<div class="outer">
			<div class="inner">
				<img class="image-container image_3 img-responsive display-table m0auto" src="<?php echo $imgSrcThree ?>">		
			</div>
		</div>
	</div>
	<div class="form-container">
		<form class="form_3" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
			<input type="file" class="imageUpload" id="image_3">		  
		</form>	
	</div>
	
	<!-- ---------- IMAGE 4 ----------- -->
	<div class="col-half" role="button">
		<i class="fa fa-trash emblem emblem-remove remove_4 <?php echo $visibleFour ?>" role="button"></i>
		<span class="emblem emblem-status emblem_status_4 hide">
			<strong class="emblem_status_text_4">-</strong>			
		</span>
		<div class="outer">
			<div class="inner">
				<img class="image-container image_4 img-responsive display-table m0auto" src="<?php echo $imgSrcFour ?>">		
			</div>
		</div>
	</div>
	<div class="form-container">
		<form class="form_4" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
			<input type="file" class="imageUpload" id="image_4">		  
		</form>	
	</div>
	
	<!-- ---------- IMAGE 5 ----------- -->
	<div class="col-half" role="button">
		<i class="fa fa-trash emblem emblem-remove remove_5 <?php echo $visibleFive ?>" role="button"></i>
		<span class="emblem emblem-status emblem_status_5 hide">
			<strong class="emblem_status_text_5">-</strong>			
		</span>
		<div class="outer">
			<div class="inner">
				<img class="image-container image_5 img-responsive display-table m0auto" src="<?php echo $imgSrcFive ?>">		
			</div>
		</div>
	</div>
	<div class="form-container">
		<form class="form_5" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
			<input type="file" class="imageUpload" id="image_5">		  
		</form>	
	</div>
	<!-- ---------- IMAGE 6 ----------- -->
	<div class="col-half" role="button">
		<i class="fa fa-trash emblem emblem-remove remove_6 <?php echo $visibleSix ?>" role="button"></i>
		<span class="emblem emblem-status emblem_status_6 hide">
			<strong class="emblem_status_text_6">-</strong>			
		</span>
		<div class="outer">
			<div class="inner">
				<img class="image-container image_6 img-responsive display-table m0auto" src="<?php echo $imgSrcSix ?>">		
			</div>
		</div>
	</div>
	<div class="form-container">
		<form class="form_6" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
			<input type="file" class="imageUpload" id="image_6">		  
		</form>	
	</div>
	
	
	
	
	
	<div class="clearfix"></div>
	
	<!-- <button href="/opret-annonce" class="btn br0 btn-lg btn-primary btn-block">Næste</button> -->
	<a href="<?php echo base_url('opret-annonce'); ?>" class="btn btn-lg btn-primary btn-block br0">Næste</a>

</div>


	
<?php if($this->custom->debugging()){ ?>
	<div class="w360 m0auto">
		<label>Cookie images:</label>
		<?php echo $this->input->cookie('images'); ?>
	</div>
<?php } ?>

