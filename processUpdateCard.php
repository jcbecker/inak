<?php
	include "insertFunction.php";
	testUSER();
	$inputFront = "inputFront";
	$inputBack = "inputBack";
	if(!isset($_POST[$inputFront]) || !isset($_POST[$inputBack])){
		header('Location: createDeck.php?err=1');
		return;
	}
	$front = $_POST[$inputFront];
	$back = $_POST[$inputBack];
	$id = $_GET['id'];
	insert(mysql_co(), "UPDATE card SET front = '".$front."', back = '".$back."' WHERE id = '".$id."'", "changeDeck.php?id_deck=".$_GET['id_deck']);
	//primeiro paramentro é a conteção do mysql, o segundo é a inserção na tabela e o ultimo a pagina destino após operação.
?>
