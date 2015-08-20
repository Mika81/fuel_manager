<?php
##  views/profil.tpl.php
?>
<h2>Mon profil</h2>
<h3>Mes coordonnées</h3>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>E-mail</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php print $_SESSION['user']['alias']; ?></td>
            <td><?php print $_SESSION['user']['address']; ?></td>
            <td><?php print $_SESSION['user']['email']; ?></td>
        </tr>
    </tbody>
</table>

<h3>Mes véhicules</h3>
<table>
    <thead>
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Type</th>
            <th>Consommation</th>
            <th>Kmage</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Une marque</td>
            <td>Un modèle</td>
            <td>Un type</td>
            <td>la conso</td>
            <td>les km</td>
        </tr>
    </tbody>
</table>