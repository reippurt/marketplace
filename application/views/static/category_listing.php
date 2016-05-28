<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
.filter-box{
	border:1px solid #ddd;
	padding:10px;
	margin-bottom:20px;
}
</style>

<?php
$filter_needed = false;
$categories_needed = false;
$hide_regions = true;
$page = $this->uri->segment(1);

switch ($page) {
  case 'category':
    $filter_needed = true;
    $categories_needed = true;
    break;
  case 'search':
    $filter_needed = true;
    break;
   case 'user':
    $filter_needed = true;
    $hide_regions = false;
    break;
  default:
   $categories_needed = true;
    break;
}

if ($this->uri->segment(2) == "favorites") {
	$filter_needed = true;
	$categories_needed = false;
}

$sorting = $ads_available['criteria']['sorting'];
$reg = explode(',', $this->input->get('reg'));


$lower_endpoint = $ads_available['criteria']['filter']['endpoints']['min'];
$upper_endpoint = $ads_available['criteria']['filter']['endpoints']['max'];

$lower_price_value = $lower_endpoint;
$upper_price_value = $upper_endpoint;

if($this->input->get('price')){

	$lower_price_value = $ads_available['criteria']['price']['lower_price_limit'];
	$upper_price_value = $ads_available['criteria']['price']['upper_price_limit'];


}



if($filter_needed){ ?>


	<form method="post" action="<?php echo base_url('api/setFilters'); ?>">
      
       <small><strong>SORTERING PRIS</strong></small>
       <div class="filter-box">
           
			<label class="radio-inline">
				<input type="radio" name="sort-price" value="asc" <?php if(isset($sorting) && $sorting['price'] == "asc"){ echo "checked"; } ?>> Stigende
			</label>
			<label class="radio-inline">
				<input type="radio" name="sort-price" value="desc" <?php if(isset($sorting) && $sorting['price'] == "desc"){ echo "checked"; } ?>> Faldende
			</label>

		</div>


		<small for="amount fs11"><strong>PRIS DKK</strong></small>
		<div class="filter-box">
			<input type="text" class="amount" data-lower="<?php echo $lower_price_value ?>" data-upper="<?php echo $upper_price_value ?>" name="price" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
			<input type="hidden" id="endpoint-min" value="<?php echo $lower_endpoint ?>">
			<input type="hidden" id="endpoint-max" value="<?php echo $upper_endpoint ?>">
			<div class="price-range" ></div>
		</div>
		
		<?php if($hide_regions){ ?>
		
		<small><strong>HVOR ER VAREN</strong></small>

		<div class="filter-box">
			<div class="checkbox">
              <label>
                <input name="region[]" type="checkbox" value="koebenhavn" <?php if(in_array('koebenhavn', $reg)){ echo "checked"; } ?>> København
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input name="region[]" type="checkbox" value="sjaelland" <?php if(in_array('sjaelland', $reg)){ echo "checked"; } ?>> Sjælland
              </label>
            </div>
            
            <div class="checkbox">
              <label>
                <input name="region[]" type="checkbox" value="syddanmark" <?php if(in_array('syddanmark', $reg)){ echo "checked"; } ?>> Syddanmark
              </label>
            </div>
            
            <div class="checkbox">
              <label>
                <input name="region[]" type="checkbox" value="midtjylland" <?php if(in_array('midtjylland', $reg)){ echo "checked"; } ?>> Midtjylland
              </label>
            </div>
            

            <div class="checkbox">
              <label>
                <input name="region[]" type="checkbox" value="nordjylland" <?php if(in_array('nordjylland', $reg)){ echo "checked"; } ?>> Nordjylland
              </label>
            </div>
			
		</div>
		
		<?php } ?>
		
		<input type="submit" name="submit-set-filter" class="btn btn-danger btn-block btn-sm mt15 mb15" value="Sæt filter">

	</form>

<?php } ?>


<?php if($categories_needed){ ?>
		
	<?php
		$total_segments = $this->uri->total_segments();
		if($total_segments > 1){ ?>
			<div class="mt20">
				<small>
					<a href="<?php echo $breadcrumbs[$total_segments - 2]->href ?>">
						 Tilbage &nbsp; <i class="fa fa-long-arrow-left"></i></small>
					</a>
			</div>
	<?php } ?>

	<div class="filter-box wrap-extend-wrapper">
		<div class="wrap-extend mb0 mt0" data-height="200px">
			<div class="list-group list-group-border-none">

				<?php 
					foreach ($selectList as $item) { 
					
						if(empty($this->uri->segment(1)))
						{	
							$href = base_url('category/'.$item->href);						
						} 
						else if( $this->uri->total_segments() == 4)
						{
							$url = explode('/', current_url());
							$href = base_url($url[3] . "/" . $url[4] . "/" . $url[5] . "/" . $item->href);
						}
						else
						{
							$href = current_url() . "/" . $item->href;
						}

				?>
					
					<a href="<?php echo $href ?>" class="list-group-item">
						<i class="fa fa-long-arrow-right"></i>&nbsp;
						<span class="text-decoration-underline"><?php echo $item->listName ?></span>
					</a>

				<?php } ?>

			</div>
		</div>

		<?php if(count($selectList) > 5){ ?>
			<a href="#" class="btn-wrap-extend pt5 pb5 bt1-grey bb1-grey display-block"><i class="fa fa-bars"></i> &nbsp;Vis alle kategorier <span class="pull-right"><i class="fa fa-caret-down"></i></span></a>
		<?php } ?>
	</div>

<?php } ?>