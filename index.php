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
.button4 {background-color: red;}
</style>
</head>
<body>

<?php
include_once 'Acces_BD/User.php';
$paly="block";

?>
  <br><br><br><br><br><br>
<center>
  <?php 
  
function Admin()
{
  ?>
  <a style="   position: absolute;  top: 8px;  right: 16px;  font-size: 18px;" href="index.php"><button class="button button3">Se déconnecter</button></a>
  <h1>Gestion Eleves</h1>
<a href="IHM/Eleve"><button class="button button1">ELeve</button></a>
<h1>Gestion Absences</h1>
<a href="IHM/Absence"><button class="button button2">Absence</button></a>

   <?php
}

if(isset($_GET['admin'])=='true')
{
  $paly="none";
  Admin();
}
?>


<?php
$i="";
if(isset($_GET['action']))
{
 
    $id = $_POST['cne'];
    $password = $_POST['password'];
    $result= finduser($id,$password);
    if (mysqli_num_rows($result) == 0) 
    { echo "<p style='color:red;font-size:25px;'>Compte introuvable !!</p><br><br>"; } 
    else 
    { 
      $acc=mysqli_fetch_array($result);
      if($acc[2] == "prof"){
        //echo "prof";
        $paly="none";
        Admin();
      }
      else if($acc[2]== "eleve"){
        
        header('Location:IHM/User/index.php?id='.$acc[0]);
       
      }

    }
}


?>
<div style="display:<?=$paly?>">
<form action="?action=login" method="post" >
<fieldset style="width:40%" >
      <legend><h1><b>Connexion </b></h1></legend>
     <table>
     <tr>
            <td>CNE :</td>
            <td><input type="text" name="cne" value=""></td>
        </tr>
        <tr>
            <td>MOT DE PASSE :</td>
            <td><input type="password" name="password" value=""></td>
        </tr>
        <tr>
            <td></td><td><br><input class="button button1" type="submit" value="Connexion">
            <input class="button button4" type="reset" value="Annuler"></td>
        </tr>
     </table><br></fieldset>
     
    </form>
</div>
<?php

?>



</center>
</body>
</html>