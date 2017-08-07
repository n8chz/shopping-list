<?php
 function disp_item($row) {
  echo "<div class=\"item\">\n";
  echo "<button class=\"delete\" data-shoplist-id=\"${row[0]}\">x</button>\n";
  echo "<span>${row[1]}</span>\n";
  echo "</div>\n";
 }
?>

