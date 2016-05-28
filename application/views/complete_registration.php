<?php
$set_value = $this->session->flashdata('set_value');

if($this->session->userdata('first_login')){

?>

<div class="container mt15">

	<form method="post" action="<?php echo current_url() ?>">	
		<div class="col-md-6 col-md-offset-3">
		
			<img height="80px" width="80px" class="img-responsive img-circle" style="margin:0 auto;" src="<?php echo $this->session->userdata('profileImage'); ?>">
			<h5 class="page-header mt15 mb15 text-center">Hej <?php echo $this->session->userdata('name'); ?></h5>
			<p><small>Dine kunder vil gerne vide hvor i verden dine varer befinder sig. Bekræft herunder kontaktoplysninger hvis du planlægger at oprette annoncer.</small></p>
			
			<div class="form-group <?php if(form_error('address')){ echo "has-error"; } ?>">
				<label class="control-label">Vejnavn</label>
				<input id="autocomplete" type="text" class="form-control" name="address" placeholder="" value="<?php echo set_value('address') ?>">
			</div>


			<div class="row">

				<div class="col-xs-4">

					<div class="form-group <?php if(form_error('postalCode')){ echo "has-error"; } ?>">
						<label class="control-label">Postnummer</label>
						<input id="postalCode" type="text" class="form-control" name="postalCode" placeholder="" value="<?php echo set_value('postalCode') ?>">
					</div>

				</div>
				
				<div class="col-xs-8">

					<div class="form-group <?php if(form_error('city')){ echo "has-error"; } ?>">
						<label class="control-label">By</label>
						<input id="city" type="text" class="form-control" name="city" placeholder="" value="<?php echo set_value('city') ?>">
					</div>

				</div>

			</div>

			<div class="form-group <?php if(form_error('phone')){ echo "has-error"; } ?>">
				<label class="control-label">Telefon</label>
				<input type="number" pattern="\d*"/ class="form-control" name="phone" placeholder="" value="<?php echo set_value('phone') ?>">
			</div>

			<div class="text-right">
				<input type="hidden" name="lat" id="lat" value="<?php echo set_value('lat') ?>">
				<input type="hidden" name="lng" id="lng" value="<?php echo set_value('lng') ?>">

				<a href="<?php echo base_url(); ?>">Spring over</a> &nbsp;<input type="submit" name="submit-complete-registration" class="btn btn-sm btn-primary" value="Bekræft nu">
			</div>

		</div>
	</form>
</div>

<?php } ?>