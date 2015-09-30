<?php
## views/stats.tpl.php
?>

<h3>Gérer votre <?php echo $vehicle_object->getBrand() ." ". $vehicle_object->getModel(); ?></h3>
<h4>Kilométrage total: <?php echo $vehicle_object->getGlobal_km(); ?> km</h4>
<p>Consommation moyenne: ?? /100km</p>
<p>Coût moyen: ?? €/km</p>
<p>Date du dernier plein: <?php echo date('d/m/Y à H:i', strtotime($last_modif)); ?></p>
<p>Carburant total utilisé depuis le jj/mm/aaaa : ?? litres</p>
<p>Coût total utilisé depuis le jj/mm/aaaa : ?? €</p>

