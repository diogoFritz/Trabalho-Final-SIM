<?php



if ($_SESSION['perfil'] == 'Guest'){
    echo '<center><h1 style="font-family: Montserrat">Welcome to Covid Test Center </h1></center>';
    echo '<br><center><img width="400" src="assets\happy_family.png"></center><br><br><br>';

}
else {
    
    if ($_SESSION['perfil'] == 'admin'){
        echo "<center><h1>Welcome ".$_SESSION['nome']."!</h1></center>";
        echo '<center><img width="550" src="assets\administrador.png"></center>';
        echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
        
    }
        
    if ($_SESSION['perfil'] == 'paciente'){
        echo "<h1>Welcome ".$_SESSION['nome']."!</h1>";
        //echo '<img src="assets\pip_boy4.jpg">';
        echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
        echo "<b>Nota:</b> Nao se esqueca de inserir os seus dados pessoais antes de fazer a consulta";
    
    }

    if ($_SESSION['perfil'] == 'investigador'){
        echo "<center><h1>Welcome ".$_SESSION['nome']."!</h1></center>";
        echo '<center><img src="assets\data.png"></center>';
        echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
    }

    if ($_SESSION['perfil'] == 'medico'){
        echo "<center><h1>Welcome Dr.".$_SESSION['nome']." </h1></center>";
        echo '<center><img  src="assets\doctor.png"></center>';
        echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
    }
}
    

?>

