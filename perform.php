<?php
$x = 100000000000000000000000000;
$p = "KAMI-ADMIN";
for ($i = 0; $i < $x; $x++) {
  $R = str_split($p);
  for ($t = 0; $t < count($R); $t++) {
    $e = chr($R[$t]);
    $e * $x;
  }
}
