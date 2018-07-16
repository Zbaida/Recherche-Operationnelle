<body style="margin: 40px auto; width: 880px;text-align: center;">
<h2>Graphe</h2>
<?php
if(!empty($_POST["nb_sommet"])){
    $nb_sommet=$_POST["nb_sommet"];
    echo "<form  action='resultat.php' method='post'>";

    for($i=1;$i<=$_POST["nb_sommet"];$i++){
    for($j=1;$j<=$_POST["nb_sommet"];$j++){
    $V_N=($i == $j) ? '0' : ''; //initialiser la diagonale par 0
    echo"<input type='text' size='4' name='arc[$i][$j]' value='$V_N' style='height: 32px;margin-left: 12px;padding-left: 8px;margin-bottom: 12px;'>";  
    }
    echo "<br>";
    }
    echo"<br><input type='hidden' name='nb_sommet' value='$nb_sommet'>";
    echo"<input type='text'  name='debut' placeholder='point de debut' style='height: 32px;margin-left: 16px;padding-left: 8px;margin-bottom: 12px;'>";
    echo"<br><br><input type='submit' value='Chercher' >";

    echo "</form>";
}
?>
