<?

require_once ("config.php");

$tablesQuery = mysqli_query($link, "SELECT * FROM tables");
$columnsQuery = mysqli_query($link, "SELECT * FROM columns");
$rowsQuery = mysqli_query($link, "SELECT * FROM rows");
$valuesQuery = mysqli_query($link, "SELECT * FROM `values`");

$tables = [];
$columns = [];
$rows = [];
$values = [];

while($tablesData = mysqli_fetch_array($tablesQuery)){
  array_push($tables, $tablesData);
}
while($columnsData = mysqli_fetch_array($columnsQuery)){
  array_push($columns, $columnsData);
}
while($rowsData = mysqli_fetch_array($rowsQuery)){
  array_push($rows, $rowsData);
}
while($valuesData = mysqli_fetch_array($valuesQuery)){
  array_push($values, $valuesData);
}

echo "<pre>";
print_r($tables);
print_r($columns);
print_r($rows);
print_r($values);
echo "</pre>";

$tablesSize = count($tables);
$columnsSize = count($columns);
$rowsSize = count($rows);

$i=0; $j=0;

foreach($tables as $table){
  foreach($columns as $column){
    if($column["table"]==$table["id"]){
      $i++;
      print_r("column - ".$table["header"]);
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
</body>
</html>