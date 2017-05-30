<?php
  $modules = $this->userModules;
  $c_modules = count($modules);
?>

<!--slider menu-->
    <div class="sidebar-menu">
  	<div class="logo">
      <a href="#" class="sidebar-icon">
        <span class="fa fa-bars"></span>
      </a>
      <a href="#">
        <span id="logo" ></span>
  	  </a>
    </div>
    <div class="menu">
      <ul id="menu">
				<?php for($i = 0; $i < $c_modules; $i++) {
          if($modules[$i]["lmodule"] == "---") {
					?>
					<li><a href="<?php echo $modules[$i]["redirect"]?>"><i class="<?php echo $modules[$i]["icon"];?>"></i><span><?php echo $modules[$i]["name"]?></span></a></li>
					<?php
          }
          else {
            ?>
              <li><a href="<?php echo $modules[$i]["redirect"]?>"><i class="<?php echo $modules[$i]["icon"];?>"></i><span> <?php echo $modules[$i]["name"]; ?> </span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <div class="sidebar-submenu">
                  <ul>
                  <?php
                    $lmodule = json_decode($modules[$i]["lmodule"]);
                    foreach($lmodule as $key => $value) {
                  ?>
                      <li><a href="<?php echo $value; ?>"><?php echo $key; ?></a></li>
                  <?php
                    }
                  ?>
    		          </ul>
                </div>
  		        </li>

            <?php
          }
				}
      ?>
      </ul>
    </div>
	 </div>
	<div class="clearfix"> </div>
<!--slide bar menu end here-->
<script>
var toggle = false;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    if($(window).width() > 800) {
      $("#menu span").css({"position":"absolute"});
    }
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
      setTimeout(function() {
        $("#menu span").css({"position":"relative"});
      }, 400);
  }
  toggle = !toggle;
});
</script>
