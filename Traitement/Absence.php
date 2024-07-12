<?php
include_once '../Acces_BD/Absences.php';
//var_dump(array_values($_POST)); 
switch($_GET['action'])
{
	case 'insert': insert(array_values($_POST)); break;
	case 'update': update(array_values($_POST));break;
	case 'delete': if($_POST['conf'] =='oui')
					delete($_GET['id'],$_GET['semaine']); break;
	case 'search': search($_POST['week']);break;
}
header('Location:../IHM/Absence/index.php');
?>