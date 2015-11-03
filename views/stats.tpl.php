<?php
## views/stats.tpl.php
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Toutes les stats de votre 
        <span class='text-primary'><?php echo ucfirst($vehicle_object->getBrand()) . " " . ucfirst($vehicle_object->getModel()); ?></span>
    </div>
    <div class="panel-body">
        <p class="text-info">Les moyennes:</p>
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><?php echo $average_conso; ?> litres/100km</span>
                Consommation moyenne:
            </li>
            <li class="list-group-item">
                <span class="badge"><?php echo $price_per_km; ?> €/km</span>
                Coût moyen:
            </li>
        </ul>
        <p class="text-info">Depuis le <?php echo $first_date; ?>:</p>
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><?php echo $global_distance; ?> km</span>
                Kilométrage parcourus:
            </li>
            <li class="list-group-item">
                <span class="badge"><?php echo $global_conso; ?> litres</span>
                Quantité de carburant consommé:
            </li>
            <li class="list-group-item">
                <span class="badge"><?php echo $global_price; ?> €</span>
                Coût total:
            </li>
        </ul>
        <p>Date d'enregistrement du dernier plein: <strong><?php echo $last_modif; ?></strong><br>Kilométrage total du véhicule au dernier plein: <strong><?php echo $vehicle_object->getGlobal_km(); ?> km</strong></p>
        <a href="/?profil" class="btn btn-info pull-right">Retour</a>
    </div>
</div>