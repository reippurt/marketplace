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
<body class="animated fadeIn">


	<div class="fixed-top-menu">
		
		<?php 
		
		$landing_page = false;
		$breadcrumbs = false;
		$spacer = "50";

		switch ($this->uri->segment(2)) {
			case 'favorites':
				$breadcrumbs = true;
				$spacer = "90";
				break;
			
			default:
				# code...
				break;
		}

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

<div class="content">

	<div class="container-fluid">

		<div class="container mt15">

			<div class="row">
				
				<div class="col-md-3 col-sm-3 mobile-hidden">

					<?php $this->load->view('dashboard/dashboard_sidebar'); ?>

				</div>

				<div class="col-md-9 col-sm-9">

					<?php echo $output;?>
			
				</div>
			
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('themes/partials/global_footer'); ?>
</body>
</html>