<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="desktop-hidden">
	<div class="input-group">
		
	</div>
</div>

<div class="container mt15" id="ads-list">
	
	
	<div class="row">
		
		<div class="col-md-3 col-sm-3 mobile-hidden">

			<?php $this->load->view('static/category_listing'); ?>
		
		</div>

		<div class="col-md-9 col-sm-9">
			<h4 class="mt0"><small>Lige oprettet på <?php echo $this->custom->appOptions('siteName')->value2 ?></small></h4>
			<div class="row">
	
				<?php $this->load->view('static/ads_listing'); ?>
					
			</div>
		
		</div>

	</div>


</div>

