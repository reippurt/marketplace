<form method="post" action="" class="mb100 mt100" action="<?php echo current_url() ?>">
	<input type="number" value="1" name="number">
	<input type="submit" value="Generér tilfældige annoncer" name="submit-generate-ads">
</form>

<div class="container-fluid">
	<div class="panel panel-danger">
		<div class="panel-heading">Annoncer</div>
			<div class="panel-body">
				<table class="table table-striped">
					<?php foreach ($ads as $ad) { ?>
	
						<tr>
							<td><?php echo $ad->title ?></td>
							<td>
								<form method="post" action="<?php echo current_url() ?>">
									<input type="hidden" name="adId" value="<?php echo $ad->adId ?>">
									<input type="submit" name="submit-delete-ad" value="Slet annonce">
								</form>
							</td>
						</tr>
		
					<?php } ?>	
			</table>
		</div>
	</div>
	
	<div class="row">

		<div class="col-md-4">

			<div class="panel panel-danger">
				<div class="panel-heading"><span style="display:inline;">Typer </span>&nbsp; <form style="display:inline;" method="post" action="<?php echo current_url() ?>"><input type="text" name="typeName" placeholder="Lav ny type">&nbsp;<input type="submit" value="Tilføj" name="submit-add-type"></form></div>
				<div class="panel-body">
					<table class="table table-striped">
						
						<?php foreach ($types as $type) { ?>

								<tr>
									<td><?php echo $type->typeName ?></td>
									<td>
										<form method="post" action="<?php echo current_url() ?>">
											<input type="hidden" name="adId" value="<?php echo $type->typeId ?>">
											<input type="submit" name="submit-delete-type" value="Slet annonce">
										</form>
									</td>
								</tr>
						<?php } ?>	
					</table>
				</div>
			</div>

		</div>
		
		<div class="col-md-4">

			<div class="panel panel-danger">
				<div class="panel-heading">Kategori</div>
				<div class="panel-body">
					<table class="table table-striped">
						
						<?php foreach ($categories as $category) { ?>

								<tr>
									<td><?php echo $category->categoryName ?></td>
									<td>
										<form method="post" action="<?php echo current_url() ?>">
											<input type="hidden" name="adId" value="<?php echo $category->categoryId ?>">
											<input type="submit" name="submit-delete-category" value="Slet kategori">
										</form>
									</td>
								</tr>
						<?php } ?>	
					</table>
				</div>
			</div>

		</div>
		
		<div class="col-md-4">

			<div class="panel panel-danger">
				<div class="panel-heading">Underkategori</div>
				<div class="panel-body">
					<table class="table table-striped">
						
						<?php foreach ($subcategories as $subcategory) { ?>

								<tr>
									<td><?php echo $subcategory->subcategoryName ?></td>
									<td>
										<form method="post" action="<?php echo current_url() ?>">
											<input type="hidden" name="adId" value="<?php echo $subcategory->subcategoryId ?>">
											<input type="submit" name="submit-delete-subcategory" value="Slet underkategori">
										</form>
									</td>
								</tr>
						<?php } ?>	
					</table>
				</div>
			</div>				

		</div>


	</div>

	

	

</div>	
