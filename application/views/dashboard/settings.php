<style type="text/css">
label{ font-size: 11px;text-transform: uppercase; }
</style>

<?php
$fbLog = $user->fb_id;

$fbLogMsg = "";
$disable = "";
if($fbLog != ""){
	$disable = "disabled";
	$fbLogMsg = "Da du benytter facebooklogin, kan du ikke ændre din email.";
} 
?>

<div class="col-md-8 col-md-offset-2">
	
	<?php echo form_open('api/updateUser'); ?>

		<div class="form-group <?php if(form_error('email')){ echo "has-error"; } ?>">
			<label class="control-label">Email </label>
			<input type="text" class="form-control" name="email" placeholder="" value="<?php echo $user->email ?>" readonly>
			<span class="pull-right color-red fs10"><?php echo $fbLogMsg ?></span>
		</div>

		<div class="form-group <?php if(form_error('name')){ echo "has-error"; } ?>">
			<label class="control-label">Navn</label>
			<input type="text" class="form-control" name="name" placeholder="" value="<?php echo $user->name ?>">
		</div>

		<div class="form-group <?php if(form_error('nameSlug')){ echo "has-error"; } ?>">
			<label class="control-label">Brugernavn</label>
			<div class="input-group">
				<div class="input-group-addon">@</div>
				<input type="text" class="form-control disable-space" name="nameSlug" placeholder="" value="<?php echo $user->nameSlug ?>">
			</div>
		</div>

		<div class="form-group <?php if(form_error('address')){ echo "has-error"; } ?>">
			<label class="control-label">Vejnavn</label>
			<input id="autocomplete" type="text" class="form-control" name="address" placeholder="" value="<?php echo $user->address ?>">
		</div>


		<div class="row">

			<div class="col-xs-4">

				<div class="form-group <?php if(form_error('postalCode')){ echo "has-error"; } ?>">
					<label class="control-label">Postnummer</label>
					<input id="postalCode" type="text" class="form-control" name="postalCode" placeholder="" value="<?php echo $user->postalCode ?>">
				</div>

			</div>
			
			<div class="col-xs-8">

				<div class="form-group <?php if(form_error('city')){ echo "has-error"; } ?>">
					<label class="control-label">By</label>
					<input id="city" type="text" class="form-control" name="city" placeholder="" value="<?php echo $user->city ?>">
				</div>

			</div>

		</div>

		<div class="form-group <?php if(form_error('phone')){ echo "has-error"; } ?>">
			<label class="control-label">Telefon</label>
			<input type="number" pattern="\d*"/ class="form-control" name="phone" placeholder="" value="<?php echo $user->phone ?>">
		</div>

		<div class="text-right">
			<input type="hidden" name="lat" id="lat" value="<?php echo $user->lat ?>">
			<input type="hidden" name="lng" id="lng" value="<?php echo $user->lng ?>">
		</div>

		<input type="submit" class="btn btn-primary" value="Opdatér oplysninger">
	<?php echo form_close(); ?>

</div>


<?php if($this->custom->debugging()){ ?>
	<div class="clearfix"></div>
	<div class="row mt20">
		<pre>
			<?php print_r($this->session->all_userdata()); ?>
		</pre>
	</div>
<?php  } ?>
