<?php
require_once("config.php");
echo '<link rel="stylesheet" href ="stili.css">';
echo '
<a href = "tabulas_izvele_ierakstam.php">Atpakaļ</a>';
//sanemam tabulas nosaukums
$vaicajums = $_POST["ieraksts"];
//echo "<br> Ieraksts: ".$vaicajums;
$tabula=$_POST["tabula"];
//echo "<br>Tabula: ".$tabula;

//izpildit to vaicājumu
$rezultats=$conn->query($vaicajums);
//izvadīt tabulas saturu

echo "<h3>Tabulas \"".$tabula." \"saturs</h3>";
//izpilda vaicajumu, lai redzetu visus datus select * from table
$vaicajums2 = "select * from ".$tabula;
$rezultats=$conn->query($vaicajums2);  //objekts

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