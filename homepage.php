<?php

if ($_SESSION['perfil'] == 'Guest'){
    echo '<h1 style="font-family: Montserrat">Welcome to Covid Care Center </h1>';
    echo '<img width="400" src="assets\covid.jpg">';

}
    
if ($_SESSION['perfil'] == 'paciente'){
    echo "<h1>Welcome ".$_SESSION['nome']." Perfil ".$_SESSION['perfil']." </h1>";
    echo "Nao se esqueca que antes de fazer a consulta tera de inserir os seus dados pessoais";
    echo '<img src="assets\pip_boy4.jpg">';
}

if ($_SESSION['perfil'] == 'investigador'){
    echo "<h1>Welcome ".$_SESSION['nome']." Perfil ".$_SESSION['perfil']." </h1>";
    //echo "Nao se esqueca que antes de fazer a consulta tera de inserir os seus dados pessoais";
    echo '<img src="assets\pip_boy3.jpg">';
}

if ($_SESSION['perfil'] == 'medico'){
    echo "<h1>Welcome ".$_SESSION['nome']." </h1>";
    echo '<img width="100" src="assets\vault_boy_medic.png">';
}
    

?>

