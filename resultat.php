
<body style="margin: 40px auto; width: 880px;text-align: center;"> <h3>Resultats</h3>
<?php
    $debut = $_POST["debut"]; //sommet de debut
    $nb_sommet=$_POST["nb_sommet"];
    $Graphe = array();

    // inisialisation de la matrice
    for($i=1;$i<=$nb_sommet;$i++){
        for($j=1;$j<=$nb_sommet;$j++){
            if(!empty($_POST["arc"][$i][$j])){
            $Graphe[$i][$j]=$_POST["arc"][$i][$j];
    }}}
    $chemin = array();
    $Pi = array();//notre variable pi
    for($i=1;$i<=$nb_sommet;$i++){  $Pi[$i] = 10000000; //infini
  }
    $Pi[$debut] = 0;

    //le core de l'algorithme
    while(!empty($Pi)){
        $ind_min = array_search(min($Pi), $Pi);// array_search return l'indice de la minimum valeur dans Pi.
        foreach($Graphe[$ind_min] as $ommet=>$val){ //successeur de ind_min
            if(!empty($Pi[$ommet]) && $Pi[$ind_min] + $val < $Pi[$ommet]) {
            $Pi[$ommet] = $Pi[$ind_min] + $val;
            $chemin[$ommet] = array($ind_min, $Pi[$ommet]); // ind_min: sommet predecesseur , Pi(sommet): longueur
            }
        }    
        unset($Pi[$ind_min]); //eliminer cette sommet
    }
    //affichage
    for($i=1;$i<=$nb_sommet;$i++){
        if( $i == $debut) continue;
        $path = array();
        $fin=$i;
        $pos = $fin;
        // cas: pas de  chemin
        if (!array_key_exists($fin, $chemin)) {
            echo "<br /><h4 style='margin-bottom: 4px;'>De $debut a $fin </h4>";
            echo "<br />aucun chemin";
            echo "<br><br>";
            continue;
        }
        // chercher le chemin
        while($pos != $debut){
            $path[] = $pos;
            $pos = $chemin[$pos][0];
        }
        $path[] = $debut;
        $path = array_reverse($path);
        echo "<br /><h4 style='margin-bottom: 4px;'>De $debut a $fin </h4>";
        echo "chemin : ".implode('->', $path);
        echo "<br />longueur : ".$chemin[$fin][1];
        echo "<br><br>";
    } 
?>

