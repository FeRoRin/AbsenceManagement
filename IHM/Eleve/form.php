<!DOCTYPE html>
<html>
<head>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
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
</style>
</head>
<?php




$action="insert";
$error="";
if(isset($_GET['ERO']))
{
    $error="Veuillez renseigner tour les champs";
}
if(isset($_GET['id']))
{
include_once '../../Acces_BD/Eleve.php';
$res=find($_GET['id']);
$V=mysqli_fetch_array($res);
$action="update";
}
else
$V=array("","","","");
?>
<body>
<center style="padding-top:100px;">
    
    <form action="../../Traitement/Eleve.php?action=<?=$action?>" method="post">
     <table>
     <tr>
            <td>CNE :</td>
            <td><input type="text" name="cne" value="<?=$V[0]?>"></td>
        </tr>
        <tr>
            <td>NOM :</td>
            <td><input type="text" name="nom" value="<?=$V[1]?>"></td>
        </tr>
        <tr>
            <td>PRÉNOM :</td>
            <td><input type="text" name="prenom" value="<?=$V[2]?>"></td>
        </tr>
        <tr>
            <td>GROUPE :</td>
            <td><input type="text" name="groupe" value="<?=$V[3]?>"></td>
        </tr>
        <tr>
            <td><input class="button button1" type="submit" value="Envoyer"></td>
            <td><input class="button button2" type="reset" value="Annuler"></td>
        </tr>
     </table>
     <p style="color:red;"><?=$error?></p>
     <input type="hidden" name="id" value="<?=$V[0]?>">
    </form>
</center>


<body>

