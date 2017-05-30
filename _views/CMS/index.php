<?php
$sitekey = $this->sitekey;
$page = $this->page
 ?>
 <div id="sb-site">

   <!-- MESSAGES -->
 <?php require '_views/_includes/_headers/messageside.php'; ?>

 <!-- STATISTICS -->
 <?php require '_views/_includes/_headers/statisticsside.php'; ?>

 <div id="loading">
     <div class="svg-icon-loader">
         <img src="../../assets/images/svg-loaders/bars.svg" width="40" alt="">
     </div>
 </div>

 <div id="page-wrapper">
     <div id="mobile-navigation">
 <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
 </div>

 <!-- SIDEBAR -->
 <?php require '_views/_includes/_headers/pagesidebar.php'; ?>
     <div id="page-content-wrapper">
         <div id="page-content">
               <!-- HEADER -->
              <?php
                require '_views/_includes/_headers/_mainHeader.php';
              ?>

              <div id="page-title">
                <h2>Tartalomkezelő rendszer</h2>
              </div>

              <?php require "_cms/$sitekey/_views/$page.php"; ?>
             </div>
         </div>
     </div>
<!-- WIDGETS -->
 <!-- Bootstrap Dropdown -->

 <script type="text/javascript" src="../../assets/widgets/dropdown/dropdown.js"></script>

 <!-- Bootstrap Tooltip -->

 <script type="text/javascript" src="../../assets/widgets/tooltip/tooltip.js"></script>
 <script type="text/javascript" src="../../assets/widgets/carousel/carousel.js"></script>

 <!-- Bootstrap Popover -->

 <script type="text/javascript" src="../../assets/widgets/popover/popover.js"></script>

 <!-- Bootstrap Progress Bar -->

 <script type="text/javascript" src="../../assets/widgets/progressbar/progressbar.js"></script>

 <!-- Bootstrap Buttons -->

 <script type="text/javascript" src="../../assets/widgets/button/button.js"></script>

 <!-- Bootstrap Collapse -->

 <script type="text/javascript" src="../../assets/widgets/collapse/collapse.js"></script>

 <!-- Superclick -->

 <script type="text/javascript" src="../../assets/widgets/superclick/superclick.js"></script>

 <!-- Input switch alternate -->

 <script type="text/javascript" src="../../assets/widgets/input-switch/inputswitch-alt.js"></script>

 <!-- Slim scroll -->

 <script type="text/javascript" src="../../assets/widgets/slimscroll/slimscroll.js"></script>

 <!-- Slidebars -->

 <script type="text/javascript" src="../../assets/widgets/slidebars/slidebars.js"></script>
 <script type="text/javascript" src="../../assets/widgets/slidebars/slidebars-demo.js"></script>

 <!-- PieGage -->

 <script type="text/javascript" src="../../assets/widgets/charts/piegage/piegage.js"></script>
 <script type="text/javascript" src="../../assets/widgets/charts/piegage/piegage-demo.js"></script>

 <!-- Screenfull -->

 <script type="text/javascript" src="../../assets/widgets/screenfull/screenfull.js"></script>

 <!-- Content box -->

 <script type="text/javascript" src="../../assets/widgets/content-box/contentbox.js"></script>

 <!-- Material -->

 <script type="text/javascript" src="../../assets/widgets/material/material.js"></script>
 <script type="text/javascript" src="../../assets/widgets/material/ripples.js"></script>


 <!-- Overlay -->

 <script type="text/javascript" src="../../assets/widgets/overlay/overlay.js"></script>

 <!-- Widgets init for demo -->

 <script type="text/javascript" src="../../assets/js-init/widgets-init.js"></script>

 <!-- Theme layout -->

 <script type="text/javascript" src="../../assets/themes/admin/layout.js"></script>

 <!-- CMS script -->

 <script type="text/javascript" src="../../_assets/_js/CMS/<? echo $this->wname; ?>/<?php echo $this->cmsname; ?>.js"></script>

 </div>
