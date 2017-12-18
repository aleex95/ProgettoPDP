<!DOCTYPE html>
<html lang="it">
<head>
	<title>Risultati</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="theme/css/style.css" /> -->
</head>
<body>
	<h1>Piano Didattico Personalizzato</h1>
	<h2>Istituto Paritario Maria Ausiliatrice</h2>
	<h3>A.S. : 2017-2018</h3>
	<?php
		echo "<p>Alunno/a: $_POST[alunno]</p>
			  <p>Classe: $_POST[classe]</p>
			  <p>Coordinatore di classe: $_POST[coordinatore]</p>
			  <p>Referente/i DSA/BES: $_POST[referente]</p>
			  <p>Coordinatore GLI: $_POST[gli]</p>
			  <p>La compilazione del PDP viene effettuata dopo un periodo di osservazione dell’allievo. Il PDP viene  deliberato dal Consiglio di classe/Team, firmato dal Dirigente Scolastico, dai docenti e dalla famiglia (e dall’allievo qualora lo si ritenga  opportuno).<p>
			  <h2>SEZIONE A (comune a tutti gli allievi con DSA e altri BES)</h2>
			  <h3>Dati Anagrafici e Informazioni Essenziali di Presentazione dell’Allievo</h3>
			  <p>Luogo di nascita: $_POST[luogo]</p>
			  <p>Data di nascita: $_POST[data_nascita]</p>
			  ";
		if ($_POST["bilinguismo"]!="") {
			echo "<p>Bilinguismo: $_POST[bilinguismo]</p>";
		}

		if ($_POST["ssn"]=="") {
			echo "Diagnosi del Servizio Sanitario o di enti privati MANCANTE.";
		}
		else {
			echo "<p>SERVIZIO SANITARIO - Diagnosi / Relazione multi professionale</p>";
			echo 
			"<p>(o diagnosi rilasciata da privati, in attesa di certificazione da parte del Servizio Sanitario Nazionale)</p>
			 <p>$_POST[ssn]</p>
			 <p>Codice ICD10: $_POST[icd10]</p>
			 <p>Redatta da: $_POST[ente_icd10]</p>
			 <p>in data $_POST[data_cert]</p>
			 <p>Aggiornamenti diagnostici: $_POST[agg_dia]</p>
			";
			if ($_POST["relazioni_cliniche"]!="") {
				echo "<p>Altre relazioni cliniche: $_POST[relazioni_cliniche]</p>";
			}
			if ($_POST["interventi"]!="") {
				echo "Interventi riabilitativi: $_POST[interventi]";
			}
			# DA TERMINARE
		}

		echo 
		"<h3>2)	INFORMAZIONI GENERALI FORNITE DALLA FAMIGLIA / ENTI AFFIDATARI</h3>
		 <p>(ad esempio percorso scolastico pregresso, ripetenze ...)</p>
		 <p>$_POST[info_famiglia]</p>
		 <h2>SEZIONE B –  PARTE I (allievi con DSA)</h2>
		 <h3>Descrizione delle abilità e dei comportamenti</h3>
		";
	 ?>
</body>
</html>