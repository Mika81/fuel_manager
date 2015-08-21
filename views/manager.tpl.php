<?php
## views/manager.tpl.php
?>
<h3>Gérer votre <?php echo $_SESSION['vehicle']['brand'] ." ". $_SESSION['vehicle']['model']; ?></h3>
<h4>Kilométrage total: <?php echo $_SESSION['vehicle']['global_km']; ?> km</h4>
<p>Consommation moyenne: ??/100km</p>
<p>Coût moyen: ?? €/100km</p>
<p>Date du dernier plein: jj/mm/aaaa</p>

