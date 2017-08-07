<?php
  $description = $_POST["description"];
  #$description = "vitamin c";
  $mysqli = new mysqli(
    "localhost",
    "",
    "",
    "astoundi_shoplist"
  );
  require("./get_id.php");
  $id = get_id($mysqli, $description);
  if ($id != -1) { # description found in table
    $query = $mysqli->prepare(<<<UPDATE
      update shoplist
      set include=true
      where id = ?
UPDATE
    );
    $query->bind_param("i", $row[0]);
    $query->execute();
    $query->close();
  }
  else { # description not in table...add it
    $query = $mysqli->prepare(<<<ADD
      insert into shoplist(description, include) values
      (?, true)
ADD
    );
    if (!$query) echo $query->error."\n".$mysqli->error."\n";
    $query->bind_param("s", $description);
    $query->execute();
    $query->close();
    $id = get_id($mysqli, $description);
  }
  $mysqli->close();
  echo $id;
?>

