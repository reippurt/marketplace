<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
.ad-image-bg{
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
}
</style>

<?php 

$ads = $ads_available['ads']['list'];
$total_ads = $ads_available['ads']['total_ads'];
$page = $ads_available['criteria']['page']['page'];
$total_pages = "";//ceil($total_ads / $ads_available['criteria']['page']['page']['limit']);

?>

<div class="tab-content">
	
	<div role="tabpanel" class="tab-pane active" id="adsList-tab-0">
		
		<?php if($this->uri->total_segments() > 0){ ?>
			
			<div class="col-md-12">
				<p><?php echo $total_ads ?> annoncer i alt <span class="pull-right">Side <?php echo $page ?> af <?php echo $total_pages ?></span></p>
			</div>
		
		<?php } ?>

		<?php
		if(empty($ads)){
			echo "<div class='col-md-12'><h4 class='page-header'>Ingen varer til salg i denne kategori</h4></div>";
		} else { foreach ($ads as $ad) { ?>
	
			<div class="col-md-4 col-xs-6 mb30">
				<a class="ad-anchor" href="<?php echo base_url() . "ad/id/" . $ad->adId ?>">
				
					<div class="product-col-wrapper overflow-ellipsis mb0 ad-image-bg" style="height:180px;background-image:url(<?php echo base_url('assets/img/'.$ad->adFeaturedImage) ?>);">

						<div class="ad-feat-image">
							<!-- <img class="img-responsive ad-thumbnail mb5 img-center" src="<?php echo base_url(); ?>assets/img/<?php echo $ad->adFeaturedImage ?>">
							 --><span class="ad-price"><?php echo $ad->price ?> kr.</span>
						</div>
											
					</div>
					<div class="ad-info overflow-ellipsis">
						<h5 class="mt5 mb5 fs11"><?php echo $ad->productName . ", " . $ad->adTitle ?></h5>
						
					</div>

				</a>
				
			</div>
			
		<?php } } ?>

		
	
	</div><!-- adsList-tab-0 -->

	<div role="tabpanel" class="tab-pane" id="adsList-tab-1">

		<style type="text/css">
			#map_canvas{ display: none; }
		</style>
		<script type="text/javascript">
			
		</script>

		<?php echo $ads_available['google_maps']['js']; ?>
	
		<?php echo $ads_available['google_maps']['html']; ?>

	</div><!-- adsList-tab-1-->
</div><!-- tab-content --> 

<div class="clearfix"></div>

<div class="">
	<div class="col-md-12 text-right">
		<?php echo $ads_available['pagination']; ?>
	</div>
</div>			



<?php if($this->custom->debugging()){ ?>

	<div class="col-md-12 mt20">

		<pre>

			<?php print_r($ads_available); ?>

		</pre>

	</div>

	<div class="col-md-12 mt20">

		<pre>

			<?php $this->output->enable_profiler(TRUE); ?>

		</pre>

	</div>
 <?php } ?>
