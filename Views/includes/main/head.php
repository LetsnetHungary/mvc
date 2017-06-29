<!DOCTYPE html>
<html>
	<head>
	<? if($this->SEO) {?>
		<meta charset = "<?php echo $this->SEO->seo->charset; ?>">
		<title><?php echo $this->SEO->seo->title; ?></title>

<?php
if($this->SEO->seo->meta != null)
{
foreach($this->SEO->seo->meta as $meta => $data)
{
?>
		<meta name="<?php echo $meta; ?>" content = "<?php echo $data; ?>">
<?php
}

foreach($this->SEO->seo->og as $og => $data)
{
?>
		<meta property="og:<?php echo $og; ?>" content = "<?php echo $data; ?>"/>
<?php
}
}
?>

<?php
if($this->SEO->css != null)
{
foreach($this->SEO->css as $cssdata)
{
?>
		<link type="text/css" rel="stylesheet" href = "<?php echo $cssdata ?>">
<?php
}
}
?>

<?php
if($this->SEO->fonts != null)
{
foreach($this->SEO->fonts as $fontdata)
{
?>
		<link rel="stylesheet" href = "<?php echo $fontdata ?>">
<?php
}
}
?>

<?php
if($this->SEO->js != null)
{
foreach($this->SEO->js as $jsdata)
{
?>
      <script type="text/javascript" src = "<?php echo $jsdata ?>"></script>
<?php
}
}
?>
	</head>
	<body>

	<? }else {
?>
		<title>Letsnet</title>
	</head>
	<body>
<?	} ?>
