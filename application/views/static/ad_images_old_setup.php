<div class="w360 border-grey m0auto">

	<!-- ---------- IMAGE 1  ------------ -->
	<div class="col-half">
		
		<div class="outer trigger-upload" role="button">
			
			<div class="inner">
				<img class="image-container image_1 img-responsive display-table m0auto" src="<?php echo $imgSrcOne; ?>">		
			</div>
				
		</div>

		<div class="edit-panel">
			<i class="fa fa-trash emblem emblem-remove remove_1 <?php echo $visibleOne ?>" role="button"></i>
			<span class="emblem emblem-status emblem_status_1 hide">
				<strong class="emblem_status_text_1">0</strong>			
			</span>
		</div>

		<div class="form-container">
			<form class="form_1" action="<?php echo base_url('api/upload_single_image'); ?>" method="post" enctype="multipart/form-data">
				<input type="file" class="imageUpload" id="image_1">		  
			</form>	
		</div>
		

	</div><!-- col-half -->
	

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
	<?php if($this->uri->segment(1) == "create-ad"){ ?>
		
		<a href="<?php echo base_url('create-ad/categories'); ?>" class="btn btn-lg btn-primary btn-block br0">Næste</a>
	
	<?php } ?>
</div>