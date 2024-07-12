<!DOCTYPE html>
<html>
<head>

<style>
    th, td {
  padding: 15px;
}

.button {
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.button1 {background-color: #4CAF50;} /* Green */
.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #003366;} /* Blue */
.button4 {background-color: red;}
</style>
</head>
<body>

<?php

function Confirmation($id,$semaine)
{
?><br> <br> 
<form action="../../Traitement/Absence.php?action=delete&id=<?=$id?>&semaine=<?=$semaine?>" method="post">
êtes-vous sûr de vouloir supprimer l'abesence de la semaine <strong><?=$semaine?></strong> de l'eleve qui porte le code <strong><?=$id?></strong> 
<br> Oui <input type="radio" name="conf" value="oui">
Non <input type="radio" name="conf" value="non" checked>
<input class="button button4" type="submit" value="Ok">
</form>
<?php
}
?> 







<?php
$sea =13;
include_once "../../Acces_BD/Absences.php";
$res=all();
$rech= search($sea);
$i=6;
?>
<center>
    <h1>La liste des Absences</h1>
    <table border="3";width=90%; style="text-transform: uppercase; text-align: center;";>
    <tr style="padding: 15px;  text-align: center; background:#CC33FF;">
        <th>CNE</th>
        <th>SEMAINE</th>
        <th>NBR ABSENCES</th>
        <th colspan="2"><a href="form.php">>> AJOUTER ABSONCE</a></th>
    </tr>
<?php while($V=mysqli_fetch_array($res)) 
      {
    $a = "";
?>
    <tr>
        <td style="background: #FCD7E6 ;"><?=$V[1]?></td>
        <td><?=$V[0]?></td>
        <td><?=$V[2]?></td>
        <td><a href="form.php?id=<?=$V[1]?>&semaine=<?=$V[0]?>">Edit</a></td>
        <td><a href="?id=<?=$V[1]?>&semaine=<?=$V[0]?>&a=1">Delete</a></td>
    </tr>
<?php } ?>
</table>

<br><br>
<a href="../../index.php?admin=true">>> RETOUR <<</a>

<br><br>

<table>
<form action="?action=search" method="post">
<tr>    
<td>Semaine</td>
            <td><input type="text" name="week" value="" ></td>
            <td><input class="button button1" type="submit" value="Envoyer">
            <input class="button button1" type="reset" value="Annuler"></td>
        </tr>
      </tr>
      </form>
</table>
<?php
if(isset($_GET['a'])==1)
Confirmation($_GET['id'],$_GET['semaine']);
?>



<?php
$i="";
if(isset($_GET['action']))
{
    
    $sea = $_POST['week'];
    $rech= search($sea);
   SearchWeek($sea);
}


?>

<?php

function SearchWeek($w)
{ Global $i;
    Global $rech;
    if(mysqli_num_rows($rech) == 0)
    {
        echo "il n'y a pas d'absence  pour cette samaine";
    }else
    {
    ?>
 <div style="<?$i?>">   
<h2>LES ABSENCES DE LA SEMAINE <?=$w?></h2>

<table border="3" cellpadding="15" cellspacing="1" style="width:700px;text-align: center;">
	<thead>
		<tr style="background: #FCD7E6 ;">
			<th scope="col">CNE </th>
			<th scope="col">Non Et Prenom</th>
			<th scope="col">Nombre d'Absences</th>
		</tr>
	</thead>
	<tbody>
    <?php while($V=mysqli_fetch_array($rech)) 
      {
?>
		<tr>
			<td><?=$V[0]?></td>
			<td><?=$V[1]?>  <?=$V[2]?></td>
			<td><?=$V[3]?></td>
		</tr>
        <?php
        //$i--;
}}
?>





	</tbody>
</table>
</div>
<?php
}
?>


</center></body>