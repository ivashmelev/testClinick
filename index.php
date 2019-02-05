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
// $columns = json_encode($columns);
// $rows = json_encode($rows);
// $values = json_encode($values);
// $sizeTables = json_encode($tables);


echo "<pre>";
echo "tables - "; print_r($tables);
echo "columns - "; print_r($columns);
echo "rows - "; print_r($rows);
echo "values - "; print_r($values);
echo "</pre>";

// $tablesSize = count($tables);
// $columnsSize = count($columns);
// $rowsSize = count($rows);

$i=0; $j=0;

// for($i=0; $i<count($tables); $i++){
//   // foreach($columns as $column){
//     if($columns[0]["table"]==$tables[0]["id"]){
//       // print_r(count($columns));
//       print_r($columns[0]);
//     }

//   // }
// }
// $arrSizeColumn=[];
// for($i=0; $i<count($tables); $i++){
//   $querySizeColumn[$i] = mysqli_query($link, "SELECT * FROM columns WHERE `table`=$i");
//   while($valuesSizeColumn = mysqli_fetch_array($querySizeColumn[$i])){
//     // array_push($arrSizeColumn, $valuesSizeColumn);
//     echo "<pre>"; print_r($valuesSizeColumn); echo "</pre>";
//   }
// }
// $arrSizeColumn[0]=[];
// $arrSizeColumn[1]=[];


// $querySizeColumn[0] = mysqli_query($link, "SELECT * FROM columns WHERE `table`=0");
// $querySizeColumn[1] = mysqli_query($link, "SELECT * FROM columns WHERE `table`=1");
// while($valuesSizeColumn = mysqli_fetch_array($querySizeColumn[0])){
//   array_push($arrSizeColumn[0], $valuesSizeColumn);
//   // echo "<pre>"; print_r($valuesSizeColumn); echo "</pre>";
// }
// while($valuesSizeColumn = mysqli_fetch_array($querySizeColumn[1])){
//   array_push($arrSizeColumn[1], $valuesSizeColumn);
//   // echo "<pre>"; print_r($valuesSizeColumn); echo "</pre>";
// }

for($i=0; $i<count($tables); $i++){
  $sizeColumns[$i]=[];
  $sizeRows[$i]=[];
  $sizeValues[$i]=[];
  $sizeTables[$i]=[];


  $querySizeTables[$i] = mysqli_query($link, "SELECT * FROM tables WHERE `id`=$i");
  $querySizeColumns[$i] = mysqli_query($link, "SELECT * FROM columns WHERE `table`=$i");
  $querySizeRows[$i] = mysqli_query($link, "SELECT * FROM rows WHERE `table`=$i");
  $querySizeValues[$i] = mysqli_query($link, "SELECT * FROM `values` WHERE `table`=$i");

  while($valuesSizeColumns = mysqli_fetch_array($querySizeColumns[$i])){
    array_push($sizeColumns[$i], $valuesSizeColumns);
  }
  while($valuesSizeRows = mysqli_fetch_array($querySizeRows[$i])){
    array_push($sizeRows[$i], $valuesSizeRows);
  }
  while($valuesSizeValues = mysqli_fetch_array($querySizeValues[$i])){
    array_push($sizeValues[$i], $valuesSizeValues);
  }
  while($valuesSizeTables = mysqli_fetch_array($querySizeTables[$i])){
    array_push($sizeTables[$i], $valuesSizeTables);
  }
}


echo "<pre>";
print_r($sizeColumns);
echo "</pre>";
echo "<pre>";
print_r($sizeRows);
echo "</pre>";
echo "<pre>";
print_r($sizeValues);
echo "</pre>";



for($i=0; $i<count($sizeColumns); $i++){
  $countColumns[$i]=count($sizeColumns[$i]);
}

for($i=0; $i<count($sizeRows); $i++){
  $countRows[$i]=count($sizeRows[$i]);
}

for($i=0; $i<count($sizeValues); $i++){
  $countValues[$i]=count($sizeValues[$i]);
}

// $sizeColumns = json_encode($sizeColumns);
// $sizeRows = json_encode($sizeRows);
// $sizeValues = json_encode($sizeValues);
// $sizeTables = json_encode($sizeTables);

echo "<script> 
  let arrValues = $sizeValues;
  let arrColumns = $sizeColumns;
  let arrRows = $sizeRows;
  let arrTables = $sizeTables;
 </script>";

for($i=0; $i<count($tables); $i++){
  echo " <br/>колонок: $countColumns[$i] - строк: $countRows[$i]";
}

$a=0; $b=0; $c=0; $arrQ=[];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="node_modules\jquery\dist\jquery.js"></script>
  <script src="script.js"></script>
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- <?foreach($tables as $table):?>
    <?foreach($values as $value):?>
      <?if($value["table"]==$table["id"]):?>
        <p><?=$value["table"]?></p>
        <p><?=$value["column"]?></p>
        <p><?=$value["row"]?></p>
        <p><?=$value["value"]?></p>
      <?endif?>
    <?endforeach?>
  <?endforeach?> -->

  <!-- <table  border="1">
  <?for($i=0; $i<1; $i++):?>
    <tr><?=$i?>
    <?for($j=0; $j<3; $j++):?>
      <td><?=$j?></td>
    <?endfor?>
    </tr>
  <?endfor?>
  </table> -->

<!--  -->
<!-- <?for($i=0; $i<count($tables); $i++):?>
  <table  border="1">
    <caption><?=$tables[$i]["header"];?></caption>
    <?for($j=0; $j<$countRows[$i]; $j++):?>
    <?=$a++;?>
      <tr>
      <?for($k=0; $k<$countColumns[$i]; $k++):?>
      <?=$b++;?>
        <?for($x=0; $x<count($countValues[$i]); $x++):?>
        <?=$c++;?>
            <?if($sizeValues[$i][$x]["row"][$k][$j]==$j+1 && $sizeValues[$i][$x]["column"][$k][$j]==$k+1 ):?>
              <td><?=$sizeValues[$i][$x]['value'];?></td>
              <?else:?><td><?//=$k;?></td> 
            <?endif?>
        <?endfor?>
      <?endfor?>
      </tr>
    <?endfor?>
    </table>
    <br/>
<?endfor?> -->
        <?//for($x=0; $x<count($sizeValues[$i]); $x++):?>
          <?//if($sizeValues[$i][$x]["row"]==$j && $sizeValues[$i][$x]["column"]==$k && $sizeValues[$i][$x]["table"]==$tables[$i]["id"]):?>
            <!-- <td><?//=$sizeValues[$i][$x]['value'];?></td><?//else:?> -->
          <?//endif?>
      <?//endfor?>

  <!-- <table border="1">
    <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
    <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
  </table> -->
  <!-- <?for($i=0; $i<count($tables); $i++):?>
    <div class="table" data-number=<?=$tables[$i]["header"];?>>
    <?for($j=0; $j<$countColumns[$i]; $j++):?>
      <div class="column" data-number=<?=$columns[$j]["name"];?>>
      <?for($k=0; $k<$countRows[$i]; $k++):?>
        <div class="row" data-number=<?=$k;?>></div>
      <?endfor?>
      </div>
    <?endfor?>
    </div>
  <?endfor?> -->


  <?for($i=0; $i<count($tables); $i++):?>
  <table  border="1">
    <caption><?=$tables[$i]["header"];?></caption>
    <?for($j=0; $j<$countRows[$i]; $j++):?>
      <tr>
      <?for($k=0; $k<$countColumns[$i]; $k++):?>
        <?

          $q = mysqli_query($link, "SELECT `value` FROM `values` WHERE `row`=$j and `column`=$k;");
          while($dataQ = mysqli_fetch_array($q)){
            array_push($arrQ, $dataQ);
          }
          echo "<pre>"; print_r($arrQ); echo "</pre>"; 
        ?>
        <td>0</td>
      <?endfor?>
      </tr>
    <?endfor?>
    </table>
    <br/>
<?endfor?>

  <div id="block"></div>
  </body>
</html>