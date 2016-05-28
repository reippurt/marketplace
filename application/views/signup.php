<?php $set_value = $this->session->flashdata('set_value'); ?>

<style type="text/css">
#column-wrapper{
	position: absolute;
	height:100%;
	width: 100%;
	
}
#inner-column{
	height:100%;
	width: 500px;
	background-color: white;
	float: right;
}


.bg-green-theme{ background-color:  #38978D; }

#signup-form .form-control{ border-radius: 0px; height:50px; font-size: 18px; border:1px solid rgba(0, 0, 0, 0.07); box-shadow: none;}
#signup-form label{ text-transform: uppercase;font-size: 12px; }

</style>

<div class="bg-dark-theme" id="column-wrapper">
	
	<div class="" id="inner-column">

		<div class="col-md-10 col-md-offset-1">

			<h1 class="mt100">Opret bruger</h1>

			<form id="signup-form" method="post" action="<?php echo base_url('api/signup') ?>">

				<div>

					<!-- Nav tabs -->
					<ul id="signup-tab" class="nav nav-tabs" role="tablist" style="display:none;">
						<li role="presentation" class="active"><a href="#signup-tab-0" aria-controls="signup-tab-0" role="tab" data-toggle="tab">Login</a></li>
						<li role="presentation"><a href="#signup-tab-1" aria-controls="signup-tab-1" role="tab" data-toggle="tab">Kontakt</a></li>
						<li role="presentation"><a href="#signup-tab-2" aria-controls="signup-tab-2" role="tab" data-toggle="tab">Udseende</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="signup-tab-0">
							
							<h4 class="mb50">1. Loginoplysninger</h4>

							<div class="row">
								
								<div class="col-md-12">
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" placeholder="" value="<?php echo $set_value['email'] ?>">
									</div>
								</div>

							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Adgangskode</label>
										<input type="password" class="form-control" name="signup-password" placeholder="">
									</div>

								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Gentag adgangskode</label>
										<input type="password" class="form-control" name="repeat-password" placeholder="">
									</div>
								</div>

							</div>

							<button class="btn btn-primary pull-right get-tab" id="next-signup-tab-0">Næste 1/3</button>

						</div>
						<div role="tabpanel" class="tab-pane" id="signup-tab-1">

							<h4 class="mb50">2. Kontaktoplysninger</h4>

							<div class="form-group">
								<label>Navn</label>
								<input type="text" class="form-control" name="name" placeholder="" value="<?php echo $set_value['name']; ?>">
							</div>
						
							<div class="form-group">
								<label>Vejnavn og nr.</label>
								<input id="autocomplete" type="text" class="form-control" name="address" placeholder="" value="<?php echo $set_value['address'] ?>">
							</div>
							
							<div class="row">

								<div class="col-md-4">

									<div class="form-group">
										<label>Postnummer</label>
										<input id="postalCode" type="text" class="form-control" name="postalCode" placeholder="" value="<?php echo $set_value['postalCode'] ?>">
									</div>

								</div>
						
								<div class="col-md-8">

									<div class="form-group">
										<label>By</label>
										<input id="city" type="text" class="form-control" name="city" placeholder="" value="<?php echo $set_value['city'] ?>">
									</div>

								</div>
						
							</div>

							<div class="form-group">
								<label>Telefon</label>
								<input type="phone" class="form-control" name="phone" placeholder="" value="<?php echo $set_value['phone'] ?>">
							</div>
							
							<input type="hidden" name="lat" id="lat" value="<?php echo $set_value['lat']; ?>">
							<input type="hidden" name="lng" id="lng" value="<?php echo $set_value['lng']; ?>">

							<button class="btn btn-primary get-tab" id="prev-signup-tab-1">Tilbage 1/3</button>
							<input type="submit" name="submit-create-account" class="btn btn-success pull-right" value="Opret bruger">
						
						</div>
						
					</div>
				</div>

			
			</form>
		</div>
	</div>
	
<!-- 
	<h1 style="margin-left:50px;display:inline-block;" class="page-header color-white text-uppercase"><?php echo $this->custom->appOptions('siteName')->value2 ?></h1>
 -->
</div>


