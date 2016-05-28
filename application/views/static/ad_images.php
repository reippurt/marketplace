<style type="text/css">

.w360{ max-width: 360px; }
.border-grey{ border:1px solid #ddd;  }
.m0auto{ margin:0 auto; }

.outer{ height:130px;width: 100%; border:1px solid #ddd; display: table;}
.inner{ display: table-cell;vertical-align: middle; text-align: center; }


.col-half{ width:50%;float: left; position: relative; }
.form-container { position:absolute;left:-91000px; }


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

.edit-panel{

    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-color: rgba(182, 182, 182, 0.52);
    z-index: 900;


}

.bg-black{ background-color: #242424; }
.bg-white{ background-color: white; }
</style>




<?php


$visibleOne = "hide";
$visibleTwo = "hide";
$visibleThree = "hide";
$visibleFour = "hide";
$visibleFive = "hide";
$visibleSix = "hide";


?>


<?php if($this->uri->segment(1) == "create-ad"){ ?>

	<div class="container-fluid bg-dark-theme">
		<div class="w360 m0auto">

			<h4 class="color-white">
				 <a style="padding-left:0px;" class="btn" href="<?php echo base_url(); ?>">
					<i class="fa fa-chevron-left color-white"></i>
				</a>

				<span class="pull-right btn">Vælg billeder</span>
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

<?php } ?>

<div class="clearfix"></div>


<div class="w360 border-grey m0auto" style="margin-bottom:100px;">

	<?php
	$cookieCount = count($cookieImages);
	$bg_class = "bg-black";
	$trigger_upload = "";
	$button = "";
	
	for ($i=0; $i < 6; $i++) {

		$cookie_image_set = "hide";



		if($cookieImages && array_key_exists($i, $cookieImages))
		{
			$button = "";
			$cookie_image_set = "show";
			$src = base_url('assets/img/' . $cookieImages[$i]);
			$bg_class = "bg-white";
		}
		else if($cookieCount == 0 && $i == 0 || (($cookieCount) == $i))
		{
			$button = "role='button'";
			$trigger_upload = "trigger-upload";
			$bg_class = "bg-white";
			$src = base_url('assets/ico/green_plus.png');
		}
		else
		{
			
			$trigger_upload = "";
			$button = "";
			$bg_class = "bg-black";
			$src = base_url('assets/ico/black_camera.png');
			
		}
	
		


	

	?>

		<div class="col-half">
			
			<div class="outer outer-<?php echo $i ?> <?php echo $trigger_upload ?> <?php echo $bg_class ?>"  <?php echo $button ?>>
				
				<div class="inner">
					<img class="image-container image_<?php echo $i; ?> img-responsive display-table m0auto" src="<?php echo $src; ?>">		
				</div>
					
			</div>

					
			<div class="edit-panel edit-panel-<?php echo $i; ?>  <?php echo $cookie_image_set ?>">
			
				<a href="<?php echo base_url('api/deleteCookies/images/key_' . $i); ?>" class="remove-image">
					<i class="fa fa-trash emblem emblem-remove remove_<?php echo $i; ?>" id="remove-<?php echo $i; ?>" role="button"></i>
				</a>
				
				<span class="emblem emblem-status emblem_status_<?php echo $i; ?> hide">
					<strong class="emblem_status_text_<?php echo $i; ?>">0</strong>			
				</span>
			
			</div>

			
			<div class="form-container">
				<form class="form_<?php echo $i; ?>" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
					<input type="file" class="imageUpload" id="image_<?php echo $i; ?>">		  
				</form>	
			</div>
			

		</div><!-- col-half -->




	<?php } ?>

	<div class="clearfix"></div>
	
	<!-- <button href="/opret-annonce" class="btn br0 btn-lg btn-primary btn-block">Næste</button> -->
	<?php if($this->uri->segment(1) == "create-ad"){ ?>
		
		<a href="<?php echo base_url('create-ad/categories'); ?>" class="btn btn-lg btn-primary btn-block br0">Næste</a>
	
	<?php } ?>

</div>






	
<?php if(!$this->custom->debugging()){ ?>
	
	<div class="clearfix"></div>

	<div class="container mt20">
		<label>session: editActive</label><br>
		<?php echo $this->session->userdata('editActive'); ?><br>
		<label>Cookie images: json</label><br>
		<?php echo $this->input->cookie('images'); ?><br>
		<label>Cookies images: array</label><br>
		<pre><?php print_r(json_decode($this->input->cookie('images'))); ?></pre>
	</div>
<?php } ?>

