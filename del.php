<?php
  $id = $_POST["id"];
  require("./db-params.php");
  $mysqli = new mysqli(
    $DB_URL,
    $DB_USER,
    $DB_PW,
    $DB_NAME
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

