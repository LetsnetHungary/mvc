

<?php header("Content-type: text/html; charset=utf-8"); ?>

<?php $shops = $this->shops;?>
<head>
<meta charset="utf-8">
<title>Webshoplap.hu</title>
<base target="_self">
<meta name="description" content="Magyarország összes webshopja egy helyen" />
<meta name="twitter:title" content="Webshoplap.hu">
<meta name="twitter:description" content="Magyarország összes webshopja egy helyen">
<meta name="twitter:image" content="/img/logo.png">
<meta property="og:title" content="Webshoplap.hu" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://webshoplap.hu/" />
<meta property="og:image" content="http://webshoplap.hu/img/logo.png" />
<meta property="og:description" content="Magyarország összes webshopja egy helyen" />
<meta property="fb:admins" content="1261262102,100000893412243" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>
  <div class="container">
      <div class="row">
        <!-- itt kezdődik a váz -->
        <?php foreach($shops as $key => $value) {

       ?>
       <div class="boxHolder col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="box">
            <div class="boxTitle">
              <div class="boxTitleTitle"><?php echo $key; ?></div>
              <div class="boxTitleArrow">
                <i class="fa fa-arrow-right"></i>
              </div>
            </div>
            <div class="boxContent">
              <?php foreach($value as $shop) { ?>
                <div class="boxRow" data-id="<?php echo $shop['id'] ?>">
                  <?php echo $shop["name"]; ?>
                </div>
            <?php } ?>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
        <!-- itt végződik a váz -->
      </div>
      <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
      <script type="text/javascript">
    window.cookieconsent_options = {"message":"Ez a weboldal cookie-kat (s&#xFC;tiket) haszn&#xE1;l az&#xE9;rt, hogy weboldalunk haszn&#xE1;lata sor&#xE1;n a lehet&#x151; legjobb &#xE9;lm&#xE9;nyt tudjuk biztos&#xED;tani.  A weboldalunkon t&#xF6;rt&#xE9;n&#x151; tov&#xE1;bbi b&#xF6;ng&#xE9;sz&#xE9;ssel hozz&#xE1;j&#xE1;rul a cookie-k haszn&#xE1;lat&#xE1;hoz.","dismiss":"Meg&#xE9;rtettem","learnMore":"Tov&#xE1;bbi inf&#xF3;","link":"http://webshoplap.hu/docs/adatvedelmi_szabalyzat.pdf","theme":"dark-top"};
</script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
      <!-- End Cookie Consent plugin -->
      <div class="device-xs visible-xs"></div>
  <div class="device-sm visible-sm"></div>
  <div class="device-md visible-md"></div>
  <div class="device-lg visible-lg"></div>
    </body>
