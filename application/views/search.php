<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mt15">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i></a></li>
		<li>Søg: <?php echo $query ?></li>
	</ol>
</div>


<?php if(empty($ads_available)){ ?>

	<div class="container-fluid jumbotron pt15 pb15">
		<div class="container">
			<div class="col-md-12">
		
				<h4>Vi fandt desværre ingen søgeresultater, prøv venligst igen.</h4>
				<p class="lead">Se alle kategorier <a href="<?php echo base_url('category') ?>">her</a></p>

			</div>			
		</div>
	</div>

<?php } ?>


<div class="container">

	<div class="row">
		
		<div class="col-md-3 mobile-hidden">
		
			<?php $this->load->view('static/category_listing'); ?>
		
		</div>

		<div class="col-md-9">
			<div class="row">
	
				<?php $this->load->view('static/ads_listing'); ?>
					
			</div>
		
		</div>

	</div>


</div>

