<div class="text-center">	
	<img height="80px" width="80px" class="img-responsive img-circle" style="margin:0 auto;" src="<?php echo $this->session->userdata('profileImage'); ?>">			
</div>				

<div class="list-group mt15">
	<a href="<?php echo base_url('user/' . $this->session->userdata('nameSlug')); ?>" class="list-group-item">Min offentlig profil</a>
	<a href="<?php echo base_url('dashboard/ads') ?>" class="list-group-item">Mine annoncer</a>
	<a href="<?php echo base_url('dashboard/favorites') ?>" class="list-group-item">Mine favoritter</a>
	<a href="<?php echo base_url('dashboard/settings') ?>" class="list-group-item">Mine brugeroplysninger</a>
	<a href="<?php echo base_url('dashboard/password') ?>" class="list-group-item">Skift adgangskode</a>
</div>


<?php

$uri2 = $this->uri->segment(2);

if($uri2 == "favorites"){ $this->load->view('static/category_listing'); }

?>