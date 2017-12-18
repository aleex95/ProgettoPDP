<!DOCTYPE html>
<html lang="it">
<head>
	<title>Risultati</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" href="theme/css/style.css" /> -->
</head>
<body>
	<h1>Piano Didattico Personalizzato</h1>
	<h2>Istituto Paritario Maria Ausiliatrice</h2>
	<h3>A.S. : 2017-2018</h3>
	<?php
		if ($_POST["alunnoscelto"]=="scelto") {
			echo "$_POST[carica]";
		}
	# CARICO LE VARIABILI
		#INTRO
		$cognome=$_POST['cognome'];
		$nome=$_POST['nome'];
		$classe=$_POST['classe'];
		$coordinatore=$_POST['coordinatore'];
		$referente=$_POST['referente'];
		$gli=$_POST['gli'];

		#SEZIONE A
		$luogo_nascita = $_POST['luogo_nascita'];
		$data_nascita=$_POST['data_nascita'];
		$lingua_madre=$_POST['lingua_madre'];
		$bilinguismo=$_POST['bilinguismo'];
		$ID_ALUNNO=$cognome.$nome.$data_nascita;

		$ssn = $_POST['ssn'];
		$icd10 = $_POST['icd10'];
		$ente_icd10 = $_POST['ente_icd10'];
		$data_cert = $_POST['data_cert'];
		$agg_dia = $_POST['agg_dia'];
		$relazioni_cliniche = $_POST['relazioni_cliniche'];
		$interventi = $_POST['interventi'];
		$altro_servizio = $_POST['altro_servizio'];
		$redatta_da = $_POST['redatta_da'];
		$in_data = $_POST['in_data'];
		$relazione = $_POST['relazione'];
		$cc_redatta_da = $_POST['cc_redatta_da'];
		$cc_in_data = $_POST['cc_in_data'];
		$info_famiglia = $_POST['info_famiglia'];

		# SEZIONE B
		if ($_POST['dsa_bes'] == "DSA") {
			echo "CARICO LE VARIABILI DSA";
		}

		if ($_POST['dsa_bes'] == "BES") {
			echo "CARICO LE VARIABILI BES";
		}

		# SEZIONE C
		$part_diag = $_POST['part_diag'];
		$cons_diff = $_POST['cons_diff'];
		$cons_for = $_POST['cons_for'];
		$autostima = $_POST['autostima'];
		$reg_freq = $_POST['reg_freq'];
		$risp_reg = $_POST['risp_reg'];
		$risp_imp = $_POST['risp_imp'];
		$acc_strum = $_POST['acc_strum'];
		$autonomia = $_POST['autonomia'];
		$sottolinea = $_POST['sottolinea'];
		$schemi = $_POST['schemi'];
		$computer = $_POST['computer'];
		$mem = $_POST['mem'];
		$strat_altro = $_POST['strat_altro'];

		echo "<p>Alunno/a: $cognome $nome</p>
			  <p>Classe: $classe</p>
			  <p>Coordinatore di classe: $coordinatore</p>
			  <p>Referente/i DSA/BES: $referente</p>
			  <p>Coordinatore GLI: $gli</p>
			  <p>La compilazione del PDP viene effettuata dopo un periodo di osservazione dell’allievo. Il PDP viene  deliberato dal Consiglio di classe/Team, firmato dal Dirigente Scolastico, dai docenti e dalla famiglia (e dall’allievo qualora lo si ritenga  opportuno).<p>
			  <h2>SEZIONE A (comune a tutti gli allievi con DSA e altri BES)</h2>
			  <h3>Dati Anagrafici e Informazioni Essenziali di Presentazione dell’Allievo</h3>
			  <p>Luogo di nascita: $luogo_nascita</p>
			  <p>Data di nascita: $data_nascita</p>
			  <p>Lingua madre: $lingua_madre</p>
			  ";
		if ($bilinguismo != "") {
			echo "<p>Bilinguismo: $bilinguismo</p>";
		}

		if ($ssn == "") {
			echo "Diagnosi del Servizio Sanitario o di enti privati MANCANTE.";
		}
		else {
			echo "<p>SERVIZIO SANITARIO - Diagnosi / Relazione multi professionale</p>";
			echo 
			"<p>(o diagnosi rilasciata da privati, in attesa di certificazione da parte del Servizio Sanitario Nazionale)</p>
			 <p>$ssn</p>
			 <p>Codice ICD10: $icd10</p>
			 <p>Redatta da: $ente_icd10</p>
			 <p>in data $data_cert</p>
			 <p>Aggiornamenti diagnostici: $agg_dia</p>
			";
			if ($_POST["relazioni_cliniche"]!="") {
				echo "<p>Altre relazioni cliniche: $relazioni_cliniche</p>";
			}
			if ($_POST["interventi"]!="") {
				echo "Interventi riabilitativi: $interventi";
			}
			# DA TERMINARE
		}

		echo 
		"<h3>2)	INFORMAZIONI GENERALI FORNITE DALLA FAMIGLIA / ENTI AFFIDATARI</h3>
		 <p>(ad esempio percorso scolastico pregresso, ripetenze ...)</p>
		 <p>info_famiglia</p>
		";
		if ($dsa_bes == 'DSA') {
			echo "<p>DSADSADSADSADSADSADSADSADSADSADSADSADSA</p>";
		}
		if ($dsa_bes == 'BES') {
			echo "<p>BESBESBESBESBESBESBESBESBESBESBESBESBES</p>";
		}
	 ?>
</body>
</html>
<?php include 'database.php'; ?>
<?php

 	if ($_POST['butt']=="save") {
 		mysqli_query($connect, "
			INSERT INTO alunno(ID_ALUNNO,Cognome,Nome,DataNascita,Classe, Coordinatore) 
			VALUES('$ID_ALUNNO','$cognome','$nome','$data_nascita','$classe','$coordinatore')
			ON DUPLICATE KEY 
				UPDATE 
					Classe = '$classe',
					Coordinatore = '$coordinatore'
		");
 	}
 	elseif ($_POST['butt']=="load") {
 		mysqli_query($connect, "
 			SELECT * FROM
 			");
 	}
 	elseif ($_POST['butt']=="send") {
 		echo "Invia";
 	}
 	else echo "NIENTE";
	// create a variable
	
 
	//Execute the query
#	mysqli_query($connect,
#		"INSERT INTO alunno(nome,classe,coordinatore,referente,gli,data_nascita,bilinguismo) VALUES('$nome','$classe','$coordinatore','$referente','$gli','$data_nascita','$bilinguismo')
#		");

?>