<div class="container mt15">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
		<li><a href="<?php echo base_url() ?>category/<?php echo $this->custom->slugify($ad->typeName); ?>"><?php echo $ad->typeName ?></a></li>
		<li><a href="<?php echo base_url() ?>category/<?php echo $this->custom->slugify($ad->typeName) . "/" . $this->custom->slugify($ad->categoryName); ?>"><?php echo $ad->categoryName ?></a></li>
		<li><a href="<?php echo base_url() ?>category/<?php echo $this->custom->slugify($ad->typeName) . "/" . $this->custom->slugify($ad->categoryName) . "/" . $this->custom->slugify($ad->subcategoryName); ?>"><?php echo $ad->subcategoryName ?></a></li>
	</ol>
</div>


<?php if($this->session->userdata('userId') == $ad->userId){ ?>

<div class="container">

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading bg-light-grey" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Din annonce <i class="fa fa-caret-down pull-right fs18"></i>
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body bg-light-grey">
				<label>Adminster din annonce</label>
				<div>
					<a href="<?php echo base_url('edit-ad/id/' . $ad->adId); ?>">Rediger</a> <br>
					<a href="#" data-toggle="modal" data-target="#delete-ad">Slet</a>
				</div>
				</div>
			</div>
		</div>
	</div>

</div>


<?php } ?>

<div class="container">

	<div class="row">

		<div class="col-md-8 col-sm-8">

			<h1 class="h4 mb0 mt0"><?php echo $ad->productName . ", " . $ad->title ?> <button class="add-favorites btn btn-xs btn-default pull-right" id="ad-<?php echo md5($ad->adId); ?>">Favorit <i class="fa fa-<?php echo $favorites ?>"></i></button></h1>
			<h3 class="h2 mt0"><strong><?php echo $ad->price ?> kr.</strong>
			<small><span class="fs12"> 
				<?php
					$date_arr = explode(',', timespan(strtotime($ad->postDate), time()));
				echo strtolower($date_arr[0]);	
				?> - <a href="<?php echo base_url('user/' . $ad->nameSlug); ?>">@<?php echo $ad->nameSlug ?></a></span>
			</small></h3>
			
			<div class="row">
				<div class="col-md-12">
					
					<div class="royalSlider rsDefault" style="width:100%;">
						<!-- <img class="rsImg" src="<?php echo base_url('assets/img/'.$ad->adFeaturedImage); ?>" data-rsTmb="<?php echo base_url('assets/img/'.$ad->adFeaturedImage); ?>" alt="image desc" />
					 -->
						<?php foreach ($images as $key => $value) { ?>
							
							<img class="rsImg" src="<?php echo base_url('assets/img/'.$value); ?>" data-rsTmb="<?php echo base_url('assets/img/'.$value); ?>" alt="image desc" />

						<?php }  ?>
					
					</div>	

					<p class="mt15"><?php echo $ad->description ?></p>

				</div>
			</div>
			
			

		</div><!-- col-md-8-->

		<div class="col-md-4 col-sm-4">
			
			<div class="panel panel-primary panel-sm mt30-xs">

				<div class="panel-heading">

					<strong><?php echo $ad->name; ?></strong><br>
					<div class="mt10 mb0">
						<div><?php echo $ad->address; ?></div>
						<div><?php echo $ad->postalCode . " " . $ad->city ?></div>

						Tel: <span id="phone-container"><?php echo substr($ad->phone, 0, 2) . " " . substr($ad->phone, 2, 2); ?> XX XX </span> <span role="button" class="make-info-visible fs10 color-grey" id="phone-<?php echo $ad->hashUserId ?>">klik for at se nummer</span><br>
						email: <span id="email-container">skjult</span> <span role="button" class="make-info-visible fs10 color-grey" id="email-<?php echo $ad->hashUserId ?>">vis email</span><br>
					</div>
					<div class="mt10 mb10">
						<small>Medlem siden: <?php
									echo date('F Y', strtotime($ad->postDate));
								?>
						</small>
						<br>
					</div>
					<a class="mb0 mt10 color-white text-decoration-underline" href="<?php echo base_url() . $this->custom->user_page_url() . "/" . $ad->nameSlug ?>">Se brugerens profil</a>
					<button class="btn btn-warning btn-sm btn-block mt10">Send email</button>
				</div>

			</div>
			

		</div><!-- col-md-4 -->

	</div>


</div>


<?php if($this->custom->debugging()){ ?>

<div class="container bg-dark">
	<h1>Images</h1>
	<pre>
		<?php print_r($images); ?>
	</pre>
</div>

<? } ?>





<!-- Modal -->
<div class="modal fade" id="delete-ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo base_url('api/deleteAd/' . $this->uri->segment(3)); ?>">

			<div class="modal-content animated slideInDown">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"> Slet annonce</h4>
				</div>
				<div class="modal-body">
					<h4 class="page-header mt15 mb15">Fik du solg varen?</h4>
					<div class="radio">
						<label>
							<input type="radio" name="closure" id="" value="1">
							Ja, varen blev solgt på Yoursneaks.
						</label>
					</div>
	
					<div class="radio">
						<label>
							<input type="radio" name="closure" id="" value="2">
							Nej, varen blev ikke solgt på Yoursneaks.
						</label>
					</div>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fortryd</button>
					<input type="submit" class="btn btn-primary" value="Slet annonce">
				</div>
			</div>

		</form>
	</div>
</div>