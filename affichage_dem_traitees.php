<?php session_start()?>
<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="affichage_dem_traitees.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		

		
			<div id="Bienvenue">
			<h1>Bienvenue sur la plateforme de commande de matériel</h1>
			</div>
		
			
			
		</div>
		

		<div id="main">
			<div id="menu">
				<input type="submit" id='submit'onclick=window.location.href='accTechnicien.php' value='ACCUEIL' >
			<input type="submit" id='submit'onclick=window.location.href='page_2_enseignant.php' value='DEMANDES EN ATTENTE' >
				<input type="submit" id='submit'onclick=window.location.href='demande_traitees_enseignant.php' value='DEMANDES TRAITEES' >
					<input type="submit" id='submit' onclick=window.location.href='messagerie.php' value='MESSAGERIE' >
			
				<div id="logopopo">
				<img src="images\logoPOPO.jpg" alt="" />
			</div>
			</div>
			
			
		<?php
			include("connect_bdd.php");
			$demande = $_POST['demande'];	

			$sql = "SELECT * FROM toute_demandes WHERE description = '".$demande."'";
			$sth = $base->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll();
			$id = $result[0][0];

			$numero = $result[0][1];
			$description = $result[0][2];
			$budget = $result[0][3];
			$produit = $result[0][4];
			$quantite = $result[0][5];
			$fournisseur = $result[0][6];
			$prix = $result[0][7];
			$lien = $result[0][8];
			$image = $result[0][9];
			$jour = $result[0][10];
			$mail = $result[0][11];
			$ue = $result[0][12];
			$nom = $result[0][13];
			$description_e = $result[0][14];
			$commentaire = $result[0][15];
		?>
		<div id="contenu">
			<fieldset>
					<legend>Demande</legend>
					<?php
					echo "Id de la demande:",$id;
					echo "<br>";
					echo "Description de la demande: ",$description;
					echo "<br>";
					echo "Numéro étudiant du demandeur :",$numero;
					echo "<br>";
					echo "Budget de la demande: ",$budget;
					echo "<br>";
					echo "Produit demandé: ",$produit;
					echo "<br>";
					echo "Quantité demandée: ",$quantite;
					echo "<br>";
					echo "Fournisseur du produit:",$fournisseur;
					echo "<br>";
					echo "Prix unitaire du produit:",$prix;
					echo "<br>";
					echo "Lien marchand vers le site du produit:",$lien;
					echo "<br>";
					echo "Image du produit:",$image;
					echo "<br>";
					echo "Date de la demande:",$jour;
					echo "<br>";
					echo "Mail du demandeur :",$mail;
					echo "<br>";
					echo "Nom de l'enseignant:",$nom;
					echo "<br>";
					echo "UE enseigné:",$ue;
					echo "<br>";
					echo "Description supplémentaire du projet :",$description_e;
					echo "<br>";
					echo "Commentaire de l'enseignant :",$commentaire;
					echo "<br>";
					

					echo "<form action = 'commande_recu.php' method='post'>";
					echo "<p><label>Confirmation de l'id de la commande reçu</label> : <input type='text' name='id' /></p>";
					echo "<input type='submit' id='bouton_recu' value='Confirmer'>";
					echo "</form>";

					?>
					
			</fieldset>
				
		</div>
		</div>

		<div id="footer">
		<br>Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes</br>
		<br> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</br>
			
		</div>
	</body>
</html>	