<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form</title>
	<!-- Required meta tags 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="css/assets/css/main.css" />-->

</head>
<body>
<!-- INFORMAZIONI GENERALI -->
	<img src="logo_maux.png">
	<h1 class="title">Modello PDP: Piano Didattico Personalizzato</h1>
	<h2 class="title">Istituto Paritario Maria Ausiliatrice</h2>
	<h3 class="title">A.S. : 2017-2018</h3>
	<?php include 'database.php';?>

	<?php
		header('Content-type: text/html;charset=utf-8');
		$cog = mysqli_query($connect, "
 			SELECT * FROM alunno
 			WHERE Cognome = 'Zucca Nigra'
 			");
	?>
	<p>Compilare i campi seguenti:</p>
	<form action="process.php" method="POST">
		<p>Alunna/o:</p>
		<input type="text" name="cognome" required>
		<input type="text" name="nome" required>
		<br>
		
		<label>Classe:</label>
		<select name="classe" required>
			<optgroup>
				<option></option>
				<option value="1A">1A</option>
				<option value="1B">1B</option>
				<option value="2A">2A</option>
				<option value="2B">2B</option>
				<option value="3A">3A</option>
				<option value="4A">4A</option>
				<option value="4B">4B</option>
				<option value="5A">5A</option>
				<option value="5B">5B</option>
			</optgroup>
		</select>
		<br>

		<label>Coordinatore di classe</label>
		<input type="text" name="coordinatore" required>
		<br>

		<label>Referente/i DSA/BES</label>
		<input type="text" name="referente">
		<br>

		<label>Coordinatore GLI</label>
		<input type="text" name="gli">
		<br>

		<p>La compilazione del PDP viene effettuata dopo un periodo di osservazione dell’allievo. Il PDP viene  deliberato dal Consiglio di classe/Team, firmato dal Dirigente Scolastico, dai docenti e dalla famiglia (e dall’allievo qualora lo si ritenga  opportuno).</p>

<!-- SEZIONE A -->

		<h2 class="title">SEZIONE A (comune a tutti gli allievi con DSA e altri BES)</h2>
		<h3 class="title">Dati Anagrafici e Informazioni Essenziali di Presentazione dell’Allievo</h3>

		<label>Luogo di nascita</label>
		<input type="text" name="luogo_nascita">
		<br>

		<label>Data di nascita</label>
		<input type="date" name="data_nascita">
		<br>

		<label>Lingua madre</label>
		<input type="text" name="lingua_madre">
		<br>

		<label>Eventuale bilinguismo</label>
		<input type="text" name="bilinguismo">
		<br>

		<h3>1)	INDIVIDUAZIONE DELLA SITUAZIONE DI BISOGNO EDUCATIVO SPECIALE DA PARTE DI:</h3>
		
		<li> SERVIZIO SANITARIO - Diagnosi / Relazione multi professionale</li>
		<input type="text" name="ssn">
		<p>(o diagnosi rilasciata da privati, in attesa di certificazione da parte del Servizio Sanitario Nazionale)</p>
		<br>

		<label>Codice ICD10</label>
		<input type="text" name="icd10">
		<br>

		<label>Redatta da:</label>
		<input type="text" name="ente_icd10">
		<br>

		<label>in data</label>
		<input type="date" name="data_cert">
		<br>

		<label>Aggiornamenti diagnostici</label>
		<textarea name="agg_dia"></textarea>
		<br>

		<label>Altre relazioni cliniche</label>
		<textarea name="relazioni_cliniche"></textarea>
		<br>

		<label>Interventi riabilitativi</label>
		<textarea name="interventi"></textarea>
		<br>

		<li>ALTRO SERVIZIO - Documentazione presentata alla scuola <input type="text" name="altro_servizio"></li>
		<label>Redatta da: </label>
		<input type="text" name="redatta_da">
		<br>
		<label>in data </label>
		<input type="date" name="in_data">
		<br>
		<p>(relazione da allegare)</p>

		<li>CONSIGLIO DI CLASSE/TEAM DOCENTI - Relazione </li>
		<input type="text" name="relazione">
		<br>
		<label>Redatta da: </label>
		<input type="text" name="cc_redatta_da">
		<br>
		<label>in data </label>
		<input type="date" name="cc_in_data">
		<p>(relazione da allegare)</p>


		<h3>2)	INFORMAZIONI GENERALI FORNITE DALLA FAMIGLIA / ENTI AFFIDATARI</h3>
		<p>(ad esempio percorso scolastico pregresso, ripetenze ...)</p>
		<textarea name="info_famiglia"></textarea>


<!-- INSERIRE JAVASCRIPT PER VISUALIZZARE SOLO B-P1 OPPURE B-P2 -->
		<script type="text/javascript">
			function showMe (caso, box) {
				var vis = (box.checked) ? "block" : "none";
				if(caso == "dsa"){
					document.getElementById(caso).style.display = vis;
					document.getElementById("bes").style.display = "none";
				} else {
					document.getElementById(caso).style.display = vis;
					document.getElementById("dsa").style.display = "none";
				}
			}
		</script>

		<label>DSA/BES: </label>
			<input type="radio" name="dsa_bes" value="DSA" onclick="showMe('dsa', this)">
			<input type="radio" name="dsa_bes" value="BES" onclick="showMe('bes', this);">


<!-- SEZIONE B –  PARTE I (allievi con DSA) -->
		<div id="dsa">
			<h2 class="title">SEZIONE B –  PARTE I (allievi con DSA)</h2>
			<h3 class="title">Descrizione delle abilità e dei comportamenti</h3>
			<!-- TABELLE LETTURA/SCRITTURA... -->

			<!-- tabella LETTURA -->
			<table border="2">
			<tbody>
				<tr>
				<th>DIAGNOSI SPECIALISTICA</th>
				<th colspan="4">OSSERVAZIONE IN CLASSE</th>
				</tr>

				<tr>
				<th colspan="5" >LETTURA</th>
				</tr>

				  <tr>
				<td rowspan="3"><textarea name="vel_let_txt"></textarea></td>
				<th  rowspan="3">VELOCITA'</th>
				<td colspan="3"><input type="radio" name="vel_let" value="molto_lenta">Molto Lenta</td>
				</tr>

				  <tr>
				<td colspan="3"><input type="radio" name="vel_let" value="lenta">Lenta</td>
				</tr>

				  <tr>
				<td colspan="3"><input type="radio" name="vel_let" value="scorrevole">Scorrevole</td>
				  </tr>

				  <tr>
				<td rowspan="2"><textarea name="corr_let_txt"></textarea></td>
				<th rowspan="2">CORRETTEZZA</th>
				<td colspan="3"><input type="radio" name="corr_let" value="Adeguata">Adeguata</td>
				</tr>

				  <tr>
				<td colspan="3"><input type="radio" name="corr_let" value="NON Adeguata">NON Adeguata</td>
				</tr>

				  <tr>
				<td rowspan="4"><textarea name="comp_let_txt"></textarea></td>
				<th rowspan="4">COMPRENSIONE</th>
				<td colspan="3"><input type="radio" name="comp_let" value="Scarsa">Scarsa</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="comp_let" value="essenziale">Essenziale</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="comp_let" value="globale">Globale</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="comp_let" value="competenza_analitica">Competenza-analitica</td>
				</tr>
				<tr>
				<th colspan="5">SCRITTURA</th>
				</tr>
				<tr>
				<th rowspan="7"><textarea></textarea></th>
				<th rowspan="7">SOTTO DETTATURA</th>
				<td colspan="3"><input type="radio" name="scr_dett" value="corretta">Corretta</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="scr_dett" value="poco_corretta">Poco corretta</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="scr_dett" value="sorretta">Scorretta</td>
				</tr>
				<tr>
				<th colspan="3">TIPOLOGIA ERRORI</th>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="tipo_err" value="fonologici">Fonologici</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="tipo_err" value="!fonologici">NON fonologici</td>
				</tr>
				<tr>
				<td colspan="3"><input type="radio" name="tipo_err" value="fonetici">Fonetici</td>
				</tr>
				<tr>
				<td rowspan="10"><textarea></textarea></td>
				<th rowspan="10">PRODUZIONE AUTONOMA</th>
				<th colspan="3">ADERENZA CONSEGNA</th>
				</tr>
				<tr>
				<td><input type="radio" name="ader_cons" value="spesso">Spesso</td>
				<td><input type="radio" name="ader_cons" value="talvolta">Talvolta</td>
				<td><input type="radio" name="ader_cons" value="mai">Mai</td>
				</tr>
				<tr>
				<th colspan="3">CORRETTA STRUTTURA MORFO-SINTATTICA</th>
				</tr>
				<tr>
				<td><input type="radio" name="struct_morf" value="spesso">Spesso</td>
				<td><input type="radio" name="struct_morf" value="talvolta">Talvolta</td>
				<td><input type="radio" name="struct_morf" value="mai">Mai</td>
				</tr>
				<tr>
				<th colspan="3">CORRETTA STRUTTURA TESTUALE</th>
				</tr>
				<tr>
				<td><input type="radio" name="struct_txt" value="spesso">Spesso</td>
				<td><input type="radio" name="struct_txt" value="talvolta">Talvolta</td>
				<td><input type="radio" name="struct_txt" value="mai">Mai</td>
				</tr>
				<tr>
				<th colspan="3">CORRETTEZZA ORTOGRAFICA</th>
				</tr>
				<tr>
				<td><input type="radio" name="corr_ort" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="corr_ort" value="parziale">Parziale</td>
				<td><input type="radio" name="corr_ort" value="NON Adeguata">NON Adeguata</td>
				</tr>
				<tr>
				<th colspan="3">USO PUNTEGGIATURA</th>
				</tr>
				<tr>
				<td><input type="radio" name="punteggiatura" value="Adeguata"> Adeguato</td>
				<td><input type="radio" name="punteggiatura" value="parziale"> Parziale</td>
				<td><input type="radio" name="puteggiatura" value="NON Adeguata"> NON adeguato</td>
				</tr>
					<tr>
						<th colspan="5">GRAFIA</th>
					</tr>

					<tr>
						<td rowspan="4"><textarea name="grafia"></textarea></td>
						<th colspan="4">LEGGIBILE</th>
					</tr>
					<tr>
						<td><input type="radio" name="" value=""> Si</td>
						<td><input type="radio" name="" value="">Poco</td>
						<td colspan="2"><input type="radio" name="" value="">No</td>
					</tr>
					<tr><th colspan="4">TRATTO</th></tr>
					<tr>
						<td><input type="radio" name="" value="">Premuto</td>
						<td><input type="radio" name="" value="">Leggero</td>
						<td><input type="radio" name="" value="">Ripassato</td>
						<td><input type="radio" name="" value="">Incerto</td>
					</tr>
					<tr><th colspan="5">CALCOLO</th></tr>
					<tr>
						<td><textarea name="calcolo"></textarea></td>
						<td>Difficoltà visuospaziali (es: quantificazione automatizzata)</td>
						<td><input type="radio" name="" value="">Spesso</td>
						<td><input type="radio" name="" value="">Talvolta</td>
						<td><input type="radio" name="" value="">Mai</td>
					</tr>
					<tr>
						<td><textarea name=""></textarea></td>
						<td>Recupero di fatti numerici (es: tabelline)</td>
						<td><input type="radio" name="" value="">Raggiunto</td>
						<td><input type="radio" name="" value="">Parziale</td>
						<td><input type="radio" name="" value="">NON raggiunto</td>
					</tr>
					<tr>
						<td><textarea name=""></textarea></td>
						<td>Automatizzazione dell’algoritmo procedurale</td>
						<td><input type="radio" name="" value="">Raggiunto</td>
						<td><input type="radio" name="" value="">Parziale</td>
						<td><input type="radio" name="" value="">NON raggiunto</td>
					</tr>
					<tr>
						<td><textarea name=""></textarea></td>
						<td>Errori di processamento numerico (negli aspetti cardinali e ordinali e nella   corrispondenza tra numero e quantità)</td>
						<td><input type="radio" name="" value="">Spesso</td>
						<td><input type="radio" name="" value="">Talvolta</td>
						<td><input type="radio" name="" value="">Mai</td>
					</tr>
					<tr>
						<td><textarea name=""></textarea></td>
						<td>Uso degli algoritmi di base del calcolo (scritto e a mente)</td>
						<td><input type="radio" name="" value="">Adeguata</td>
						<td><input type="radio" name="" value="">Parziale</td>
						<td><input type="radio" name="" value="">NON Adeguata</td>
					</tr>
					<tr><td><textarea name=""></textarea></td>
						<td>Capacità di problem solving</td>
						<td><input type="radio" name="" value="">Adeguata</td>
						<td><input type="radio" name="" value="">Parziale</td>
						<td><input type="radio" name="" value="">NON Adeguata</td>
					</tr>
					<tr>
						<td><textarea name=""></textarea></td>
						<td>Comprensione del testo di un problema</td>
						<td><input type="radio" name="" value="">Adeguata</td>
						<td><input type="radio" name="" value="">Parziale</td>
						<td><input type="radio" name="" value="">NON Adeguata</td>
					</tr>

				</tbody>
			</table>


			<table border="2">
			<tbody>
				<tr>
					<th colspan="4">ALTRE CARATTERISTICHE DEL PROCESSO DI APPRENDIMENTO</th>
				</tr>
				<tr>
					<td>(Dati rilevabili SE presenti nella diagnosi)</td>
					<th colspan="3">OSSERVAZIONE IN CLASSE<br>(dati rilevati direttamente dagli insegnanti)</th>
				</tr>
				<tr><th colspan="4">PROPRIETA' LINGUISTICA</th></tr>
				<tr>
					<td><textarea name="prop_ling_txt"></textarea></td>
					<td><input type="checkbox" name="prop_ling" value="frase">Difficoltà nella strutturazione della frase</td>
					<td><input type="checkbox" name="prop_ling" value="lessicale">Difficoltà nel reperimento lessicale</td>
					<td><input type="checkbox" name="prop_ling" value="orale">Difficoltà nell'esposizione orale</td>
				</tr>
				<tr><th colspan="4">MEMORIA</th></tr>
				<tr>
					<td rowspan="4"><textarea name="memoria_txt"></textarea></td>
					<th colspan="3">Difficoltà nel memorizzare:</th>
				</tr>
				<tr>
					<td colspan="3"><input type="checkbox" name="memoria" value="categor"> Categorizzazioni</td>
				</tr>
				<tr><td colspan="3"><input type="checkbox" name="memoria" value="formule"> Formule, strutture grammaticali, algoritmi</td>
				</tr>
				<tr><td colspan="3"><input type="checkbox" name="memoria" value="sequenze"> Sequenze e procedure</td>
				</tr>
				<tr>
					<th colspan="4">ATTENZIONE</th>
				</tr>
				<tr>
					<td rowspan="4"><textarea name=""></textarea></td>
				</tr>
				<tr>
					<td colspan="3"><input type="checkbox" name="">attenzione visuo-spaziale</td>
				</tr>
				<tr>
					<td colspan="3"><input type="checkbox" name="">selettiva</td>
				</tr>
				<tr>
					<td colspan="3"><input type="checkbox" name="">intensiva</td>
				</tr>


				<tr>
					<th colspan="4">AFFATICABILITA'</th>
				</tr>
				<tr>
					<td><textarea name=""></textarea></td>
					<td><input type="radio" name="">Si</td>
					<td><input type="radio" name="">Poco</td>
					<td><input type="radio" name="">No</td>
				</tr>
				<tr>
					<th colspan="4">PRASSIE</th>
				</tr>
				<tr>
					<td rowspan="4"><textarea name=""></textarea></td>
				</tr>
				<tr>
					<td colspan="3"><input type="radio" name="">difficoltà di esecuzione</td>
				</tr>
				<tr>
					<td colspan="3"><input type="radio" name="">difficoltà di pianificazione</td>
				</tr>
				<tr>
					<td colspan="3"><input type="radio" name="">difficoltà di programmazione e progettazione</td>
				</tr>

			</tbody>
			</table>		
		</div>

		<div id="bes">
			<h2>SEZIONE B- PARTE II</h2>
			<h3>Allievi con altri Bisogni Educativi Speciali (non DSA)</h3>
			<h4>Descrizione delle abilità e dei comportamenti</h4>
			<h5>Rientrano in questa sezione le tipologie di disturbo evolutivo specifico (non DSA) e le situazioni di svantaggio  socioeconomico, culturale e linguistico citate dalla c.m. n. 8 del 06/03/2013</h5>

			<h3>1) DOCUMENTAZIONE GIÀ IN POSSESSO</h3>
			<ul>
				<li>Diagnosi di <textarea name="diag_di"></textarea></li>
				<li>Documentazione altri servizi (tipologia): <textarea name="ducum_altri"></textarea></li>
				<li>Relazione del consiglio di classe/team- in data: <input type="date" name="rel_classe"></li>
			</ul>
			<h3>2) INFORMAZIONI SPECIFICHE DESUNTE DAI DOCUMENTI SOPRA INDICATI</h3>
			<textarea name="info_spec"></textarea>

			<h3>3) DESCRIZIONE DELLE ABILITÀ E DEI COMPORTAMENTI OSSERVABILI A SCUOLA DA PARTE DEI DOCENTI DI CLASSE</h3>
			<ul>
				<li>per gli allievi con svantaggio socioeconomico, linguistico e culturale, senza diagnosi specialistica, si suggerisce la compilazione della griglia osservativa</li>
				<li>per gli allievi con Disturbi Evolutivi Specifici si suggerisce l’osservazione e la descrizione del comportamento e degli apprendimenti sulla base delle priorità di ciascuna disciplina, anche utilizzando gli indicatori predisposti per gli allievi con DSA (Sezione B parte I).</li>
			</ul>
			<textarea name="desc_ab"></textarea>

			<table border="2">
				<tbody>
					<tr>
						<th>GRIGLIA OSSERVATIVA per  ALLIEVI CON BES “III FASCIA” (Area dello svantaggio socioeconomico, linguistico e culturale)
						</th>
						<th colspan="4">
							Osservazione degli INSEGNANTI
						</th>
						<th colspan="4">Eventuale osservazione di altri operatori, (es. educatori, ove presenti)</th>
					</tr>
					<tr>
						<th></th>
						<th>2</th>
						<th>1</th>
						<th>0</th>
						<th>9</th>
						<th>2</th>
						<th>1</th>
						<th>0</th>
						<th>9</th>
					</tr>
					<tr>
						<td>Manifesta difficoltà di lettura/scrittura</td>
						<td><input type="radio" name="diff_lett_i" value="2"></td>
						<td><input type="radio" name="diff_lett_i" value="1"></td>
						<td><input type="radio" name="diff_lett_i" value="0"></td>
						<td><input type="radio" name="diff_lett_i" value="9"></td>
						<td><input type="radio" name="diff_lett_o" value="2"></td>
						<td><input type="radio" name="diff_lett_o" value="1"></td>
						<td><input type="radio" name="diff_lett_o" value="0"></td>
						<td><input type="radio" name="diff_lett_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta difficoltà di espressione orale</td>
						<td><input type="radio" name="diff_orale_i" value="2"></td>
						<td><input type="radio" name="diff_orale_i" value="1"></td>
						<td><input type="radio" name="diff_orale_i" value="0"></td>
						<td><input type="radio" name="diff_orale_i" value="9"></td>
						<td><input type="radio" name="diff_orale_o" value="2"></td>
						<td><input type="radio" name="diff_orale_o" value="1"></td>
						<td><input type="radio" name="diff_orale_o" value="0"></td>
						<td><input type="radio" name="diff_orale_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta difficoltà logico/matematiche</td>
						<td><input type="radio" name="diff_mat_i" value="2"></td>
						<td><input type="radio" name="diff_mat_i" value="1"></td>
						<td><input type="radio" name="diff_mat_i" value="0"></td>
						<td><input type="radio" name="diff_mat_i" value="9"></td>
						<td><input type="radio" name="diff_mat_o" value="2"></td>
						<td><input type="radio" name="diff_mat_o" value="1"></td>
						<td><input type="radio" name="diff_mat_o" value="0"></td>
						<td><input type="radio" name="diff_mat_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta difficoltà nel rispetto delle regole</td>
						<td><input type="radio" name="diff_risp_i" value="2"></td>
						<td><input type="radio" name="diff_risp_i" value="1"></td>
						<td><input type="radio" name="diff_risp_i" value="0"></td>
						<td><input type="radio" name="diff_risp_i" value="9"></td>
						<td><input type="radio" name="diff_risp_o" value="2"></td>
						<td><input type="radio" name="diff_risp_o" value="1"></td>
						<td><input type="radio" name="diff_risp_o" value="0"></td>
						<td><input type="radio" name="diff_risp_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta difficoltà nel mantenere l’attenzione durante le spiegazioni</td>
						<td><input type="radio" name="att_spieg_i" value="2"></td>
						<td><input type="radio" name="att_spieg_i" value="1"></td>
						<td><input type="radio" name="att_spieg_i" value="0"></td>
						<td><input type="radio" name="att_spieg_i" value="9"></td>
						<td><input type="radio" name="att_spieg_o" value="2"></td>
						<td><input type="radio" name="att_spieg_o" value="1"></td>
						<td><input type="radio" name="att_spieg_o" value="0"></td>
						<td><input type="radio" name="att_spieg_o" value="9"></td>
					</tr>
					<tr>
						<td>Non svolge regolarmente i compiti a casa</td>
						<td><input type="radio" name="compiti_i" value="2"></td>
						<td><input type="radio" name="compiti_i" value="1"></td>
						<td><input type="radio" name="compiti_i" value="0"></td>
						<td><input type="radio" name="compiti_i" value="9"></td>
						<td><input type="radio" name="compiti_o" value="2"></td>
						<td><input type="radio" name="compiti_o" value="1"></td>
						<td><input type="radio" name="compiti_o" value="0"></td>
						<td><input type="radio" name="compiti_o" value="9"></td>
					</tr>
					<tr>
						<td>Non esegue le consegne che gli vengono proposte in classe</td>
						<td><input type="radio" name="consegne_i" value="2"></td>
						<td><input type="radio" name="consegne_i" value="1"></td>
						<td><input type="radio" name="consegne_i" value="0"></td>
						<td><input type="radio" name="consegne_i" value="9"></td>
						<td><input type="radio" name="consegne_o" value="2"></td>
						<td><input type="radio" name="consegne_o" value="1"></td>
						<td><input type="radio" name="consegne_o" value="0"></td>
						<td><input type="radio" name="consegne_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta difficoltà nella comprensione delle consegne proposte</td>
						<td><input type="radio" name="compr_cons_i" value="2"></td>
						<td><input type="radio" name="compr_cons_i" value="1"></td>
						<td><input type="radio" name="compr_cons_i" value="0"></td>
						<td><input type="radio" name="compr_cons_i" value="9"></td>
						<td><input type="radio" name="compr_cons_o" value="2"></td>
						<td><input type="radio" name="compr_cons_o" value="1"></td>
						<td><input type="radio" name="compr_cons_o" value="0"></td>
						<td><input type="radio" name="compr_cons_o" value="9"></td>
					</tr>
					<tr>
						<td>Fa domande non pertinenti all’insegnante/educatore</td>
						<td><input type="radio" name="domande_i" value="2"></td>
						<td><input type="radio" name="domande_i" value="1"></td>
						<td><input type="radio" name="domande_i" value="0"></td>
						<td><input type="radio" name="domande_i" value="9"></td>
						<td><input type="radio" name="domande_o" value="2"></td>
						<td><input type="radio" name="domande_o" value="1"></td>
						<td><input type="radio" name="domande_o" value="0"></td>
						<td><input type="radio" name="domande_o" value="9"></td>
					</tr>
					<tr>
						<td>Disturba lo svolgimento delle lezioni (distrae i compagni, ecc.)</td>
						<td><input type="radio" name="disturba_i" value="2"></td>
						<td><input type="radio" name="disturba_i" value="1"></td>
						<td><input type="radio" name="disturba_i" value="0"></td>
						<td><input type="radio" name="disturba_i" value="9"></td>
						<td><input type="radio" name="disturba_o" value="2"></td>
						<td><input type="radio" name="disturba_o" value="1"></td>
						<td><input type="radio" name="disturba_o" value="0"></td>
						<td><input type="radio" name="disturba_o" value="9"></td>
					</tr>
					<tr>
						<td>Non presta attenzione ai richiami dell’insegnante/educatore</td>
						<td><input type="radio" name="richiami_i" value="2"></td>
						<td><input type="radio" name="richiami_i" value="1"></td>
						<td><input type="radio" name="richiami_i" value="0"></td>
						<td><input type="radio" name="richiami_i" value="9"></td>
						<td><input type="radio" name="richiami_o" value="2"></td>
						<td><input type="radio" name="richiami_o" value="1"></td>
						<td><input type="radio" name="richiami_o" value="0"></td>
						<td><input type="radio" name="richiami_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta difficoltà a stare fermo nel proprio banco</td>
						<td><input type="radio" name="diff_fermo_i" value="2"></td>
						<td><input type="radio" name="diff_fermo_i" value="1"></td>
						<td><input type="radio" name="diff_fermo_i" value="0"></td>
						<td><input type="radio" name="diff_fermo_i" value="9"></td>
						<td><input type="radio" name="diff_fermo_o" value="2"></td>
						<td><input type="radio" name="diff_fermo_o" value="1"></td>
						<td><input type="radio" name="diff_fermo_o" value="0"></td>
						<td><input type="radio" name="diff_fermo_o" value="9"></td>
					</tr>
					<tr>
						<td>Si fa distrarre dai compagni</td>
						<td><input type="radio" name="distrae_i" value="2"></td>
						<td><input type="radio" name="distrae_i" value="1"></td>
						<td><input type="radio" name="distrae_i" value="0"></td>
						<td><input type="radio" name="distrae_i" value="9"></td>
						<td><input type="radio" name="distrae_o" value="2"></td>
						<td><input type="radio" name="distrae_o" value="1"></td>
						<td><input type="radio" name="distrae_o" value="0"></td>
						<td><input type="radio" name="distrae_o" value="9"></td>
					</tr>
					<tr>
						<td>Manifesta timidezza</td>
						<td><input type="radio" name="timido_i" value="2"></td>
						<td><input type="radio" name="timido_i" value="1"></td>
						<td><input type="radio" name="timido_i" value="0"></td>
						<td><input type="radio" name="timido_i" value="9"></td>
						<td><input type="radio" name="timido_o" value="2"></td>
						<td><input type="radio" name="timido_o" value="1"></td>
						<td><input type="radio" name="timido_o" value="0"></td>
						<td><input type="radio" name="timido_o" value="9"></td>
					</tr>
					<tr>
						<td>Viene escluso dai compagni dalle attività scolastiche</td>
						<td><input type="radio" name="escluso_att_i" value="2"></td>
						<td><input type="radio" name="escluso_att_i" value="1"></td>
						<td><input type="radio" name="escluso_att_i" value="0"></td>
						<td><input type="radio" name="escluso_att_i" value="9"></td>
						<td><input type="radio" name="escluso_att_o" value="2"></td>
						<td><input type="radio" name="escluso_att_o" value="1"></td>
						<td><input type="radio" name="escluso_att_o" value="0"></td>
						<td><input type="radio" name="escluso_att_o" value="9"></td>
					</tr>
					<tr>
						<td>Viene escluso dai compagni dalle attività di gioco</td>
						<td><input type="radio" name="escluso_gioco_i" value="2"></td>
						<td><input type="radio" name="escluso_gioco_i" value="1"></td>
						<td><input type="radio" name="escluso_gioco_i" value="0"></td>
						<td><input type="radio" name="escluso_gioco_i" value="9"></td>
						<td><input type="radio" name="escluso_gioco_o" value="2"></td>
						<td><input type="radio" name="escluso_gioco_o" value="1"></td>
						<td><input type="radio" name="escluso_gioco_o" value="0"></td>
						<td><input type="radio" name="escluso_gioco_o" value="9"></td>
					</tr>
					<tr>
						<td>Tende ad autoescludersi dalle attività scolastiche</td>
						<td><input type="radio" name="autoesc_att_i" value="2"></td>
						<td><input type="radio" name="autoesc_att_i" value="1"></td>
						<td><input type="radio" name="autoesc_att_i" value="0"></td>
						<td><input type="radio" name="autoesc_att_i" value="9"></td>
						<td><input type="radio" name="autoesc_att_o" value="2"></td>
						<td><input type="radio" name="autoesc_att_o" value="1"></td>
						<td><input type="radio" name="autoesc_att_o" value="0"></td>
						<td><input type="radio" name="autoesc_att_o" value="9"></td>
					</tr>
					<tr>
						<td>Tende ad autoescludersi dalle attività di gioco/ricreative</td>
						<td><input type="radio" name="autoesc_gioco_i" value="2"></td>
						<td><input type="radio" name="autoesc_gioco_i" value="1"></td>
						<td><input type="radio" name="autoesc_gioco_i" value="0"></td>
						<td><input type="radio" name="autoesc_gioco_i" value="9"></td>
						<td><input type="radio" name="autoesc_gioco_o" value="2"></td>
						<td><input type="radio" name="autoesc_gioco_o" value="1"></td>
						<td><input type="radio" name="autoesc_gioco_o" value="0"></td>
						<td><input type="radio" name="autoesc_gioco_o" value="9"></td>
					</tr>
					<tr>
						<td>Non porta a scuola i materiali necessari alle attività scolastiche</td>
						<td><input type="radio" name="materiali_i" value="2"></td>
						<td><input type="radio" name="materiali_i" value="1"></td>
						<td><input type="radio" name="materiali_i" value="0"></td>
						<td><input type="radio" name="materiali_i" value="9"></td>
						<td><input type="radio" name="materiali_o" value="2"></td>
						<td><input type="radio" name="materiali_o" value="1"></td>
						<td><input type="radio" name="materiali_o" value="0"></td>
						<td><input type="radio" name="materiali_o" value="9"></td>
					</tr>
					<tr>
						<td>Ha Scarsa cura dei materiali per le attività scolastiche (propri e della scuola)</td>
						<td><input type="radio" name="cura_materiali_i" value="2"></td>
						<td><input type="radio" name="cura_materiali_i" value="1"></td>
						<td><input type="radio" name="cura_materiali_i" value="0"></td>
						<td><input type="radio" name="cura_materiali_i" value="9"></td>
						<td><input type="radio" name="cura_materiali_o" value="2"></td>
						<td><input type="radio" name="cura_materiali_o" value="1"></td>
						<td><input type="radio" name="cura_materiali_o" value="0"></td>
						<td><input type="radio" name="cura_materiali_o" value="9"></td>
					</tr>
					<tr>
						<td>Dimostra Scarsa fiducia nelle proprie capacità</td>
						<td><input type="radio" name="fiducia_i" value="2"></td>
						<td><input type="radio" name="fiducia_i" value="1"></td>
						<td><input type="radio" name="fiducia_i" value="0"></td>
						<td><input type="radio" name="fiducia_i" value="9"></td>
						<td><input type="radio" name="fiducia_o" value="2"></td>
						<td><input type="radio" name="fiducia_o" value="1"></td>
						<td><input type="radio" name="fiducia_o" value="0"></td>
						<td><input type="radio" name="fiducia_o" value="9"></td>
					</tr>
				</tbody>
			</table>
			<h3>LEGENDA</h3>
			<p> 
				<b>2</b> L’elemento descritto dal criterio mette in evidenza problematicità rilevanti o reiterate<br>
				<b>1</b> L’elemento descritto dal criterio mette in evidenza problematicità  lievi o occasionali<br>
				<b>0</b> L’elemento descritto dal criterio non mette in evidenza particolari problematicità<br>
				<b>9</b> L’elemento “negativo” descritto non si rileva, ma, al contrario, si evidenzia nell’allievo come comportamento positivo quale indicatore di un “punto di forza”, su cui fare leva nell’intervento (es: ultimo item - dimostra piena fiducia nelle proprie capacità). 
			</p>
		</div>


<!--_______________ TABELLE DA FINIRE _____________-->

	

	<h2 class="title">SEZIONE C -  (comune a tutti gli allievi con DSA e altri BES)</h2>
	<h3 class="title">C.1 Osservazione di Ulteriori Aspetti Significativi</h3>

	<table border="2">
		<tbody>
			<tr>
				<th colspan="5">MOTIVAZIONE</th>
			</tr>
			<tr>
				<td>Partecipazione al dialogo educativo</td>
				<td><input type="radio" name="part_diag" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="part_diag" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="part_diag" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="part_diag" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Consapevolezza delle proprie difficoltà</td>
				<td><input type="radio" name="cons_diff" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="cons_diff" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="cons_diff" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="cons_diff" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Consapevolezza dei propri punti di forza</td>
				<td><input type="radio" name="cons_for" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="cons_for" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="cons_for" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="cons_for" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Autostima</td>
				<td><input type="radio" name="autostima" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="autostima" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="autostima" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="autostima" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<th colspan="5">ATTEGGIAMENTI E COMPORTAMENTI RISCONTRABILI A SCUOLA</th>
			</tr>
			<tr>
				<td>Regolarità frequenza scolastica</td>
				<td><input type="radio" name="reg_freq" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="reg_freq" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="reg_freq" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="reg_freq" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Accettazione e rispetto delle regole</td>
				<td><input type="radio" name="risp_reg" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="risp_reg" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="risp_reg" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="risp_reg" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Rispetto degli impegni </td>
				<td><input type="radio" name="risp_imp" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="risp_imp" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="risp_imp" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="risp_imp" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Accettazione consapevole degli strumenti compensativi e delle misure dispensative</td>
				<td><input type="radio" name="acc_strum" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="acc_strum" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="acc_strum" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="acc_strum" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<td>Autonomia nel lavoro </td>
				<td><input type="radio" name="autonomia" value="Molto Adeguata"> Molto Adeguata</td>
				<td><input type="radio" name="autonomia" value="Adeguata">Adeguata</td>
				<td><input type="radio" name="autonomia" value="Poco Adeguata">Poco Adeguata</td>
				<td><input type="radio" name="autonomia" value="NON Adeguata">NON Adeguata</td>
			</tr>
			<tr>
				<th colspan="5">STRATEGIE UTILIZZATE DALL’ALUNNO NELLO STUDIO </th>
			</tr>
			<tr>
				<td> Sottolinea, identifica parole chiave … </td>
				<td colspan="2"><input type="radio" name="sottolinea" value="Efficace">Efficace</td>
				<td colspan="2"><input type="radio" name="sottolinea" value="Da potenziare">Da potenziare</td>
			</tr>
			<tr>
				<td>Costruisce schemi, mappe o  diagrammi</td>
				<td colspan="2"><input type="radio" name="schemi" value="Efficace">Efficace</td>
				<td colspan="2"><input type="radio" name="schemi" value="Da potenziare">Da potenziare</td>
			</tr>
			<tr>
				<td>Utilizza strumenti informatici (computer, correttore ortografico, software …)</td>
				<td colspan="2"><input type="radio" name="computer" value="Efficace">Efficace</td>
				<td colspan="2"><input type="radio" name="computer" value="Da potenziare">Da potenziare</td>
			</tr>
			<tr>
				<td> Usa strategie di memorizzazione   (immagini, colori, riquadrature …) </td>
				<td colspan="2"><input type="radio" name="mem" value="Efficace">Efficace</td>
				<td colspan="2"><input type="radio" name="mem" value="Da potenziare">Da potenziare</td>
			</tr>
			<tr>
				<td colspan="5">Altro: <textarea name="strat_altro"></textarea></td>
			</tr>
			<!-- APPRENDIMENTO LINGUE STRANIERE -->

		</tbody>
	</table>
	<table border="2">
		<tbody>
			<tr>
				<th>APPRENDIMENTO DELLE LINGUE STRANIERE</th>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Pronuncia difficoltosa</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Difficoltà di acquisizione degli automatismi grammaticali di base</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Difficoltà nella scrittura</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Difficoltà acquisizione nuovo lessico</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Notevoli differenze tra comprensione del testo scritto e orale</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="">Notevoli differenze tra produzione scritta e orale</td>
			</tr>
			<tr>
				<td rowspan="2"><input type="checkbox" name="">Altro:<br><textarea name=""></textarea></td>
			</tr>
			<tr></tr>
			<tr>
				<th>INFORMAZIONI GENERALI FORNITE DALL’ALUNNO/STUDENTE</th>
			</tr>
			<tr>
				<td>Interessi, difficoltà, attività in cui si sente capace, punti di forza, aspettative,  richieste...<br><textarea name=""></textarea></td>
			</tr>
		</tbody>
	</table>

	<h3 class="title">C.2 PATTO EDUCATIVO</h2>

	<h4>Si ricorda con la famiglia e lo studente:</h4>

	<p><b>Nelle attività di studio l'allievo:</b></p>
	<p>
		<input type="checkbox" name="att_studio" value="1">è seguito da un Tutor nelle discipline: <textarea name="att_studio_tutor"></textarea> <br>
		<input type="checkbox" name="att_studio" value="2">è seguito dai familiari<br>
		<input type="checkbox" name="att_studio" value="3">ricorre all'aiuto di compagni<br>
		<input type="checkbox" name="att_studio" value="4">utilizza strumenti compensativi<br>
		<input type="checkbox" name="att_studio" value="5">altro: <textarea name="att_studio_altro"></textarea>
	</p>

	<p><b>Strumenti da utilizzare nel lavoro a casa:</b></p>
	<p>
		<input type="checkbox" name="lavoro_casa" value="1">strumenti informatici(pc, videoscrittura con correttore ortografico, ...)<br>
		<input type="checkbox" name="lavoro_casa" value="2">tecnologia di sintassi vocale<br>
		<input type="checkbox" name="lavoro_casa" value="3">appunti scritti al pc<br>
		<input type="checkbox" name="lavoro_casa" value="4">registrazioni digitali<br>
		<input type="checkbox" name="lavoro_casa" value="5">materiali multimediali(video, simulazioni...)<br>
		<input type="checkbox" name="lavoro_casa" value="6">testi semplificati e/o ridotti<br>
		<input type="checkbox" name="lavoro_casa" value="7">fotocopie<br>
		<input type="checkbox" name="lavoro_casa" value="8">schemi e mappe<br>
		<input type="checkbox" name="lavoro_casa" value="9">altro: <textarea name="lavoro_casa_altro"></textarea>
	</p>
	<p><b>Attività scolastiche individualizzate programmate</b></p>
	<p>
		<input type="checkbox" name="att_prog" value="1">attività di recupero<br>
		<input type="checkbox" name="att_prog" value="2">attività di consolidamento e/o potenziamento<br>
		<input type="checkbox" name="att_prog" value="3">attività di laboratorio<br>
		<input type="checkbox" name="att_prog" value="4">attività di classi aperte(per piccoli gruppi)<br>
		<input type="checkbox" name="att_prog" value="5">attività curricolari all'esterno dell'ambiente scolastico<br>
		<input type="checkbox" name="att_prog" value="6">attività di carattere culturale, formativo, socializzante<br>
		<input type="checkbox" name="att_prog" value="7">altro: <textarea name="att_prog_altro"></textarea>
	</p>


	<h2 class="title">SEZIONE D: INTERVENTI EDUCATIVI E DIDATTICI</h2>
	<h3 class="title">D.1: STRATEGIE DI PERSONALIZZAZIONE/INDIVIDUALIZZAZIONE</h3>


	<table border="2">
		<tbody>
			<tr>
				<th>DISCIPLINA o AMBITO DISCIPLINARE</th>
				<th>STRATEGIE DIDATTICHE INCLUSIVE</th>
				<th>STRUMENTI COMPENSATIVI</th>
				<th>MISURE DISPENSATIVE</th>
				<th>OBIETTIVI DISCIPLINARI PERSONALIZZATI</th>
				<th>STRATEGIE E CRITERI DI VALUTAZIONE</th>
			</tr>
			<tr>
				<td rowspan="4">MATERIA<br><input type="text" name="materia1"><br>Firma Docente:<br>.........................</td>
				<td>
					<?php

						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "pdp";
						
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT enunciato_graduato FROM specifico WHERE ID_GENERALE = 1";
						$result = $conn->query($sql);
						echo "<select><optgroup>";
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	#$row["enunciato_graduato"] = htmlentities($row["enunciato_graduato"], ENT_COMPAT, "UTF-8");
						        echo "<option>$row[enunciato_graduato]</option>";

						    }
						} else {
						    echo "0 results";
						}
						$conn->close();
						echo "</optgroup></select>";
					?>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td rowspan="4">MATERIA<br><input type="text" name="materia1"><br>Firma Docente:<br>.........................</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td rowspan="4">MATERIA<br><input type="text" name="materia1"><br>Firma Docente:<br>.........................</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td rowspan="4">MATERIA<br><input type="text" name="materia1"><br>Firma Docente:<br>.........................</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
		</tbody>
	</table>



	<h3 class="title">D.2: STRATEGIE DI PERSONALIZZAZIONE/INDIVIDUALIZZAZIONE "SU BASE ICF"</h3>

	<h3>TABELLA RIASSNTIVA DELL'IMPIANTO VALUTATIVO PERSONALIZZATO</h3>

	<table>
		<tbody>
			<tr>
				<th>Disciplina</th>
				<th>Eventuali Misure Dispensative</th>
				<th>Strumenti compensativi</th>
				<th>Tempi aggiuntivi</th>
				<th>Obiettivi</th>
				<th>Criteri alutativi</th>
				<th>Altro</th>
			</tr>
		</tbody>
	</table>

	<h3>AZIONI SUL CONTESTO CLASSE (Verso una didattica inclusiva)</h3>

	<table border="2">
		<thead>Tab. 3: PROPOSTE DI ADEGUAMENTI-ARRICCHIMENTI  DELLA DIDATTICA “DI CLASSE” IN RELAZIONE AGLI STRUMENTI/STRATEGIE INTRODOTTE PER L’ALLIEVO CON BES</thead>
		<tbody>
			<tr>
				<td>Strumento/strategia  scelti per l’allievo

(Introduzione di facilitatori)
</td>
				<td>Modifiche per la classe

(descrivere sinteticamente come si intende modificare/adeguare la didattica per tutti)
</td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
			<tr>
				<td><textarea name=""></textarea></td>
				<td><textarea name=""></textarea></td>
			</tr>
		</tbody>
	</table>









<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>














































    <p>Le parti coinvolte si impegnano a rispettare quanto condiviso e concordato, nel presente PDP, per il successo formativo dell'alunno.</p>

    <table border="1">
    	<tbody>
    		<tr>
    			<th>Cognome e nome</th>
    			<th>Disciplina</th>
    			<th>Firma</th>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td></td>
    		</tr>
    		<tr>
    			<td><input type="text" name=""></td>
    			<td><input type="text" name=""></td>
    			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    		</tr>
    	</tbody>
    </table>




    <p>FIRMA DEI GENITORI</p>
    <p>_____________________</p>
    <p>_____________________</p>

    <p>FIRMA DELL'ALLIEVO (per la scuola sec.di II°)</p>
    <p>_____________________</p>

    <p>______________, lì ______________</p>


    <p>IL DIRIGENTE SCOLASTICO</p>
    <p>_____________________</p>













		<button name="butt" value="send">Invia</button>
		<button name="butt" value="save">Salva</button>
		<button name="butt" value="load">Carica</button>
	</form>

<!-- CONNESSIONE AL DATABASE CON UNA QUERY DI ESEMPIO

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pdp";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM specifico";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "id: " . $row["enunciato_graduato"]."<br>";
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();
	 ?>
-->

</body>
</html>