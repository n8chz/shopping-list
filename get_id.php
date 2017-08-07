<?php
  # return id corresponding with definition column matching second arg, if any
  # if no match, return -1
  function get_id($mysqli, $description) {
    $query = $mysqli->prepare(<<<FIND
      select id
      from shoplist
      where description = ?
FIND
    );
    $query->bind_param("s", $description);
    $query->execute();
    $res = $query->get_result();
    $row = $res->fetch_row();
    #$query->close();
    if ($row) {
      return $row[0];
    }
    else {
      return -1;
    }
  }
?>

