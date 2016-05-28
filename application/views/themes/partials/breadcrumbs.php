<div class="container">
	<div class="filter-line pull-right">
      <div class="row">
        <div class="col-md-12 text-right">
          <a href="#" class="btn fs18 pr0 get-tab" id="prev-adsList-tab-1" role="button"><i class="fa fa-list-ul"></i></a>
          <a href="#" class="btn fs18 pr0 get-tab" id="next-adsList-tab-0" role="button" onclick="displayMap()"><i class="fa fa-map-marker"></i></a>
        </div>
      </div>
    </div>

	<!-- breadcrumbs -->
	<ol class="breadcrumb mb0 fs10-xs" style="padding:8px 0px;">
	
			
		<?php 
			$lastIndex = count($breadcrumbs) - 1;
			foreach ($breadcrumbs as $key => $crumb) { 
				
				if($lastIndex == $key){ ?>
					
					<li class="dropdown">
						<button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<?php echo $crumb->title ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<?php foreach ($selectList as $item) {

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
									<li><a href="<?php echo $href ?>"><?php echo $item->listName ?></a></li>
								<?php } ?>
						</ul>
					</li>
						
				<?php } else { ?>
				
					<li><a class="active" href="<?php echo $crumb->href; ?>"><?php echo $crumb->title ?></a></li>
				
				<?php } ?>


		<?php } ?>


	</ol>

</div>


  <!-- Nav tabs -->
    <ul id="adsList-tab" class="nav nav-tabs" role="tablist" style="display:none;">
      <li role="presentation" class="active"><a href="#adsList-tab-0" aria-controls="adsList-tab-0" role="tab" data-toggle="tab">...</a></li>
      <li role="presentation"><a href="#adsList-tab-1" aria-controls="adsList-tab-1" role="tab" data-toggle="tab">...</a></li>
    </ul>

    