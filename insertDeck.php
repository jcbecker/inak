<?php
	include "insertFunction.php";
	testUSER();
	$deckName = "inputName";
	$deckShared = "inputShared";
	if(!isset($_POST[$deckName]) || !isset($_POST[$deckShared])){
		header('Location: createDeck.php?err=1');
		return;
	}
	$name = $_POST[$deckName];
	$shared = $_POST[$deckShared];
	$idUserDeck = $_POST["IdUserEmail"];
	insert(mysql_co(), "INSERT INTO deck (name,shared,ownerId) VALUES ('".$name."','".$shared."','".$idUserDeck."')", "homeDeck.php");
	//primeiro paramentro é a conteção do mysql, o segundo é a inserção na tabela e o ultimo a pagina destino após operação.
?>
