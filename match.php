<?php
   #error_reporting(E_ALL);
   require("./db-params.php");
   $mysqli = new mysqli(
    $DB_URL,
    $DB_USER,
    $DB_PW,
    $DB_NAME
   );
   if ($errno = $mysqli->connect_errno) {
    echo "<p>MySQL error #$errno</p>\n";
   }
   $query = $mysqli->prepare(<<<MATCH
    select id, description
    from shoplist
    where description like ?
    limit 10
MATCH
   );
   # Is entered text a substring of one or more descriptions?
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
   echo json_encode($matches);
?>

