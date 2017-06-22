<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php echo $this->charset;?>">
  <title><?php echo $this->title;?></title>

<!-- SEO -->
<?php

// Meta tags

if($this->seo != null)
{
foreach($this->seo->meta as $meta => $data)
{
?>
		<meta name="<?php echo $meta; ?>" content = "<?php echo $data; ?>">
<?php
}

// Facebook tags

foreach($this->seo->og as $og => $data)
{
?>
		<meta property="og:<?php echo $og; ?>" content = "<?php echo $data; ?>"/>
<?php
}
}
?>

<!-- Custom CSS -->

<?php
if($this->cssdata != null)
{
foreach($this->cssdata as $cssdata)
{
?>
		<link type="text/css" rel="stylesheet" href = "<?php echo $cssdata ?>">
<?php
}
}
?>

<!-- Custom JS -->

<?php
if($this->jsdata != null) {
  foreach($this->jsdata as $jsd) {
      ?>
      <script type="text/javascript" src="<?php echo $jsd?>" ></script>
      <?php
  }
}
?>

</head>
  <body>
