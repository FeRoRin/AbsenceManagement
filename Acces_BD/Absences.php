<?php
include_once("Connexion.php");
$link=Connexion("tpabsence");
function insert($data){
Global $link;
$req="insert into absence(semaine,cne,nbr_abs)
     values('{$data[0]}','{$data[1]}','{$data[2]}')"; 
	mysqli_query($link,$req);
}



function update($data){
Global $link;
$req="update absence set nbr_abs='{$data[1]}'
						   where cne='{$data[0]}' and semaine ='{$data[2]}'";
	mysqli_query($link,$req);	
}

function delete($id,$semaine){
Global $link;
$req="delete from absence where cne='$id' and semaine ='$semaine'";
mysqli_query($link,$req);	
}

function find($id,$semaine){
Global $link;
$req="select * from absence where cne='$id' and semaine ='$semaine' ORDER BY cne ASC";
return mysqli_query($link,$req);	
	
}

function all()
{
Global $link;
$req="select * from absence ORDER BY cne ASC";
return mysqli_query($link,$req);	
}

function allE()
{
Global $link;
$req="select * from eleve ORDER BY cne ASC";
return mysqli_query($link,$req);	
}


function search($week)
{
	Global $link;
	$req="select e.cne , e.nom , e.prenom , a.nbr_abs from eleve e , absence a where semaine ='$week' and e.cne =a.cne ORDER BY e.cne ASC";
	return mysqli_query($link,$req);	
	
	}
?>