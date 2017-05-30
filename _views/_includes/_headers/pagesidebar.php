<?php
  $modules = $this->userModules;
  $c_modules = count($modules);
?>

<div id="page-sidebar">
<div id="header-logo" class="logo-bg">
    <a href="/Index" class="logo-content-big" title="DelightUI">
         <i></i>
        <span></span>
    </a>
    <a id="close-sidebar" href="#" title="Close sidebar">
        <i class="glyph-icon icon-outdent"></i>
    </a>
</div>
<div class="scroll-sidebar">
    <ul id="sidebar-menu">
<li class="header"><span>Modulok</span></li>

<?php
for($i = 0; $i < $c_modules; $i++) {
  if($modules[$i]["lmodule"] == "---") {
  ?>
  <li>
      <a href="<?php echo $modules[$i]["redirect"]; ?>" title="<?php echo $modules[$i]["name"]; ?>">
          <i class="<?php echo $modules[$i]["icon"]; ?>"></i>
          <span><?php echo $modules[$i]["name"]; ?></span>
      </a>
  </li>
    <?php
  }
  else {
  ?>
  <li>
      <a href="<?php echo $modules[$i]["redirect"]; ?>" title="<?php echo $modules[$i]["name"]; ?>">
          <i class="<?php echo $modules[$i]["icon"]; ?>"></i>
          <span><?php echo $modules[$i]["name"]; ?></span>
      </a>
      <div class="sidebar-submenu">
          <ul>
  <?php
  $lmodule = json_decode($modules[$i]["lmodule"]);
    foreach($lmodule as $key => $value) {
    ?>
      <li><a href="<?php echo $value; ?>" title="<?php echo $key; ?>"><span><?php echo $key; ?></span></a></li>
    <?php
    }
  ?>
</ul>

</div><!-- .sidebar-submenu -->
</li>
  <?php
  }
}
?>
</ul><!-- #sidebar-menu -->
</div>
</div>
