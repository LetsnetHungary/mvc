<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <?
      foreach ($configjson as $key => $value) {
        foreach ($value as $k => $v) {
          ?>
          <link rel="stylesheet" type="text/css" href="<? echo $v; ?>">
          <?
        }
      }
    ?>

  </head>
  <body>
