<?php
require_once("config.php");
echo '<link rel="stylesheet" href ="stili.css">';
echo '
<a href = "tabulas_izvele_ierakstam.php">Atpakaļ</a>';
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

echo "<h3> Piemēri datu ievietošanai </h3>";
echo '

<pre>INSERT INTO žanri VALUES (NULL, "thriller")
</pre>
<pre>INSERT INTO valstis VALUES(NULL, "Latvia");
</pre>
';

echo '<h3> Piemēri trigeru pārbaudei </h3>
<h4> Piemērs 1. trigera izpildei </h4>
<pre>
INSERT INTO lasīšanasgads VALUES(null, 2025);
</pre>
<h4> Piemērs 2. trigera izpildei </h4>
<pre>
INSERT INTO grāmatas
VALUES (NULL, "aaqxayeukarmuejjwhurdqsikzjkylzeivrdjpyqyjleiswyadhgwjdovvunayaczokwkmovnjqcnkcvaiohcyacqpqotmjzpfrciju", 1, 1, 560, 2025, 2012, 3, 7, 1);
</pre>
<h4> Piemērs 3. trigera izpildei </h4>
<pre>INSERT INTO grāmatas
VALUES (NULL, "Silk Roads", 1, 1, 560, 2025, 2010, 3, 5, 1);
</pre>

'
;

//forma

echo ' 
<form action="ieraksta_rezultats.php" method="post">
<label for="ieraksts"><b>Izveidojiet jaunu ierakstu: </b></label>
<br>
<textarea name="ieraksts" required rows="4" cols="80"></textarea>
<br><br>
<input type="hidden" name="tabula" value='.$tabula.'>
<input type="submit" value="Jauna ieraksta pievienošana">
</form>
';



?>