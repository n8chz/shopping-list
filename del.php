<?php
  $id = $_POST["id"];
  $mysqli = new mysqli(
    "localhost",
    "",
    "",
    "astoundi_shoplist"
  );
  $query = $mysqli->prepare(<<<DEL
    update shoplist
    set include = false
    where id = ?
DEL
  );
  $query->bind_param("i", $id);
  $query->execute();
  $query->close();
  $mysqli->close();
?>

