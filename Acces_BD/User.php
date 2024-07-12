<?php
include_once("Connexion.php");
$link=Connexion("tpabsence");


function all()
{
Global $link;
$req="select * from user where ";
return mysqli_query($link,$req);
}


function finduser($id,$password){
    Global $link;
    $req="select * from user where cne='$id' and password ='$password' ";
    return mysqli_query($link,$req);	
        
    }

function recherche_E($id)
    {
    Global $link;
    $req="select e.cne, e.nom, e.prenom, e.groupe, u.password from eleve e , user u where e.cne='$id' and e.cne=u.cne";
    return mysqli_query($link,$req);
    }

    function CountAbsences($id)
    {
    Global $link;
    $req="select sum(nbr_abs) from absence where cne='$id'";
    return mysqli_query($link,$req);
    }


    function  Getabs($id)
    {
    Global $link;
    $req="select semaine, nbr_abs from absence where cne='$id' ORDER BY semaine ASC";
    return mysqli_query($link,$req);
    }

?>