<?php
require("Arme.php");
require("Personnage.php");

try{
   $BDD = new PDO("mysql:host=192.168.65.60; dbname=RPG; charset=utf8", "root", "root");
} catch (\Throwable $th) {
   $BDD = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script type="text/javascript" src="javascript.js"></script>
   <title>Site de combat</title>
</head>

<body>
   <?php
   if (!is_null($BDD)){
      ?>
      <h1>Combat !!</h1>
   <?php
   $Perso1 = new Personnage(1,$BDD);
   $Perso2 = new Personnage(2,$BDD);
   ?>

                <h2>
                    Le Combattant 1 est : <?php echo $Perso1->getNom() ?>.
                </h2>
                <h3>
                    Ses armes sont : 
                    <?php
                        echo $Perso1->getStrListeArme()
                    ?>
                </h3>
                <h2>
                    Le Combattant 2 est : <?php echo $Perso2->getNom() ?>.
                </h2>
                <h3>
                    Ses armes sont : 
                    <?php
                        echo $Perso2->getStrListeArme()
                    ?>
                </h3>

                <?php
                    
                    "SELECT COUNT(*) FROM Personnage";
            } else 
            {
                echo "Pas de base";
            }
        ?>
    </body>
</html>