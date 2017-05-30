<?php $pagemodules = $this->pageModules; ?>

<div id="sb-site">

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
        <?php require '_views/_includes/_headers/_mainHeader.php'; ?>

        <!-- jQueryUI Spinner -->
        <script type="text/javascript" src="../../assets/widgets/spinner/spinner.js"></script>

        <script type="text/javascript">
          /* jQuery UI Spinner */

          $(function() { "use strict";
            $(".spinner-input").spinner();
          });
        </script>

        <!-- jQueryUI Autocomplete -->

        <script type="text/javascript" src="../../assets/widgets/autocomplete/autocomplete.js"></script>
        <script type="text/javascript" src="../../assets/widgets/autocomplete/menu.js"></script>
        <script type="text/javascript" src="../../assets/widgets/autocomplete/autocomplete-demo.js"></script>

        <!-- Touchspin -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/touchspin/touchspin.css">-->
        <script type="text/javascript" src="../../assets/widgets/touchspin/touchspin.js"></script>
        <script type="text/javascript" src="../../assets/widgets/touchspin/touchspin-demo.js"></script>

        <!-- Input switch -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/input-switch/inputswitch.css">-->
        <script type="text/javascript" src="../../assets/widgets/input-switch/inputswitch.js"></script>

        <script type="text/javascript">
          /* Input switch */

          $(function() { "use strict";
            $('.input-switch').bootstrapSwitch();
          });
        </script>

        <!-- Textarea -->

        <script type="text/javascript" src="../../assets/widgets/textarea/textarea.js"></script>
        <script type="text/javascript">
          /* Textarea autoresize */

          $(function() { "use strict";
            $('.textarea-autosize').autosize();
          });
        </script>

        <!-- Multi select -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/multi-select/multiselect.css">-->
        <script type="text/javascript" src="../../assets/widgets/multi-select/multiselect.js"></script>
        <script type="text/javascript">
          /* Multiselect inputs */

          $(function() { "use strict";
            $(".multi-select").multiSelect();
            $(".ms-container").append('<i class="glyph-icon icon-exchange"></i>');
          });
        </script>

        <!-- Uniform -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/uniform/uniform.css">-->
        <script type="text/javascript" src="../../assets/widgets/uniform/uniform.js"></script>
        <script type="text/javascript" src="../../assets/widgets/uniform/uniform-demo.js"></script>

        <!-- Chosen -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/chosen/chosen.css">-->
        <script type="text/javascript" src="../../assets/widgets/chosen/chosen.js"></script>
        <script type="text/javascript" src="../../assets/widgets/chosen/chosen-demo.js"></script>

        <div id="page-title">
          <h2>Rendelések kezelése</h2>
        </div>

        <!-- PAGEMODULES -->

          <?php $this->loadPageModules("letsnet", $pagemodules); ?>

        <!-- PAGEMODULES END -->

      </div>
    </div>
  </div>

<!-- WIDGETS -->

<!-- Bootstrap Dropdown -->

<script type="text/javascript" src="../../assets/widgets/dropdown/dropdown.js"></script>

<!-- Bootstrap Tooltip -->

<script type="text/javascript" src="../../assets/widgets/tooltip/tooltip.js"></script>

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

</div>
