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
	$idDeck = $_POST["id_deck"];
	insert(mysql_co(), "INSERT INTO card (front,back,id_deck) VALUES ('".$front."','".$back."','".$idDeck."')", "changeDeck.php?id_deck=".$idDeck);
	//primeiro paramentro é a conteção do mysql, o segundo é a inserção na tabela e o ultimo a pagina destino após operação.
?>
