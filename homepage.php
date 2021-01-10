<?php

if ($_SESSION['perfil'] == 'Guest'){
    echo '<center><h1 style="font-family: Montserrat">Welcome to Covid Test Center </h1></center>';
    echo '<br><center><img width="400" src="assets\happy_family.png"></center><br><br><br>';

}
    
if ($_SESSION['perfil'] == 'paciente'){
    echo "<h1>Welcome ".$_SESSION['nome']."!</h1>";
    echo "<h3>Perfil de ".$_SESSION['perfil'].". </h3>";
    echo "<b>Nota:</b> Nao se esqueca de inserir os seus dados pessoais antes de fazer a consulta";
    //echo '<img src="assets\pip_boy4.jpg">';
}

if ($_SESSION['perfil'] == 'investigador'){
    echo "<center><h1>Welcome ".$_SESSION['nome']."!</h1></center>";
    echo '<center><img src="assets\data.png"></center>';
    echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
}

if ($_SESSION['perfil'] == 'medico'){
    echo "<h1>Welcome Dr.".$_SESSION['nome']." </h1>";
    echo '<img width="100" src="assets\vault_boy_medic.png">';
}
    

?>

