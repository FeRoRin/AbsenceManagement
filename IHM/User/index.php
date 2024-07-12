<!DOCTYPE html>
<html>
<head>
<style>

th, td {
  padding: 15px;
}

th, td {
  border-bottom: 1px solid #ddd;
}
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

<body style="background:#24478f; padding :50px;">
<a style="position: absolute;  top: 8px;  right: 16px;  font-size: 18px;" href="../../index.php"><button class="button button3">Se déconnecter</button></a>
 
<?php
$cne="";
include_once '../../Acces_BD/User.php';
if (isset($_GET['id'])){
$cne= $_GET['id'];
//echo $cne;

$eleveinfo = recherche_E($cne);
$sumabs=CountAbsences($cne);
$result=Getabs($cne);
if (mysqli_num_rows($eleveinfo) == 0) 
    { echo "ERROR !!"; } 
    else 
    { 
      $acc=mysqli_fetch_array($eleveinfo);

    }
    if(mysqli_num_rows($sumabs) == 0)
    { echo "ERROR !!"; } 
    else 
    { 
        $sumB=mysqli_fetch_array($sumabs);

    }
    if(mysqli_num_rows($result) == 0)
    {echo "ERROR !!"; } 
    else 
    { 
        $absence=mysqli_fetch_array($result);

    }

}


?>
<center>
    <div style="background:white;width:60% ; padding :50px;">
<fieldset style="width:90%" >
      <legend><h1><b>Information personnelle de l'eleve</b></h1></legend>
      <h4>NOM DE L'ÉLÈVE:</h4>
      <h1><strong><?=$acc[1]?> <?=$acc[2]?></strong></h1>
      <h4>CNE:</h4>
      <h2><?=$acc[0]?></h2>
      <h4>LE GROUPE:</h4>
      <h2><?=$acc[3]?></h2>
      <h4>NOMBRE D'ABSENCES: </h4>
      <h2><?=$sumB[0]?> Absences</h2>
      <h4> VOTER ABSENCES PAR SEMAINE: </h4>
      <table width=70%; style="text-transform: uppercase; text-align: center; border: 5px solid #ddd;
  text-align: center;   border-collapse: collapse;  width: 60%;";>
            <tr style="padding: 15px;  text-align: center; background:#24478f;">
                <th style="color:white;">SEMAINE</th>
                <th style="color:white;">ABSENCES</th>
            </tr>
            <tr>
            <?php while($absence=mysqli_fetch_array($result)) 
                {
                    ?>
              <tr>
                <td><?=$absence[0]?></td>
                <td><?=$absence[1]?></td>
              </tr>
                <?php 
                }
                ?>
           
        </table>

      <h4>VOTRE MOT DE PASSE: <b><?=$acc[4]?></b></h4>
     
   <br>
</fieldset>

<div>
</center>
</body>
</html>