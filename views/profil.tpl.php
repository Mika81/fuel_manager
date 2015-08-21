<?php
##  views/profil.tpl.php
?>
<h2>Mon profil</h2>
<h3>Mes coordonnées</h3>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php print ucfirst($_SESSION['user']['alias']); ?></td>
                <td><?php print $_SESSION['user']['address']; ?></td>
                <td><?php print $_SESSION['user']['email']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
    
<?php
if(isset($_SESSION['vehicle']) && !empty($_SESSION['vehicle'])) :
?>
<h3>Véhicule sélectionné</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Type</th>
                    <th>Carburant</th>
                    <th>Kilométrage</th>
                    <th>Voir les statistiques de ce véhicule</th>
                    <th>Gérer le véhicule</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    print "<tr>";
                    print "<td>" . ucfirst($_SESSION['vehicle']['brand']) . "</td>";
                    print "<td>" . ucfirst($_SESSION['vehicle']['model']) . "</td>";
                    print "<td>" . ucfirst($_SESSION['vehicle']['type']) . "</td>";
                    print "<td>" . ucfirst($_SESSION['vehicle']['fuel_type']) . "</td>";
                    print "<td>" . ucfirst($_SESSION['vehicle']['global_km']) . " km</td>";
                    print "<td><form method='post'><button type='submit' name='stats' value='".$_SESSION['vehicle']['vehicle_id']."'>O</button></form></td>";
                    print "<td><form method='post'><button type='submit' name='manage_vehicle' value='".$_SESSION['vehicle']['vehicle_id']."'>O</button></form></td>";
                    print "<tr>";
                ?>
            </tbody>
        </table>
    </div>
<?php
else :
?>
    <h4>Sélectionnez un véhicule dans la liste de vos véhicules</h4>
<?php
endif;
?>


<h3>Mes véhicules</h3>
<?php
if (is_array($vehicle_list)) :
    ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Type</th>
                    <th>Carburant</th>
                    <th>Kilométrage</th>
                    <th>Sélectionner</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vehicle_list as $key => $value) :
                    print "<tr>";
                    print "<td>" . ucfirst($value['brand']) . "</td>";
                    print "<td>" . ucfirst($value['model']) . "</td>";
                    print "<td>" . ucfirst($value['type']) . "</td>";
                    print "<td>" . ucfirst($value['fuel_type']) . "</td>";
                    print "<td>" . ucfirst($value['global_km']) . " km</td>";
                    print "<td><form method='post'><button type='submit' name='vehicle_selected' value='".$value['vehicle_id']."'>O</button></form></td>";
                    print "<td><form method='post'><button type='submit' name='vehicle_2_delete' value='".$value['vehicle_id']."'>X</button></form></td>";
                    print "<tr>";
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <?php
else :
    if (is_string($vehicle_list)) :
        print "<div class='alert alert-info'><p>" . $vehicle_list . "</p></div>";
    endif;
endif;
include_once 'forms/add_vehicle_form.html';
