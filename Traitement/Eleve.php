<?php
include_once '../Acces_BD/Eleve.php';
switch($_GET['action'])
{
	case 'insert': if(empty($_POST['cne']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['groupe']))
		{
			header('Location:../IHM/Eleve/form.php?ERO=ERO');
		}
		else
		{
			insert(array_values($_POST)); 
		}break;
	case 'update': update(array_values($_POST)); break;
	case 'delete': if($_POST['conf'] =='oui')
					delete($_GET['id']); break;
}
header('Location:../IHM/Eleve/index.php?');
?>