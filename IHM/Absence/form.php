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

select {
    padding: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
}
</style>
</head>

<?php
$action="insert";
$c1="none";
$c2="contents";
if(isset($_GET['id']))
{
    $c1="contents";
    $c2="none";

include_once '../../Acces_BD/Absences.php';
$res=find($_GET['id'],$_GET['semaine']);
$V=mysqli_fetch_array($res);
$action="update";
}
else
$V=array("","","","");
?>

<?php
include_once "../../Acces_BD/Absences.php";
$res=allE();
?>

<div style="display:<?=$c2?>">
<center>
    <h1 style="text-transform:uppercase;"><?=$action?></h1>
    <form action="../../Traitement/Absence.php?action=<?=$action?>" method="post">
     <table>
        <tr>
            <td>Semaine </td>
            <td><input type="text" name="semaine" value="<?=$V[0]?>"></td>
        </tr>
        <tr>
            <td>CNE :</td>
            <td>
            <select name="cne">
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($cne = mysqli_fetch_array($res)):;
            ?>
                <option value="<?php echo $cne["cne"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $cne["cne"];
                        // To show the cne name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select>
        
        </td>
        </tr>
        <tr>
            <td>NBR ABSENCES</td>
            <td><input type="text" name="nbr_abs" value="<?=$V[2]?>"></td>
        </tr>
        <tr>
            <td><input class="button button1" type="submit" value="Envoyer"></td>
            <td><input class="button button2" type="reset" value="Annuler"></td>
        </tr>
     </table>
     <!--input type="hidden" name="id" value="<?//=$V[0]?>"-->
    </form>
</center>
            </div>
<div style="display:<?=$c1?>">
 <center>
 <h1 style="text-transform:uppercase;"><?=$action?></h1>
    <form action="../../Traitement/Absence.php?action=<?=$action?>" method="post">
     <table>
        <tr>
            <td>Semaine :</td>
            <td><input style="background-color: #d1d1d1;" type="text" name="semaine" value="<?=$V[0]?>" readonly></td>
        </tr>
        <tr>
            <td>CNE :</td>
            <td><input style="background-color: #d1d1d1;" type="text" name="semaine" value="<?=$V[1]?>" readonly></td>
        </tr>
        <tr>
            <td> NBR Absences</td>
            <td><input type="text" name="nbr_abs" value="<?=$V[2]?>"></td>
        </tr>
        <tr>
            <td><input class="button button1" type="submit" value="Envoyer"></td>
            <td><input class="button button2" type="reset" value="Annuler"></td>
        </tr>
     </table>
     <input type="hidden" name="id" value="<?=$V[0]?>">
    </form>
</center>
 </div>
</div>
