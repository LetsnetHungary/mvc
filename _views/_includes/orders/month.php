<?php

foreach ($data as $key => $value) {
		foreach ($value as $monthkey => $monthval) {
			?>
						<h2 class = "sub-header"><?php echo $key."/". $monthkey;?></h2>
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
								<?php

										for($i = 0; $i < count($monthval); $i++)
										{
                      if($monthval[$i]["visible"] == "0") {
                        continue;
                      }

											$cart = json_decode($monthval[$i]["cart"]);
											?>
                      <tr class = "orderline orderView

                      <?php

                       if($monthval[$i]["state"] == "2") {
                         echo "success";
                       }
                       else if($monthval[$i]["state"] == "1") {
                         echo "warning";
                       }
                       else {
                         echo "danger";
                       }

                     ?>"
									data-id="<?php echo $monthval[$i]["id"];?>"
									>
										<td><?php echo count($monthval) - $i;?></td>
										<td><?php echo $monthval[$i]["datee"];?></td>
										<td><?php
											foreach ($cart as $keyb => $bracelet) {
												echo "$bracelet->prod_name ($bracelet->count) <br>";
											}

										 ?></td>
										<td><?php echo $monthval[$i]["name"];?></td>
										<td><?php echo $monthval[$i]["email"];?></td>
										<td><?php echo $monthval[$i]["phone"];?></td>
										<td><?php echo $monthval[$i]["type"];?></td>
										<td><?php
										if($monthval[$i]["state"] == 0)
										{
											echo "Nincs kezelve";
										}
										else if($monthval[$i]["state"] == 1)
										{
											echo "Kiszállítás alatt";
										}
										else if($monthval[$i]["state"] == 2)
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
	}

?>
