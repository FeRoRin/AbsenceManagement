<?php
include_once("Connexion.php");
$link=Connexion("tpabsence");
function insert($data){
Global $link;
$req="insert into Eleve(cne,nom,prenom,groupe)
     values('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}')"; 
	mysqli_query($link,$req);
}


function update($data){
Global $link;
$req="update Eleve set nom='{$data[1]}',prenom='{$data[2]}',
                           groupe='{$data[3]}' 
						   where cne='{$data[0]}'";
	mysqli_query($link,$req);	
}

function delete($id){
Global $link;
$req="delete from Eleve where cne='$id'";
mysqli_query($link,$req);	
$req1="delete from absence where cne='$id'";
mysqli_query($link,$req1);
}

function find($id){
Global $link;
$req="select * from Eleve where cne='$id' ORDER BY cne ASC";
return mysqli_query($link,$req);	
	
}

function all()
{
Global $link;
$req="select * from Eleve ORDER BY cne ASC";
return mysqli_query($link,$req);	
}


function searc($id)
{
	Global $link;
	$req="select semaine ,nbr_abs from absence where cne ='$id' ORDER BY semaine ASC";
	return mysqli_query($link,$req);	
	
	}
	function searc2($id,$semaine)
	{
		Global $link;
		$req="SELECT nbr_abs FROM absence where cne ='$id' and semaine ='$semaine'";
		return mysqli_query($link,$req);	
		
		}
?>