<?php include('menuFBF.html'); ?>
<link rel="stylesheet" href="style.css">
<fieldset class="div">
    <legend>INSCRIPTION ANNUELLE POUR LE CHAMPIONNAT</legend>
    <form action="rechercheFBF.php" method="post">
        <table>
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
                <td>Année</td>
                <td>
                    <select name="saison">
                        <?php
                        $db = connecte();
                        $reponse = $db->query('SELECT distinct saison FROM inscription');
                        while ($donnees = $reponse->fetch()) {
                            echo ' <option value="' . $donnees['saison'] . '">' . $donnees['saison'] . '</option>';
                        } ?>
                    </select>
                </td>
            </tr>
        </table>
        <br />
        <span>LISTE DES JOUEURS</span>
        <?php
        if (isset($_POST['btn'])) {
            $club = $_POST['club'];
            $saison = $_POST['saison'];
            $condition = 'joueur.Idjoueur=inscription.Idjoueur AND club.idclub=inscription.idclub AND 
            inscription.saison="' . $saison . '" and inscription.idclub=' . $club . '';
            // var_dump($condition);
            $db = connecte();
            $reponse = $db->query('SELECT Nom,prenom,Categorie FROM joueur,inscription,club
             WHERE ' . $condition);
            echo '<table style="border-collapse:collapse" border=1 width="300" margin="10">';
            echo '<tr>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>Catégorie</th>
                    </tr>';
            while ($donnees = $reponse->fetch()) {
                echo '<tr>';
                echo '<td>' . $donnees['Nom'] . '</td>';
                echo '<td>' . $donnees['prenom'] . '</td>';
                echo '<td>' . $donnees['Categorie'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
        <br />
        <input type="submit" value="Rechercher" name="btn" />
    </form>
</fieldset>
<?php
/*
select Nom,prenom,Categorie FROM joueur,inscription,club WHERE joueur.Idjoueur=inscription.Idjoueur
 AND club.idclub=inscription.idclub AND inscription.saison='2021-2022' and inscription.idclub=1;
*/
