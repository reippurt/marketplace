<?php

$read_only = "";
$read_only_msg = "";
$disabled = "";
if($user->fb_id != ""){

	$read_only = "readonly";
	$read_only_msg = "<label class='color-red pull-right'>Du har benyttet login med facebook og kan derfor ikke ændre adgangskode</label>";
	$disabled = "disabled";

}

?>
<form method="post" action="<?php echo base_url('api/changePassword'); ?>">
	<h1 class="page-header">Skift adgangskode</h1>

	<h4 class="page-header">Indtast nuværende adgangskode</h4>

	<div class="form-group text-right">
		<label class="col-sm-5 control-label">Adgangskode</label>
	    <div class="col-sm-7">
	     <?php echo $read_only_msg ?>
	      <input type="password" class="form-control mb30" name="current-password" id="" placeholder="" <?php echo $read_only ?>>
	     
	    </div>
	</div>

	<h4 class="page-header mt30">Indtast ny adgangskode</h4>

	<div class="form-group text-right">
		<label class="col-sm-5 control-label">Ny adgangskode</label>
	    <div class="col-sm-7">
	      <input type="password" class="form-control mb15" name="password" id="" placeholder="" <?php echo $read_only ?>>
	    </div>
	</div>
	<div class="form-group text-right">
		<label class="col-sm-5 control-label">Gentag ny adgangskode</label>
	    <div class="col-sm-7">
	      <input type="password" class="form-control mb15" name="password-repeat" id="" placeholder="" <?php echo $read_only ?>>
	    </div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 control-label text-right">Ændre</label>
	    <div class="col-sm-7">
	      <input type="submit" class="btn btn-primary" name="submit-change-password" value="Skift adgangskode" id="" placeholder="" <?php echo $disabled ?>>
	    </div>
	</div>

</form>