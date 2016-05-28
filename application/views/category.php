<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if($this->custom->debugging()){ ?>
	<pre>
	<?php print_r($breadcrumbs); ?>
	</pre>
<?php } ?>


<div class="container mt15">
	<div class="row">
		
		<div class="col-md-3 col-sm-3 mobile-hidden">
			
			
			<?php if($this->uri->total_segments() < 10 ){ ?>

				<?php $this->load->view('static/category_listing'); ?>

			<?php } ?>
		
		</div>

		<div class="col-md-9 col-sm-9">
		
			<div class="row">
				
				<?php $this->load->view('static/ads_listing'); ?>
					
			</div>

		</div>
		
	</div>

</div>


