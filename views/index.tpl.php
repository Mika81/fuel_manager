<!DOCTYPE html>
<html>
    <head>
        <title>Fuel manager</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1> - - </h1>
        <?php if (empty($_SESSION)) : ?>
            <div id="login-form">
                <form action="" method="POST">
                    <div class="form-group clearfix">
                        <input type="text" name="alias" placeholder="Pseudo" class="form-control" />
                        <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                        <input type="submit" name="connection" class="btn btn-default pull-right" value="Se connecter"/>
                    </div>
                </form>
            </div>
        <?php else : ?>
            <div class="alert alert-info">Bonjour <?php print $_SESSION['pseudo']; ?> ! <a href="?application=user&action=disconnect">Déconnexion</a></div>
        <?php endif; ?>
    </body>
</html>