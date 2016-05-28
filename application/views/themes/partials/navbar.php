<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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



  <div class="bg-dark-theme pt10">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">

                <form method="post" id="free-search" action="<?php echo base_url() ?>search/">
            
                    <div class="form-group mb10" style="position:relative;">

                        <div class="input-group input-group-sm">
                            
                          <?php if($this->uri->total_segments() > 0){ ?>
                          <span class="input-group-btn">
                             <a style="padding-left:0px;" class="btn" href="javascript:window.history.go(-1);"><i class="fa fa-chevron-left color-white fs18"></i>&nbsp;&nbsp; </a>
                           </span>
                            <?php } else { ?>
                              <div class="desktop-hidden input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vælg <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                  <?php foreach ($selectList as $item) {

                                      if(empty($this->uri->segment(1)))
                                      { 
                                        $href = base_url('category/'.$item->href);            
                                      } 
                                      else if( $this->uri->total_segments() == 4)
                                      {
                                        $url = explode('/', current_url());
                                        $href = base_url($url[3] . "/" . $url[4] . "/" . $url[5] . "/" . $item->href);
                                      }
                                      else
                                      {
                                        $href = current_url() . "/" . $item->href;
                                      }
                                    ?>
                                      <li><a href="<?php echo $href ?>"><?php echo $item->listName ?></a></li>
                                    <?php } ?>
                                  </ul>
                              </div><!-- /btn-group -->
                            <?php } ?>
                            <input type="text" class="form-control category-search" autocomplete="off" name="search" placeholder="Hvad leder du efter?" value="<?php echo $this->session->flashdata('searchString'); ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-danger clear-field" style="display:none;">Slet <i class="fa fa-times"></i></button>

                                <input type="submit" class="btn btn-default" value="Søg">

                                <?php if($this->uri->segment(1) == "user" || $this->uri->segment(1) == "category" || $this->uri->segment(1) == "search"){ ?>
                                   <a href="#" class="btn btn-sm btn-danger" data-target="#filterModal" data-toggle="modal" href="<?php echo base_url(); ?>">Filter <i class="fa fa-filter"></i></a>
                                <?php } ?>
                           </span>
                           <span class="input-group-btn desktop-hidden">
                              
                              <a href="#" data-target="#menuModal" data-toggle="modal" class="btn" style="padding-right:0px;">;<i class="fa fa-bars color-white fs18"></i></a>
                           
                           </span>
                           
                        </div>

                    </div>

                 </form>
              </div>
              
              <div class="col-md-6 col-sm-6 col-xs-1 text-right mobile-hidden">

                   <?php if($loggedIn){ ?>
                   
                      <a class="mobile-hidden color-white" href="<?php echo base_url('user/' . $this->session->userdata('nameSlug')); ?>">@<?php echo $this->session->userdata('nameSlug'); ?>&nbsp;</a> 
                   
                   <?php } else { ?>

                      <a class="mobile-hidden color-white" href="<?php echo base_url('signup') ?>">Bliv medlem&nbsp;</a>
                      <a class="mobile-hidden color-white" href="<?php echo base_url('login') ?>">Log ind <i class="fa fa-lock"></i>&nbsp;&nbsp;</a>
                   
                   <?php } ?>
                   
                   <a class="btn btn-sm btn-warning mobile-hidden" href="<?php echo base_url('create-ad/images'); ?>">Opret annonce&nbsp;</a> 
                   <a style="line-height:32px;" href="#" data-target="#menuModal" data-toggle="modal" >;<i class="fa fa-bars color-white fs18"></i></a>

             </div>

         </div>

    </div><!-- container -->

</div><!-- bg-dark-theme -->






 <style type="text/css">
 /* #category-search-results{ 
    position: absolute;width:100%; z-index: 500;left:0;
  }*/
  #category-search-results a:first-child{
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
  }
</style>
<div class="container" style="position:relative;">
  <div class="row">
   <div class="list-group mb0" id="category-search-results" style="display:none;">Minimum 2 bogstaver.. <i class="fa fa-spinner fa-spin text-center"></i></div>
 </div>
</div>