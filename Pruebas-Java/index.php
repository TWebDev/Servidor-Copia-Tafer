<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       /* $entrada = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
        $claves_aleatorias = array_rand($entrada, 2);
        echo $entrada[$claves_aleatorias[0]] . "\n";
        echo $entrada[$claves_aleatorias[1]] . "\n";*/
   
        
        $numers = array("3338398861", "3315385166", "3310260679", "3311253312", "10283849");
        $numAlea = array_rand($numers,2);
        print  $numers[$numAlea[0]] . "\n";
        echo '<h1> Hola</h1>';
        /*echo $numers[$numAlea[1]]. "\n";*/
    ?>

</body>
</html>
