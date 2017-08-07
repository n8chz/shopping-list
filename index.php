<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF8">
<title>Shopping list</title>
<style>
@media (min-width: 858px) {
    html {
        font-size: 22px;
    }
}

@media (min-width: 780px) {
    html {
        font-size: 21px;
    }
}

@media (min-width: 702px) {
    html {
        font-size: 20px;
    }
}

@media (min-width: 724px) {
    html {
        font-size: 29px;
    }
}

@media (max-width: 623px) {
    html {
        font-size: 28px;
    }
}
.budget {
 border: 1px solid #2b0874;
}
.amount {
 font-weight: bold;
}
.amount:before {
 content: "$";
}
body {
 background-color: #ccf19e;
 color: #2b0874;
 font: "Port Lligat Sans";
 padding: 1em;
}
body>div {
 border: solid 5px #880;
 background: #a8d9e9;
 padding: 1em;
}
.n {
 display: none;
}
</style>
</head>
<body>
<div>
  <?php
   # error_reporting(E_ALL);
   $mysqli = new mysqli(
    "localhost",
    "",
    "",
    "astoundi_shoplist"
   );
   if ($errno = $mysqli->connect_errno)
   {
    echo "<p>MySQL error #$errno</p>\n";
   }
   else
   {
    $query = $mysqli->query("show tables");
    if (!($query->fetch_row())) {
     echo "<!-- About to create shoplist table -->\n";
     require("./create.php");
     init_db($mysqli);
     echo "<!-- Done creating shoplist table -->\n";
    }
    $query = $mysqli->query(<<<SELECT
     select id, description from shoplist where include
SELECT
    );
    require("./disp_item.php");
    echo "<div id=\"items\">\n";
    while ($row = $query->fetch_row()) {
     disp_item($row);
    }
    echo "</div>\n";
   }
  ?>
  <input id="new" autofocus list="matches" />
  <datalist id="matches">
  </datalist>
  <button id="add">+</button>
  <script src="./jquery.js"></script>
  <script src="./control.js"></script>
</div>



</body></html>
