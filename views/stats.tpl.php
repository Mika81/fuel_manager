<?php
## views/stats.tpl.php
?>

<h3>Gérer votre <?php echo $vehicle_object->getBrand() ." ". $vehicle_object->getModel(); ?></h3>
<h4>Kilométrage total: <?php echo $vehicle_object->getGlobal_km(); ?> km</h4>
<p>Consommation moyenne: ?? /100km</p>
<p>Coût moyen: ?? €/km</p>
<?php if($last_modif) : $last_modif = date('d/m/Y à H:i', strtotime($last_modif)); else : $last_modif = 'Pas encore de parcours.'; endif; ?>
<p>Date du dernier plein: <?php print $last_modif; ?></p>
<p>Carburant total utilisé depuis le jj/mm/aaaa : ?? litres</p>
<p>Coût total utilisé depuis le jj/mm/aaaa : ?? €</p>

