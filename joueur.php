<?php include('menuFBF.html'); ?>
<link rel="stylesheet" href="style.css">
<fieldset class="div">
	<legend>ENREGISTREMENT DES JOUEURS</legend>
	<form action="joueur.php" method="post">
		<!-- <input name="key" type="hidden" /> -->
		<table>
			<tr>
				<td>Nom</td>
				<td><input name="nom" type="text" /></td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td><input name="prenom" type="text" /></td>
			</tr>
			<tr>
				<td>Date de naissance</td>
				<td><input name="datenais" type="date" /></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td><input name="vile" type="text" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="Enregistrer" name="btn" /></td>
			</tr>
		</table>
	</form>
</fieldset>

<?php
require('connexion.php');
if (isset($_POST['btn'])) {
	$db = connecte();
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['datenais'];
	$ville = $_POST['vile'];
	$req = $db->prepare('INSERT INTO JOUEUR(Nom,prenom,datenaissance,ville) VALUE(?,?,?,?)');
	$req->execute(array($nom, $prenom, $date, $ville));
}
$db = connecte();
$reponse = $db->query('SELECT * FROM Joueur');
echo '<table style="border-collapse:collapse" border=1 width="700">';
echo '<tr>
		<th>Numero</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Date de naissance</th>
		<th>Ville</th>
	</tr>';
while ($donnees = $reponse->fetch()) {
	echo '<tr>';
	echo '<td>' . $donnees['Idjoueur'] . '</td>';
	echo '<td>' . $donnees['Nom'] . '</td>';
	echo '<td>' . $donnees['prenom'] . '</td>';
	echo '<td>' . $donnees['datenaissance'] . '</td>';
	echo '<td>' . $donnees['ville'] . '</td>';
	echo '</tr>';
}
echo '</table>';
