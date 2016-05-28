<div class="container mt15">
	<div class="panel panel-default">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-5">
				<?php if($user->fb_id == ""){ $img_src = base_url('assets/img/' . $user->profile_image);  }else{ $img_src = $user->profile_image; } ?>
				<img class="thumbnail img-responsive mb15 mt15" style="margin-left:15px;" src="<?php echo $img_src ?>">
			</div>
			<div class="col-md-9 col-sm-9 col-xs-7">
				<div class="">
					<div class="panel-body">
						<h1 class="h3 mt0 mb15 overflow-ellipsis fs14-xs">@<?php echo $user->nameSlug ?></h1>
						<small><i class="fa fa-map-marker"></i> <?php echo $user->city . ", " . $user->postalCode ?></small>
						<br>
						<small><i class="fa fa-phone"></i> Telefon: <?php echo $user->phone ?></small>
						<br>
						<small><i class="fa fa-user"></i> <?php echo $user->name ?></small>
						<br>
						<small class="mobile-hidden"><i class="fa fa-clock-o"></i> Medlem siden: <?php echo $user->signupDate ?></small>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		
		<div class="col-sm-3 mobile-hidden">
		
			<?php $this->load->view('static/category_listing'); ?>

		</div>
		
		<div class="col-md-9 col-sm-9">
			<div class="row">

				<?php $this->load->view('static/ads_listing'); ?>

			</div>
		</div>
	</div>
</div>


	<!-- <table class="table">
				<thead>
					<th>Titel</th>
					<th>Oprettet</th>
					<th>Pris</th>
				</thead>
				<tbody>
					<?php foreach($ads as $ad){ ?>

						<tr>
							<td>
								<div class="row">
									<a href="<?php echo base_url() ?>ad/id/<?php echo $ad->adId ?>">
										<div class="col-md-2">
											<img src="<?php echo base_url() ?>assets/img/<?php echo $ad->adFeaturedImage ?>" width="35px" height="35px">	
										</div>
										<div class="col-md-10">
											<?php echo $ad->title ?><br>
											<small class="color-grey"><?php echo $ad->postalCode ?> <?php echo $ad->city ?></small>	
										</div>
									</a>
								</div>
								
							</td>
							<td>
								<?php
									$date_arr = explode(',', timespan(strtotime($ad->postDate), time()));
									echo $date_arr[0];	
								?>
							</td>
							<td>
								<?php echo $ad->price ?> kr.
							</td>
						</tr>

					<?php } ?>
				</tbody>
			</table> -->
		