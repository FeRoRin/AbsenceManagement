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
.button3 {background-color: #003366;}
</style>
</head>
<body>
<?php

function Confirmation($id,$nom)
{
?>
<form action="../../Traitement/Eleve.php?action=delete&id=<?=$id?>" method="post">
êtes-vous sûr de vouloir supprimer l'élève <strong><?=$nom?></strong> 
Oui <input type="radio" name="conf" value="oui">
Non <input type="radio" name="conf" value="non" checked>
<input  class="button button1" type="submit" value="Ok">
</form>
<?php
}



?>




<?php
include_once "../../Acces_BD/Eleve.php";
$res=all();
$id=0;
?>
<center>
    <h1>La liste des Eleves</h1>
    <table border="3";width=70%; style="text-transform: uppercase; text-align: center;";>
    <tr style="padding: 15px;  text-align: center; background:#FFFF00;">
        <th>CNE</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>EMAIL</th>
        <th colspan="3"><a href="form.php">>> INSERT </a></th>
    </tr>
<?php while($V=mysqli_fetch_array($res)) 
      {
?>
    <tr>
        <td style="background:#FFFF99;"><?=$V[0]?></td>
        <td><?=$V[1]?></td>
        <td><?=$V[2]?></td>
        <td><?=$V[3]?></td>
        <td><a href="form.php?id=<?=$V[0]?>">Edit</a></td>

        <!--td><a href="../../Traitement/Eleve.php?action=delete&id=<//?=$V[0]?>">Delete</a></td-->
        <td><a href="?id=<?=$V[0]?>&nom=<?=$V[1]?> <?=$V[2]?>">Delete</a></td>

        <td><a href="?id=<?=$V[0]?>&a=1">Absence</a></td>
    </tr>
<?php } ?>
</table>
<br>
<br><br>

<?php
if(isset($_GET['nom']))
Confirmation($_GET['id'],$_GET['nom']);
?>



<a href="../../index.php?admin=true">>> RETOUR <<</a>

<table>
<form action="?action=search" method="post">
<tr>    
<td>Semaine</td>
            <td><input type="text" name="week" value="" ></td>
            <td><input  class="button button2" type="submit" value="Envoyer">
            <input  class="button button2" type="reset" value="Annuler"></td>
        </tr>
      </tr>
      </form>

      
</table>


<?php
if(isset($_GET['a'])==1){

    session_start();
$_SESSION['id']=$_GET['id'];
   
    Absence($_GET['id']);
    


}

?>
<?php
function Absence($id)
{
    $rech = searc($id);
    if(mysqli_num_rows($rech) == 0)
    {
        echo "l'eleve ayans le CNE $id a 0 absences";
    }else
    {
    ?>
    <h2>La lise d'absences de l'eleve : <?=$id?></h2>

<table border="3" cellpadding="15" cellspacing="1" style="width:400px;text-align: center;">
	<thead>
		<tr style="background:#FFFF66;">
			<th scope="col">Semaine </th>
			
			<th scope="col">Nombre d'Absences</th>
		</tr>
	</thead>
	<tbody>
    <?php while($V=mysqli_fetch_array($rech)) 
      {
?>
		<tr>
			<td><?=$V[0]?></td>
			
			<td><?=$V[1]?></td>
		</tr>
        <?php
        //$i--;
    }     
}
?>





	</tbody>
</table><?php
}
?>


<?php
if(isset($_GET['action'])){
    session_start();
    $z=$_SESSION['id'];
    
    absences($z,$_POST['week']);
    Absence($_SESSION['id']);
    }

?>


<?php
function absences($id,$semaine)
{
   
  
    $rech2 = searc2($id, $semaine);
    if(mysqli_num_rows($rech2) == 0)
    {
        echo "l'eleve ayans le CNE $id n'a pas d'absence  pour cette samaine";
    }else
    {


    $t = mysqli_fetch_array($rech2);
    ?><br> <br>
<table border="3" style="width:400px;text-align: center;">
Dans la semaine <strong><?=$semaine?></strong>  l'eleve ayans le CNE  <strong><?=$id?></strong> a <strong><?=$t[0]?></strong> absences

</table><?php
}
}
?>


</center></body>