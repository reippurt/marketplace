
<style type="text/css">
.list-wrapper{ padding: 5px; }

</style>
<div class="container-fluid bg-dark-theme mb15">
	<div class="container">
		<h4 class="color-white">

			   <a style="padding-left:0px;" class="btn" href="<?php echo base_url($this->uri->segment(1) . "/images"); ?>">
                          
					<i class="fa fa-chevron-left color-white"></i>
				
				</a>
			<span class="pull-right btn">Annoncedetaljer</span>
		</h4>
	</div>
</div>

<div class="container">	
	
	<div class="clearfix"></div>

	<div class="row">

		

		
				<div class="col-md-4 col-sm-4 col-xs-6">

					<label><small class="fs10">TYPE</small></label>
					<div class="list-wrapper">
						
						<div class="list-group" id="type-selector">

							<?php foreach($types as $type) { ?>
						
								<a href="#" class="list-group-item type" id="<?php echo $type->typeId ?>">
									
									<?php echo $type->typeName ?>
								
								</a>
						
							<? } ?>
						
						</div>

					</div>

				</div>

				<div class="col-md-4 col-sm-4 col-xs-6">

					<label><small class="fs10">KATEGORI</small></label>
					<div class="list-wrapper">

						<div class="list-group">
							
							<?php foreach ($categories as $category) { ?>
							
								<a href="#" style="display:none;" class="list-group-item type-list-item category type-<?php echo $category->typeId ?>" id="<?php echo $category->categoryId ?>">
									
									<?php echo $category->categoryName ?>
									
								</a>
							
							<?php } ?>
							
						</div>

					</div>


				</div>


				<div class="col-md-4 col-sm-4 col-xs-12">
					

					<label class="mt20-xs"><small class="fs10">UNDERKATEGORI</small></label>
					<div class="list-wrapper">
						
						<div class="list-group">
							
							<?php foreach ($subcategories as $subcategory) { ?>
								
								<a href="<?php echo base_url(); ?>create-ad/information/<?php echo $subcategory->typeId . "-" . $subcategory->categoryId . "-" . $subcategory->subcategoryId ?>" style="display:none;" class="list-group-item subcategory category-list-item category-<?php echo $subcategory->categoryId ?>">
									
									<?php echo $subcategory->subcategoryName ?>
									
								</a>
							
							<?php } ?>

						</div>

					</div>


				</div>	
	
	</div>

</div>



<!-- Modal -->
<div class="modal fade" id="create-subcategory" tabindex="-1" role="dialog" aria-labelledby="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('api/createSubcategory'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Tilføj din egen kategori</h4>
				</div>
				<div class="modal-body">
					
					<div class="form-group ui-widget">
						<label>Type</label>
						<input type="text" name="type" class="form-control autocomplete-row" id="types-typeName">
					</div>
					
					<div class="form-group ui-widget">
						<label>Kategori</label>
						<input type="text" name="category" class="form-control autocomplete-row" id="categories-categoryName">
					</div>
					
					<div class="form-group ui-widget">
						<label>Underkategori</label>
						<input type="text" name="subcategory" class="form-control autocomplete-row" id="subcategories-subcategoryName">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
					<input type="submit" class="btn btn-primary" name="submit-add-subcategory" value="Gem kategori">
				</div>
			</form>
		</div>
	</div>
</div>


<div class="alert alert-xs alert-info mb10 animated fadeInRight mt50">
	<span class="fs10"> Mangler du en kategori?</span>
	<a href="#" data-toggle="modal" data-target="#create-subcategory" class="btn btn-primary btn-xs pull-right mb10">Tilføj kategori</a>
</div>


<div class="col-md-4">
	

		<?php
		echo $this->session->userdata('typeSession');
		?>
	
</div>
