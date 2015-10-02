<?php
##  views/profil.tpl.php
?>
<h1>Mon profil</h1>
<div class="panel panel-default">
    <div class="panel-heading">Mes coordonnées<a href='#'><span class='pull-right glyphicon glyphicon-edit'></span></a></div>
    <div class="panel-body">
        <p>Nom : <?php print ucfirst($_SESSION['user']['alias']); ?></p>
        <p>E-mail : <?php print ucfirst($_SESSION['user']['email']); ?></p>
        <p>Adresse : <?php print ucfirst($_SESSION['user']['address']); ?></p>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Mes véhicules</div>
    <div class="panel-body">
        <?php
        if (is_array($vehicle_list)) :
            ?>
            <div class="list-group">
                <?php
                foreach ($vehicle_list as $key => $value) :
                    ?>
                    <div class="list-group-item m-bottom-20">
                        <div class='row'>
                            <div class='col-md-8 pull-left'>
                                <h4 class="list-group-item-heading"><?php echo ucfirst($value['brand']) .' '. ucfirst($value['model']) ?></h4>
                                <p class="list-group-item-text">Type: <?php echo ucfirst($value['type']) ?><br>
                                    Carburant: <?php echo ucfirst($value['fuel_type']) ?><br>
                                    Km: <?php echo ucfirst($value['global_km']) ?></p>
                            </div>
                            <div class='col-md-4 text-right'>
                                <form class='m-bottom-10' method='post' action='?manage_vehicle=<?php echo $value['vehicle_id'] ?>'>
                                    <button title='Ajouter un parcours'  type='submit' class='btn btn-success' name='manage_vehicle' value='<?php echo $value['vehicle_id'] ?>'>
                                        <span class='glyphicon glyphicon-edit'></span>
                                    </button>
                                </form>
                                <form class='m-bottom-10' method='post' action='?stats=<?php echo $value['vehicle_id'] ?>'>
                                    <button title='Voir les statistiques' type='submit' class='btn btn-info' name='stats' value='<?php $_SESSION['vehicle']['vehicle_id'] ?>'>
                                        <span class='glyphicon glyphicon-signal'></span>
                                    </button>
                                </form>
                                <form method='post' onSubmit='return check_delete()'>
                                    <button title='Supprimer' type='submit' class='btn btn-danger' name='vehicle_2_delete' value='<?php echo $value['vehicle_id'] ?>'>
                                        <span class='glyphicon glyphicon-remove'></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
        else :
            if (is_string($vehicle_list)) :
                print "<div class='alert alert-info'><p>" . $vehicle_list . "</p></div>";
            endif;
        endif;
        ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Ajouter un véhicule</div>
    <div class="panel-body">
        <?php
        include_once 'forms/add_vehicle_form.html';
        ?>
    </div>
</div>

