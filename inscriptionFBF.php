<?php include('menuFBF.html'); ?>
<link rel="stylesheet" href="style.css">
<fieldset class="div">
    <legend>INSCRIPTION ANNUELLE POUR LE CHAMPIONNAT</legend>
    <form action="inscriptionFBF.php" method="post">
        <table>
            <tr>
                <td>Catégorie</td>
                <td>
                    <select name="categorie">
                        <option>Sénior</option>
                        <option>Junior</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Club</td>
                <td>
                    <select name="club">
                        <?php
                        require('connexion.php');
                        $db = connecte();
                        $reponse = $db->query('SELECT * FROM club');
                        while ($donnees = $reponse->fetch()) {
                            echo ' <option value="' . $donnees['idclub'] . '">' . $donnees['nomclub'] . '</option>';
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nom</td>
                <td>
                    <select name="nom">
                        <?php
                        $reponse = $db->query('SELECT * FROM Joueur');
                        var_dump($reponse);
                        while ($donnees = $reponse->fetch()) {
                            echo ' <option value="' . $donnees['Idjoueur'] . '">' . $donnees['Nom'] . ' ' . $donnees['prenom'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Saison</td>
                <td><input type="text" name="saison" /></td>
            </tr>
            <tr>
                <td><input type="submit" value="Enregistrer" name="btn" /></td>
            </tr>
        </table>
    </form>
</fieldset>
<?php
if (isset($_POST['btn'])) {
    // print_r($_POST['categorie']);
    if (!empty($_POST['categorie']) and !empty($_POST['club']) and !empty($_POST['nom']) and !empty($_POST['saison'])) {
        $categorie = $_POST['categorie'];
        $club = $_POST['club'];
        $nom = $_POST['nom'];
        $saison = $_POST['saison'];
        $req = $db->prepare('INSERT INTO inscription(Idjoueur,saison,Categorie,idclub) VALUE(?,?,?,?)');
        $req->execute(array($nom, $saison, $categorie, $club));
        if ($req) {
            echo '<h3>Enregistrement effectué avec succès</h3>';
        } else {
            echo '<h3>Enregistrement non effectué</h3>';
        }
    } else {
        echo '<h3>Tout les champs sont obligatoires</h3>';
    }
}
$condition = 'joueur.Idjoueur=inscription.Idjoueur AND club.idclub=inscription.idclub';
$reponse = $db->query('SELECT Nom,prenom,Categorie,saison,nomclub FROM joueur,inscription,club WHERE ' . $condition);
echo '<table style="border-collapse:collapse" border=1 width="700">';
echo '<tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Saison</th>
    <th>Categorie</th>
    <th>Club</th>
</tr>';
while ($donnees = $reponse->fetch()) {
    echo '<tr>';
    echo '<td>' . $donnees['Nom'] . '</td>';
    echo '<td>' . $donnees['prenom'] . '</td>';
    echo '<td>' . $donnees['saison'] . '</td>';
    echo '<td>' . $donnees['Categorie'] . '</td>';
    echo '<td>' . $donnees['nomclub'] . '</td>';
    echo '</tr>';
}
echo '</table>';
