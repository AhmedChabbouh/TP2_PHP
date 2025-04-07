<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Session</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center">
    <?php
        include_once 'classes/autoLoad.php';
        $session = new session();
        if (isset($_POST['reset'])) {
            $session->reset();
            header("Location: ".$_SERVER['PHP_SELF']);

        }

        if ($session->getNbvisites()==1)
            {
                echo "<h3>Bienvenu à notre plateforme.</h3>";
            }
            else
            {
                echo "<h3>Merci pour votre fidélité,c’est votre «".$session->getNbvisites()."» éme visite.</h3>";
            }





    ?>
    <form method="post">
    <div class="d-grid gap-2 d-md-block">
    <button  name='reset' class="btn btn-primary c">Réinitialiser la session</button>
    </form>
    </div>
    </div>
</body>
</html>