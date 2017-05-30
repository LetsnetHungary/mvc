<div id="loading">
    <div class="svg-icon-loader">
        <img src="../../assets/images/svg-loaders/bars.svg" width="40" alt="">
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
        overflow: hidden;
    }

</style>


<script type="text/javascript" src="../../assets/widgets/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>


<img src="../../assets/image-resources/blurred-bg/blurred-bg-3.jpg" class="login-img wow fadeIn" alt="">

<div class="center-vertical">
    <div class="center-content">

        <div class="col-md-3 center-margin">

                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-spin-5 icon spin"></i>
                        </span>
                        <span class="header-wrapper">
                            Készülékkulcs
                            <small>Csak regisztrált felhasználóknak!</small>
                        </span>
                    </h3>
                    <div class="content-box-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" id="me" placeholder="Email">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                        <input type = "button" class="btn btn-success btn-block" id="k" value = "Készülékkulcs küldése emailben!">
                    </div>
                </div>
        </div>

    </div>
</div>

<!-- Theme layout -->

<script type="text/javascript" src="../../assets/themes/admin/layout.js"></script>

<!-- Fingerprint -->

<script type="text/javascript" src="../../_assets/_js/_fingerprint/fingerprint2.min.js"></script>
