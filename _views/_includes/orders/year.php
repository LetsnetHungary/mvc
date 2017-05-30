<?php

foreach($data as $key => $value) {
  //print_r($value);
  //print_r(count($value));
  ?>
  <h2 class = "sub-header"><?php echo $key;?></h2>
  <div class="table">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Dátum</th>
          <th>Kosár</th>
          <th>Név</th>
          <th>E-mail</th>
          <th>Telefon</th>
          <th>Típus</th>
          <th>Állapot</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $cv = count($value);
          $k = 0;
          for($i = 0; $i < $cv; $i++)
          {
            $cart = json_decode($value[$i]["cart"]);
            ?>
            <tr class = "orderline orderView

            <?php

             if($value[$i]["state"] == "2") {
               echo "success";
             }
             else if($value[$i]["state"] == "1") {
               echo "warning";
             }
             else {
               echo "danger";
             }

           ?>"
        data-id="<?php echo $value[$i]["id"];?>"
        >
          <td><?php echo $cv - $k; $k++;?></td>
          <td><?php echo $value[$i]["datee"];?></td>
          <td><?php

            foreach ($cart as $keyb => $bracelet) {
              echo "$bracelet->prod_name ($bracelet->count) <br>";
            }
           ?></td>
          <td><?php echo $value[$i]["name"];?></td>
          <td><?php echo $value[$i]["email"];?></td>
          <td><?php echo $value[$i]["phone"];?></td>
          <td><?php echo $value[$i]["type"];?></td>
          <td><?php
          if($value[$i]["state"] == 0)
          {
            echo "Nincs kezelve";
          }
          else if($value[$i]["state"] == 1)
          {
            echo "Kiszállítás alatt";
          }
          else if($value[$i]["state"] == 2)
          {
            echo "Kiszállítva";
          }

          ?></td>
        </tr>
        <?php
          }

        ?>

      </tbody>
    </table>
  </div>
  <?php

}
?>
