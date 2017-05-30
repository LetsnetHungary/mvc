<div class="modal fade" tabindex="-1" role="dialog" id = "ordermodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Vásárlás  -   November 15, 2016, 3:16 pm</h4>
      </div>
      <div class="modal-body">
          <div class = "row">
            <div class = "col-md-7 orederw">
              <h3>Vásárló adatok</h3>
              <br>
              <h4>Vásárló neve : </h4> <span class="little" id="vname"></span>
              <!-- <h4>Kosár tartalma : </h4> <span class="little" id="vorder"></span> -->
              <h4>Vásárló e-mail címe : </h4>  <span class="little" id="vemail"><a href="../../../index.php"></a></span>
              <h4>Vásárló telefonszáma : </h4> <span class="little" id="vphone"></a></span>
              <h4>Vétel típusa : </h4> <span class="little" id="vtype"></span>
              <h4>ÁFÁ-s számla : </h4> <span class="little" id="vafa"></span>
              <h4>Állapot : </h4> <span class="little" id="vstate"></span>
            </div>
            <div class = "col-md-5 orederw" id = "vpickpackdata">
              <h3>Pick Pack adatok</h3>
              <h4>Megye : </h4> <span class="little" id="vpickpackmegye">Budapest</span>
              <h4>Város : </h4> <span class="little" id="vpickpackvaros">Budapest</span>
              <h4>Cím : </h4>  <span class="little" id="vpickpackcim">1053 Reáltanoda u. 7</span>
              <h4>Boltnév : </h4> <span class="little" id="vpickpackbolt">Eötvös József Gimnézium</span>
              <h4>Postakód : </h4> <span class="little" id="vpickpackkod">1053</span>
              <h4>Boltkód : </h4> <span class="little" id="vpickpackboltkod">1053</span>
            </div>
            <br>
          </div>

          <div class="row">
            <div class="col-md-7">
              <h3>Összegzés</h3>
              <div class="col-md-12" id = "orders">

              </div>
            </div>
            <div class="col-md-5">
              <div col-md-12 id = "vafadata">
                <h3>Áfás adatok</h3>
                <h4>Áfás számla név:</h4>
                <h5 id = "vafaname"></h5>
                <h4>Áfás számla cím:</h4>
                <h5 id = "vafaadress"></h5>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div id="order_info_holder" data-id="a" data-state="b"></div>
        <button type="button" id="order_delete" class="btn btn-danger" data-dismiss="modal" style="float: left;">Törlés</button>
        <button type="button" data-state="0" class="btn btn-danger order_function" data-dismiss="modal">Nincs kezelve</button>
        <button type="button" data-state="1" class="btn btn-warning order_function" data-dismiss="modal">Kiszállítás alatt</button>
        <button type="button" data-state = "2" class="btn btn-success order_function" data-dismiss="modal">Kiszállítva</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
