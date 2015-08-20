<!DOCTYPE html>
<html>
    <head>
        <title>Fuel manager</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1> - - </h1>
        <?php
        if (empty($_SESSION)) :
            if (isset($_POST['signup'])) :
                ?>                    
                <p>Créer un compte</p>
                <div id="login-form">
                    <form action="" method="POST">
                        <div class="form-group clearfix">
                            <input type="text" name="alias" placeholder="Pseudo" class="form-control" />
                            <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                            <textarea name="address" placeholder="Adresse" class="form-control"></textarea>
                            <input type="email" name="email" placeholder="E-mail" class="form-control" />
                            <input type="submit" name="create" class="btn btn-default pull-right" value="Créer un compte"/>
                        </div>
                    </form>
                </div>
            <?php else : ?>
                <div id="login-form">
                    <form action="" method="POST">
                        <div class="form-group clearfix">
                            <input type="text" name="alias" placeholder="Pseudo" class="form-control" />
                            <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                            <input type="submit" name="connection" class="btn btn-default pull-right" value="Se connecter"/>
                        </div>
                    </form>
                </div>
                <form method="post">
                    <button type="submit" name="signup" value="1">Créer un compte !</a>
                </form>
            <?php endif; ?>
        <?php else : ?>
            <div class="alert alert-info">Bonjour <?php print $_SESSION['pseudo']; ?> ! <a href="">Déconnexion</a></div>
        <?php endif; ?>
    </body>
</html>