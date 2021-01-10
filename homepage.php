<?php

if ($_SESSION['perfil'] == 'Guest'){
    echo '<center><h1 style="font-family: Montserrat">Welcome to Covid Test Center </h1></center>';
    echo '<br><center><img width="400" src="assets\happy_family.png"></center><br><br><br>';

}

if ($_SESSION['perfil'] == 'admin'){
    echo "<center><h1>Welcome ".$_SESSION['nome']."!</h1></center>";
    echo '<center><img width="550" src="assets\administrador.png"></center>';
    echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
    
}
    
if ($_SESSION['perfil'] == 'paciente'){
    
    $user_id=$_SESSION['user_id'];
    echo "<center><h1>Welcome ".$_SESSION['nome']."!</h1></center>";

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($connect ,$sql)
    or die('The query failed: ' . mysqli_error($connect));
    while ($row= mysqli_fetch_array($result)) 
    { 
        if($row['id']==$user_id &&$row['foto']==NULL) echo '<center><img width="550" src="assets\avatar.png"></center>';
        //else   
    } 

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
    echo '<center><img width="300" src="assets\doctor.jpg"></center>';
    echo "<u><center><h4>Perfil de ".$_SESSION['perfil']." </h4></center></u>";
}
    

?>

