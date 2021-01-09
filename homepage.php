<?php

if ($_SESSION['perfil'] == 'Guest'){
    echo "<h1>Welcome Guest Perfil ".$_SESSION['perfil']." </h1>";
    echo '<img src="assets\donald_dance.gif">';

}
    
if ($_SESSION['perfil'] == 'paciente'){
    echo "<h1>Welcome ".$_SESSION['nome']." Perfil ".$_SESSION['perfil']." </h1>";
    echo "Nao se esqueca que antes de fazer a consulta tera de inserir os seus dados pessoais";
    echo '<img src="assets\pip_boy4.jpg">';
}
    

?>

