<?php

function debug_to_console($data)
{
        echo "<script>console.log('PHP: ".json_encode($data)."');</script>";
}

function has_specchar($x,$excludes=array()){
    if (is_array($excludes)&&!empty($excludes)) {
        foreach ($excludes as $exclude) {
            $x=str_replace($exclude,'',$x);
        }

        return $x;
    }
    if (preg_match('/[^a-z0-9 ]+/i',$x)) {
        $x = preg_replace('/[^A-Za-z0-9\-]/', '', $x);
        return $x;
    }
    return $x;
}

function createDir($path) {
  if (is_dir($path)) return true;
  $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
  $return = createDir($prev_path);
  return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}
