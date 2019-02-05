<?
require_once ("config.php");

$queryTables = mysqli_query($link, "SELECT * FROM tables");

$tables = [];

while($dataTables = mysqli_fetch_array($queryTables)){
  array_push($tables, $dataTables);
}

for($i=0; $i<count($tables); $i++){
  $columns[$i]=[];
  $rows[$i]=[];
  $values[$i]=[];


  $queryColumns[$i] = mysqli_query($link, "SELECT * FROM columns WHERE `table`=$i");
  $queryRows[$i] = mysqli_query($link, "SELECT * FROM rows WHERE `table`=$i");
  $queryValues[$i] = mysqli_query($link, "SELECT * FROM `values` WHERE `table`=$i");

  while($dataColumns = mysqli_fetch_array($queryColumns[$i])){
    array_push($columns[$i], $dataColumns);
  }
  while($dataRows = mysqli_fetch_array($queryRows[$i])){
    array_push($rows[$i], $dataRows);
  }
  while($dataValues = mysqli_fetch_array($queryValues[$i])){
    array_push($values[$i], $dataValues);
  }
}

$jsonValues = json_encode($values);
$jsonTables = json_encode($tables);

echo "<script>let values = $jsonValues; let tables = $jsonTables;</script>";

// echo "<pre>";
// print_r($tables);
// print_r($columns);
// print_r($rows);
// print_r($values);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="node_modules\jquery\dist\jquery.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <?for($i=0; $i<count($tables); $i++):?>
    <table class="table" title=<?=$tables[$i]["id"];?>>
      <caption><?=$tables[$i]["header"];?></caption>
      <?for($j=0; $j<count($rows[$i]); $j++):?>
      <tr class="row" title=<?=$rows[$i][$j]["number"];?>>
          <?for($k=0; $k<count($columns[$i]); $k++):?>
            <th><?=$columns[$i][$k]["name"]?></th>
            <td class="column" style="background: <?=$rows[$i][$j]["color"];?>" title=<?=$columns[$i][$k]["number"];?>></td>
          <?endfor?>
      </tr>
      <?endfor?>
    </table>
    <div class="add">Add</div>
  <?endfor?>
  <div class="form"></div>
</body>
</html>