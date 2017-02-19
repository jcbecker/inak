<?php
	include "insertFunction.php";
	testUSER();
	$deckName = "inputName";
	if(!isset($_POST[$deckName])){
		header('Location: createDeck.php?err=1');
		return;
	}
	$name = $_POST[$deckName];
	$idUserDeck = $_POST["IdUserEmail"];
	insert(mysql_co(), "INSERT INTO deck (name,ownerId) VALUES ('".$name."','".$idUserDeck."')", "homeDeck.php");
	//primeiro paramentro é a conteção do mysql, o segundo é a inserção na tabela e o ultimo a pagina destino após operação.
?>
