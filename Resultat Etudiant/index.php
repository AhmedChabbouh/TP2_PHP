
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Resulat des etudiants</title>

</head>
<body>
    <div class="container">
    <div class="row">
        
    <?php
    include_once 'classes/autoLoad.php';
    function liste_etudiant(...$args) {
        foreach ($args as $arg) {
            echo '<div class="col">';
                $arg->affiche();
                echo '<li class="list-group-item list-group-item-primary">Moyenne: ' . $arg->moyenne() . '</li>';

            echo '</div>';
        }
    }
    $e1=new Etudiant("Aymen", 11, 13, 18,7,10,13,2,5,1);
    $e2=new Etudiant("Skander", 15, 9, 8,16);
    liste_etudiant($e1, $e2);
    ?>
    </div>
    </div>
</body>
</html>