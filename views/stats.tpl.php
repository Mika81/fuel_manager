<?php
## views/stats.tpl.php
?>

<h3>Gérer votre <?php echo $vehicle_object->getBrand() ." ". $vehicle_object->getModel(); ?></h3>
<h4>Kilométrage total: <?php echo $vehicle_object->getGlobal_km(); ?> km</h4>
<div class="alert alert-success">
    <p>Consommation moyenne: <strong><?php echo $average_conso; ?></strong> litres/100km</p>
    <p>Coût moyen: <strong><?php echo $price_per_km; ?></strong> €/km</p>
</div>
<div class="alert alert-info">
    <h4>Depuis le <?php echo $first_date; ?>:</h4>
    <p><strong><?php echo $global_distance; ?></strong> km parcourus,<br>
        <strong><?php echo $global_conso; ?></strong> litres de carburant consommés,<br>
        pour un coût global de <strong><?php echo $global_price; ?></strong> €uros.</p>
    <p>Date d'enregistrement du dernier plein: <strong><?php echo $last_modif; ?></strong></p>
</div>


