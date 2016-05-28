<?php
$backButton = base_url($this->uri->segment(1)."/categories");
if($this->uri->segment(1) == "edit-ad"){
	$backButton = "javascript:window.history.go(-1);";
}
?>
<div class="container-fluid bg-dark-theme mb15">
	<div class="container">
		<h4 class="color-white">
			 <a style="padding-left:0px;" class="btn" href="<?php echo $backButton; ?>">
				<i class="fa fa-chevron-left color-white"></i>
			</a>
			<span class="pull-right btn"><?php echo $category->categoryName . " " . $subcategory->subcategoryName ?></span>
		</h4>
	</div>
</div>


<?php
	
$title = "";
$productName = "";
$description = "";
$price = "";
$action = base_url('api/createAd');


if($this->uri->segment(1) == "edit-ad"){

	$title = $adData->adTitle;
	$productName = $adData->productName;
	$description = $adData->description;
	$price = $adData->price;

	$action = base_url('api/update_ad/' . $this->uri->segment(3));
}
else if($this->session->flashdata('set_value')){

	$set_value = $this->session->flashdata('set_value');

	$productName = $set_value['productName'];
	$title = $set_value['title'];
	$description = $set_value['description'];
	$price = $set_value['price'];

}
else if($this->session->userdata('set_value'))
{	
	$set_value = $this->session->userdata('set_value');
	$title = $set_value['title'];
	$productName = $set_value['productName'];
	$description = $set_value['description'];
	$price = $set_value['price'];
}
else
{

	$title = set_value('title');
	$productName = set_value('productName');
	$description = set_value('description');
	$price = set_value('price');

}

?>



<form method="post" action="<?php echo $action ?>" id="create-ad-form" enctype="multipart/form-data">

	<div class="container">

		<div class="panel panel-default border-none-xs">

			<div class="panel-body pb0-xs mt50 mt0-xs bg_grey">

				<div class="row">
				
					<div class="col-md-10">

						<div class="form-horizontal">

							<?php
							if(!empty($attributes)){
							
								foreach ($attributes as $attribute) {
										
									$this->custom->displayAttribute($attribute->attType, $attribute->attTitle, $attribute->attValues);

								}
							}
							?>

							
							<div class="form-group <?php if(form_error('productName')){ echo "has-error"; } ?>">
								<label for="" class="col-sm-4 col-xs-12 control-label fs10">Produkt <span class="color-red">*</span></label>
								<div class="col-sm-6 col-xs-8">
									<input type="text" name="productName" id="productName" class="form-control" value="<?php echo $productName ?>" placeholder="">
								</div>
							</div>

							<div class="form-group <?php if(form_error('title')){ echo "has-error"; } ?>">
								<label for="" class="col-sm-4 control-label fs10">OVERSKRIFT <span class="color-red">*</span></label>
								<div class="col-sm-6">
									<input type="text" name="title" id="title" class="form-control" value="<?php echo $title ?>" placeholder="">
								</div>
							</div>


							<div class="form-group <?php if(form_error('description')){ echo "has-error"; } ?>">
								<label for="" class="col-sm-4 control-label fs10">SUPPLERENDE TEKST <span class="color-red">*</span></label>
								<div class="col-sm-8">
									<textarea rows="4" name="description" id="description" class="form-control" placeholder=""><?php echo $description ?></textarea>
								</div>
							</div>

							<div class="form-group <?php if(form_error('price')){ echo "has-error"; } ?>">
								<label for="" class="col-sm-4 col-xs-7 control-label fs10">PRIS <span class="color-red">*</span></label>
								<div class="col-sm-4 col-xs-7">
									<div class="input-group">
									 	<input type="text" name="price" id="price" class="form-control text-right" value="<?php echo $price ?>" aria-describedby="sizing-addon2">
										<span class="input-group-addon">,00 kr.</span>
									</div>						
								</div>
							</div>

							<?php
							if($this->uri->segment(1) == "edit-ad"){

								$this->load->view('static/ad_images');
							
							}
							?>


						
						</div>
					
					</div>
				</div><!-- row -->
			</div><!-- panel-body -->


			<!-- Session: loggedIn -->
			<?php

			if(!$this->session->userdata('loggedIn')){

			?>

				<div class="panel-footer panel-heading" id="flow-panel-heading">
					<h4>Kontaktoplysninger <small>Log venligst ind</small></h4>
				</div>

				<div class="panel-body bg_grey pt50 pb0-xs pb50" id="flow-panel-body">
					
					<div class="row">

						<div class="col-md-10">

							<div class="form-horizontal">

								<?php 
								// sorting out user type (even after error-msg)
								$new_user = ['', 'display:none;'];
								$existing_user = ['checked', 'display:none;'];
								if(set_value('user') == "existing" || empty(set_value('user'))){
									$existing_user[1] = "style='display:block;'";

								}else
								{
									$new_user = ["checked", "display:block;"];
								}
								?>
								<div class="form-group">
									<label for="" class="col-sm-4 control-label">Allerede bruger?</label>
									<div class="col-sm-6">
										<div class="radio">
											<label>
												<input name="user" name="userType" type="radio" value="existing" <?php echo $existing_user[0] ?>> Eksisterende bruger
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="user" name="userType" type="radio" value="new" <?php echo $new_user[0] ?>> Ny bruger
											</label>
										</div>
									</div>
								</div>

								<div class="form-group <?php if(form_error('email')){ echo "has-error"; } ?>">
									<label for="" class="col-sm-4 control-label">Email</label>
									<div class="col-sm-6">
								
										<input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" id="flow-login-email" placeholder="">
										
										<?php echo form_error('email', '<label class="color-red">', '</label> '); ?>
									
									</div>
								</div>

								<div id="existing-user" class="user-type" style="<?php echo $existing_user[1] ?>">

									<div class="form-group <?php if(form_error('login-password')){ echo "has-error"; } ?>">
										<label for="" class="col-sm-4 control-label">Adgangskode</label>
										<div class="col-sm-4">
											<input type="password" name="login-password" class="form-control" id="flow-login-password" placeholder="">
											<?php echo form_error('password', '<label class="color-red">', '</label> '); ?> 
										</div>
									</div>

								</div>

								<div id="new-user" class="user-type" style="<?php echo $new_user[1] ?>">
									
									<div class="form-group <?php if(form_error('name')){ echo "has-error"; } ?>">
										<label for="" class="col-sm-4 control-label">Navn</label>
										<div class="col-sm-6">
											<input type="text" name="name" class="form-control" value="<?php echo set_value('name') ?>">
											<?php echo form_error('name', '<label class="color-red">', '</label> '); ?>
										</div>
									</div>

									<div class="form-group <?php if(form_error('address')){ echo "has-error"; } ?>">
										<label for="" class="col-sm-4 control-label">Adresse</label>
										<div class="col-sm-6">
											<input type="text" id="autocomplete" name="address" class="form-control" value="<?php echo set_value('address') ?>">
											<?php echo form_error('address', '<label class="color-red">', '</label> '); ?>
										</div>
									</div>

									<div class="form-group <?php if(form_error('postalCode')){ echo "has-error"; } ?>">
										<label for="" class="col-sm-4 col-xs-12 control-label">Postnummer</label>
										<div class="col-sm-2 col-xs-4">
											<input type="text" name="postalCode" id="postalCode" class="form-control" value="<?php echo set_value('postalCode') ?>" placeholder="">
											<?php echo form_error('postalCode', '<label class="color-red">', '</label> '); ?>
										</div>
									</div>

									<div class="form-group <?php if(form_error('city')){ echo "has-error"; } ?>">
										<label for="" class="col-sm-4 col-xs-12 control-label">By</label>
										<div class="col-md-4 col-sm-2 col-xs-6">
											<input type="text" name="city" id="city" class="form-control" value="<?php echo set_value('city') ?>" placeholder="">
											<?php echo form_error('city', '<label class="color-red">', '</label> '); ?>
										</div>
									</div>
								
									<div class="form-group <?php if(form_error('phone')){ echo "has-error"; } ?>">
										<label for="" class="col-sm-4 col-xs-12 control-label">Telefon</label>
										<div class="col-md-4 col-sm-3 col-xs-6">
											<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone') ?>" placeholder="">
											<?php echo form_error('phone', '<label class="color-red">', '</label> '); ?> 
										</div>
									</div>

								</div>


								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<input type="hidden" name="lat" id="lat">
										<input type="hidden" name="lng" id="lng">
										<div id="flow-message"></div>
										
										<button type="submit" name="submit-login" class="btn btn-primary" id="ad-login-btn" style="<?php echo $existing_user[1] ?>">Log ind</button>
										<a href="#" class="btn btn-primary flow-facebook-login">Log ind med Facebook <i class="fa fa-facebook"></i></a>
									</div>
								</div>

							</div>

						</div>
					
					</div>
			
				</div>

			<?php
				
			}

			?>

			<!-- Session: loggedIn -->

			<div class="">
				
				<div class="row">

					<div class="col-md-10">
						
						<div class="form-horizontal">
							
							<div class="form-group mt15 mb0-xs mt0-xs">
								<div class="col-sm-offset-4 col-sm-8">
								
									<?php if($this->session->userdata('loggedIn')){ ?>
										<div class="col-md-12">

											<?php if($this->uri->segment(1) == "edit-ad"){ ?>

												<input type="submit" name="update-ad" class="btn btn-warning btn-lg btn-block br4 mt15" value="Gem annonce">
									
											<?php } else { ?>

												<input type="submit" name="submit-create-ad" class="btn btn-warning btn-lg btn-block br4" value="Opret annocnce">
									
											<?php } ?>

										<div>
									<?php } else { ?>
									
									<?php
										$btn_disabled = 'disabled="disabled"';
										$button_message = "Opret annonce";
										if($new_user[0] == "checked"){

											$btn_disabled = "";
											$button_message = "Næste";

										}
									?>

										<div id="flow-submit-ad">
											<button type="button" data-toggle="modal" data-target="#createUser" id="create-ad-btn" class="btn btn-warning btn-lg br4" <?php echo $btn_disabled ?>><?php echo $button_message ?></button>
										</div>
									
									<?php } ?>	

								</div>
							</div>

						</div>
						
					</div>

				</div>

			</div>

		</div><!-- panel -->

	</div><!-- container -->

	<?php
	$modal_status = "";
	if(
		empty(form_error('email'))			&&
		empty(form_error('address'))		&&
		empty(form_error('postalCode'))		&&
		empty(form_error('phone'))			&&
		!empty(form_error('signup-password'))
	){
		$modal_status = "open";
	}
	?>

	<input type="hidden" id="modal-check" value="<?php echo $modal_status ?>">
	
	<!-- Modal -->
	<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUser">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Vælg adgangskode</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-horizontal">
							<div class="col-md-4 col-md-offset-4">
								<label>Adgangskode</label>
								<?php echo form_error('signup-password', '<label class="color-red">', '</label> ') ?>
								<input type="password" class="form-control mb20" name="signup-password">
								<label>Gentag adgangskode</label>
								<?php echo form_error('repeat-password', '<label class="color-red">', '</label> ') ?>
								<input type="password" class="form-control" name="repeat-password">
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">

					<input name="submit-create-ad" type="submit" class="btn btn-primary" value="Opret bruger og indryk annonce">
				</div>
			</div>
		</div>
	</div>


<input type="hidden" name="typeId" value="<?php echo $hidden['typeId'] ?>">
<input type="hidden" name="categoryId" value="<?php echo $hidden['categoryId'] ?>">
<input type="hidden" name="subcategoryId" value="<?php echo $hidden['subcategoryId'] ?>">
</form>


<?php if(!$this->custom->debugging()){ ?>
	
	<h1>Session:set_value (fb_login)</h1>

	<?php print_r($this->session->userdata('set_value'));  ?>

	<pre><?php print_r(json_decode($this->input->cookie('classification'))); ?></pre>

<?php } ?>

