<?php
   error_reporting(E_ALL);
   $mysqli = new mysqli(
    "localhost",
    "",
    "",
    "astoundi_shoplist"
   );
   $query = $mysqli->prepare(<<<MATCH
    select id, description
    from shoplist
    where description like ?
    limit 10
MATCH
   );
   $compare = "%".$_GET["partial"]."%";
   $query->bind_param("s", $compare);
   # Build array of matches
   $query->execute();
   $res = $query->get_result();
   $matches = [];
   while ($row = $res->fetch_row()) {
    $matches[] = Array("id"=>$row[0], "description"=>$row[1]);
   }
   $query->close();
   $mysqli->close();
   # Now to serialize as JSON
   # echo json_encode(json_encode($res->fetch_all()));
   # echo json_encode($res->fetch_all());
   echo json_encode($matches);
?>

