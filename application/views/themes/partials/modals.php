
<?php

$loggedIn = $this->session->userdata('loggedIn');

$dashboard = false;
$ad_page = false;
$home = false;

$filter_needed = false;
$hide_regions = true;

$show_listMap_switch = false;
$spacer_height = "90px";

$page = $this->uri->segment(1);
switch ($page) {
  case '':
    $show_listMap_switch = false;
    $spacer_height = "50px";
    $home = true;
    break;
  case 'category':
    $show_listMap_switch = true;
    $filter_needed = true;
    break;
  case 'search':
    $show_listMap_switch = true;
    $filter_needed = true;
    break;
  case 'user':
    $show_listMap_switch = true;
    $hide_regions = false;
    $filter_needed = true;
    break;
  case 'dashboard':
    $dashboard = true;
    $spacer_height = "50px";
    break;
  case 'ad':
    $show_listMap_switch = true;
    $ad_page  = true;
    break;
  default:
    # code...
    break;
}

?>



<style type="text/css">
#menuModal{ padding:0px!important; }

#menuModal .modal-dialog {
  width: 30%;
  height: 100%;
  margin: 0;
  padding: 0;
  float:right;
}

#menuModal .modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
#menuModal img{ height:50px;width:50px; }
</style>

<?php

$loggedIn = $this->session->userdata('loggedIn');

$profile_image = base_url('assets/img/default_profile_image.jpg');
$anchor = base_url('login');
$heading = "Log ind";
$text = "Log ind for at se dine oplysninger";


if($loggedIn){ 
  $profile_image = $this->session->userdata('profileImage');
  $anchor = base_url('user/'.$this->session->userdata('nameSlug'));
  $heading = $this->session->userdata('nameSlug');
  $text = "Velkommen online ven";
}



?>
<div class="modal animated bounceInRight" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="">

            <div class="modal-header bg-blue color-white">
               
              <button type="button" class="close fs22" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              <strong><?php echo $this->custom->appOptions('siteName')->value2 ?></strong> &nbsp;&nbsp;
                <span class="">
                  <?php if($loggedIn){ ?>
                    <a href="<?php echo base_url('login/logout'); ?>" class="color-grey">
                      Log ud
                    </a>
                  <?php } ?>
                </span>
               
            </div><!-- modal-header -->

            <div class="">
                
                <div class="panel-body menuModal-user-info bg-grey">

                <div class="media">
                  <div class="media-left">
                    <a href="<?php echo $anchor ?>">
                      <img class="media-object img-circle" src="<?php echo $profile_image ?>" alt="<?php echo $this->session->userdata('nameSlug'); ?>">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo $heading ?></h4>
                    <small><?php echo $text ?></small>
                  </div>
                </div>

               

               </div>

               <div class="list-group mb0">
                  
                     <a class="list-group-item" href="<?php echo base_url('create-ad/images'); ?>">Opret annonce  <i class="fa fa-plus-circle color-yellow"></i></a>
                    
                    <?php if($this->session->userdata('loggedIn')){ ?>
                      <a class="list-group-item" href="<?php echo base_url("user/" . $this->session->userdata('nameSlug')) ?>">Offentlig profil</a>
                      <a class="list-group-item" href="<?php echo base_url('dashboard/ads') ?>">Mine annoncer</a>
                      <a class="list-group-item" href="<?php echo base_url('dashboard/favorites') ?>">Mine favoritter</a>
                      <a class="list-group-item" href="<?php echo base_url('dashboard/settings') ?>">Mine brugeroplysninger</a>
                      <a class="list-group-item" href="<?php echo base_url('login/logout'); ?>">Log ud</a>
                    <?php } else { ?>

                      <a class="list-group-item" href="<?php echo base_url('signup') ?>">Opret bruger</a>
                      <a class="list-group-item" href="<?php echo base_url('login') ?>">Log ind</a>

                    <?php } ?>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
         </div>   
      </div>
   </div>
</div>



<?php if($filter_needed){ ?>

 <div class="modal animated slideInDown" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-heading">FILTER</h4>
            </div>
            <div class="modal-body">
              
              <div class="row pt20 pb20">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">

                 

                <?php $this->load->view('static/category_listing'); ?>
   

                </div>  
              </div>   
 
            </div>
            <!-- <div class="modal-footer">
                <input type="submit" name="submit-set-filter" class="btn btn-danger" value="Sæt filter">
            </div> -->
         
      </div>
   </div>
</div>

<?php } ?>
