<?php 

$flash = $this->session->flashdata('response');

if($flash){ ?>

	<div class="animated slideInDown alert alert-<?php echo $flash['class'] ?> mb0">

		<div class="container">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h2><?php echo $flash['title'] ?> </h2>
			<p class="lead"><?php echo $flash['msg'] ?></p>
			<p><?php echo $flash['extra'] ?></p>
		</div>

	</div>

<?php } ?>