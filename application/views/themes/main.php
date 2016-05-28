<!DOCTYPE html>
<html lang="en">
<head>
<?php
		 foreach($js as $file){
				echo "\n\t\t"; 
				?><script src="<?php echo $file; ?>"></script><?php
		 } echo "\n\t"; 
?>	
<?php
		

		 foreach($css as $file){ 
		 	echo "\n\t\t"; 
			?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
		 } echo "\n\t"; 
?>
<?php
		if(!empty($meta)) 
			foreach($meta as $name=>$content){
				echo "\n\t\t"; 
				?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
		 }

$this->load->view('themes/partials/global_head.php');
	
?>
</head>

<?php

$login = "";
if($this->uri->segment(1) == "login"){ $login = "login"; }

?>

<style type="text/css">
#login{

	background: url('http://yoursneaks.dk/wp-content/uploads/2016/04/12038.jpg') no-repeat center center fixed;
    -webkit-background-size: contain;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
    font-family: 'Roboto',helvetica,arial,sans-serif;
    font-weight: 400;
    text-align: center;
    min-height: 400px;
    min-width: 360px;
background-color: black;
}
</style>

<body id="<?php echo $login ?>" class="animated fadeIn">

	<div class="fixed-top-menu">
		
		<?php 
		
		$landing_page = false;
		$breadcrumbs = false;
		$spacer = "50";

		switch ($this->uri->segment(1)) {
			case 'category':
				$breadcrumbs = true;
				$spacer = "90";
				break;
			case 'create-ad':
				$landing_page = true;
				$spacer = "0";
				break;
			case 'opret-annonce':
				$landing_page = true;
				break;
			case 'signup':
				$landing_page = true;
				break;
			case 'login':
				$landing_page = true;
				break;
			case 'images':
				$landing_page = true;
				$spacer = "0";
				break;
			case 'complete-registration':
				$landing_page = true;
				break;
			case 'edit-ad':
				$landing_page = true;
				break;
			
			default:
				# code...
				break;
		}

		if(!$landing_page){

			$this->load->view('themes/partials/navbar');
		
			if($breadcrumbs){
			
				$this->load->view('themes/partials/breadcrumbs');
			
			}

		
		} ?>

	</div><!-- fixed-top-menu -->

	<div id="modals"><?php $this->load->view('themes/partials/modals'); ?></div>
	
	<?php if(!$landing_page){ ?>
		<div style="height:<?php echo $spacer ?>px;"></div>
	<?php } ?>

<?php $this->load->view('themes/partials/flashdata'); ?>

<div class="content"> <?php echo $output;?> </div>

<?php

if(!$landing_page){
	$this->load->view('themes/partials/footer_html');
}
?>

<?php $this->load->view('themes/partials/global_footer'); ?>
</body>
</html>