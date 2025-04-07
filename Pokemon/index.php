<?php



include_once 'classes/autoLoad.php';

function combat(Pokemon $p1, Pokemon $p2)
{
    $i=0;
    while($p1->getHp() > 0 && $p2->getHp() > 0)
    {
        $i++;
        
        $D1=$p1->attack($p2);
        $D2=$p2->attack($p1);
        echo '<div class="alert alert-danger">Round '.$i;
        echo '<div class="alert alert-primary"><div class="row">';
        echo '<div class="col">'.$D1.'</div>';
        echo '<div class="col">'.$D2.'</div></div></div></div>';
        echo '<div class="row">';
        $p1->whoAmI();
        $p2->whoAmI();
        echo '</div><br>';
    }
    if($p1->getHp()<$p2->getHp())
    {
        echo '<div class="alert alert-success">Le gagnant est '.$p2->getNom().'<img width="150" height="150" class="img-thumbnail" src="'.$p2->getImage().'">'.'</div>';
    }
    elseif($p1->getHp() > $p2->getHp())
    {
        echo '<div class="alert alert-success">Le gagnant est '.$p1->getNom().'<img width="150" height="150" class="img-thumbnail" src="'.$p1->getImage().'">'.'</div>';
    }
    else
    {
        echo 'Pas de gagnant ';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Pokemon</title>
</head>
<body>
    <div class="container">
        <div class="alert alert-primary">
           <h6>Les combattants</h6>
        </div>
          <?php
            $atk1 = new AttackPokemon(10, 20, 2, 60);
            $atk2 = new AttackPokemon(7, 15, 1.5, 30);
            $atk3 = new AttackPokemon(10, 17, 2.5, 40);
            $atk4 = new AttackPokemon(15, 23, 3, 50);
            $p1 = new PokemonFeu("Charmander", "https://www.pokepedia.fr/images/thumb/8/89/Salam%C3%A8che-RFVF.png/800px-Salam%C3%A8che-RFVF.png", 150, $atk1);
            $p2 = new PokemonEau("Squirtle", "https://www.realite-virtuelle.com/wp-content/uploads/2022/11/position.webp", 175, $atk3);
            $p3 = new PokemonPlante("Bulbasaur", "https://www.123-stickers.com/7670/autocollant-bulbizarre-pokemon-001.jpg", 200, $atk2);
            $p4 =new PokemonFeu("Charizard", "https://www.pokepedia.fr/images/thumb/1/17/Dracaufeu-RFVF.png/375px-Dracaufeu-RFVF.png", 160, $atk4);
            ?>
        
            
        <div class="row">
        <?php  $p1->whoAmI(); 
           $p4->whoAmI(); ?>
             </div>

        <form method="post" >
        <div class="d-grid gap-2 col-6 mx-auto">
            <br>
            <Button type="submit" name="combat"  class="btn btn-primary">Lancer le combat</Button>
        </div>
        <br>
        </form>

             <?php
           
                if(isset($_POST['combat'])) {
                    combat($p1, $p4);  
                    unset($_POST['combat']);
                }
            
            ?>
           
    </div>
            
</body>
</html>











