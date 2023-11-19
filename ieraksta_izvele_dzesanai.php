<?php
require_once("config.php");
echo '<link rel="stylesheet" href ="stili.css">';
echo '
<a href = "tabulas_izvele_dzesanai.php">Atpakaļ</a>';
//sanemam tabulas nosaukums
$tabula=$_POST["table"];
echo "<h3>Tabulas \"".$tabula." \"saturs</h3>";

//izpilda vaicajumu, lai redzetu visus datus select * from table

$vaicajums = "select * from ".$tabula;
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

echo "<h4> Piemēri datu dzēšanai </h4>";
echo '

<pre>delete from valstis where idvalstis = 18
</pre>
<pre>delete from žanrs where idžanrs = 16
</pre>
';

//forma

echo ' 
<form action="dzesanas_rezultats.php" method="post">
<label for="ieraksts"><b>Kuru ierakstu dzēst: </b></label>
<br>
<textarea name="ieraksts" required rows="4" cols="80"></textarea>
<br><br>

<input type="submit" value="Ieraksta dzēšana">
<input type="hidden" name="tabula" value='.$tabula.'>
</form>
';

?>