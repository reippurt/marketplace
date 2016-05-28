<?php
$set_value = $this->session->flashdata('set_value');
?>
<style type="text/css">

#signup-form{ background-color: white;
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #fff;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px; }

.bg-dark-theme{ background-color: #4D394B; }
.bg-green-theme{ background-color:  #38978D; }

#signup-form .form-control{ border-radius: 0px; height:50px; font-size: 18px; border:1px solid rgba(0, 0, 0, 0.07); box-shadow: none;}
#signup-form label{ text-transform: uppercase;font-size: 12px; }

#outer{
	position: absolute;
	height: 100%;
    width: 100%;
    display: table;
    vertical-align: middle;
}

#container{
	
    position: relative;
    vertical-align: middle;
    display: table-cell;
    height: 400px;
}

#inner{
    width: 360px;
    height: 400px;
	text-align: left;
    margin-left: auto;
    margin-right: auto;
}

</style>

<div id="outer">

	<div id="container">

		<div id="inner">

			<form id="signup-form" method="post" action="<?php echo base_url() ?>api/login">
					<?php 

					if(!$this->session->userdata('loggedIn')){
							echo '<a class="btn btn-primary btn-xs pull-right" href="' . htmlspecialchars($loginUrl) . '">Log ind Facebook <i class="fa fa-facebook-official"></i></a>';
						} else {
							
							echo '<a class="btn btn-default disabled" href="' . htmlspecialchars($loginUrl) . '">You are logged in!</a>';

					} ?>
					<div class="clearfix"></div>

						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" name="login-email" class="form-control" placeholder="">
						</div>
					

						<div class="form-group">
							<label>ADGANGSKODE</label>
							<input type="password" name="login-password" class="form-control" placeholder="">
						</div>

				<div class="form-group">
					<input type="submit" name="submit-login" class="btn btn-success" value="Log ind">
				</div>
 			</form>

		</div>

	</div>

</div>


