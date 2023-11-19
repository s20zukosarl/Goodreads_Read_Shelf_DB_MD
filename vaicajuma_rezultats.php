<?php
require_once("config.php");
echo '<link rel="stylesheet" href ="stili.css">';
echo '
<a href = "vaicajumu_saraksts.html">Atpakaļ</a>';
//sanemam tabulas nosaukums
$vaicajums=$_POST["ieraksts"];

echo '<h3> Vaicajums: '.$vaicajums."</h3>";

$rezultats=$conn->query($vaicajums);  //objekts

//tabulas datu izvads
$lauku_nosaukumi = $rezultats->fetch_fields();
//$i=1;

echo "<table>";
//1.tabulas rinda, kura sarakstīti lauku nosaukumi
echo '<tr >'; //tabulas 1.rindina
    foreach ($lauku_nosaukumi as $elements) {
        echo '<th>';
        echo $elements->name;
        echo '</th>';
    }
echo '</tr>';
//tabulas dati

while ($row = $rezultats->fetch_assoc())
{echo '<tr>';
        foreach ($row as $item) {
            echo '<td>';
            echo $item;
            echo '</td>';
        }//foreach
echo '</tr>';

}
echo "</table>";




?>