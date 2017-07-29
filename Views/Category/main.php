<body>
    <div class="container">
          <div class="box">
            <div class="boxTitle">
              <div class="boxTitleTitle">Kategória neve</div>
              <div class="boxTitleArrow">
                <i class="fa fa-arrow-left"></i>
              </div>
            </div>
            <div class="row">
                <?php for ($i = 1; $i <= 41; $i++) { ?>
                    <div class="col-lg-4 col-md-6 col-xs-12 shopHolder">
                        <div class="boxAboutRow row">
                            <div class="col-xs-6 boxAboutImgHolder">
                                <img class="boxAboutIcon img-responsive" src="http://via.placeholder.com/160x160">
                            </div>
                            <div class="col-xs-6 boxAboutDataHolder">
                                <div class="">
                                <h3 style="margin-bottom: 30px;">Boltnev</h3>
                                <a href="www.bolt.hu"><h4><i class="fa fa-wifi icon"></i>www.bolt.hu</h4></a>
                                <h4><i class="fa fa-phone icon"></i>+36306665544</h4>
                                </div>
                                </div>
                            </div>
                    </div>
                        <?php
                        }
                        ?>
            </div>
          </div>
    </div>
</body>