<?php



if(isset($_POST['utente'])==false){
    $utente = 0;
}
else $utente=$_POST['utente'];



$medico=$_SESSION['nome'];
echo "<center><h1>Ficha dos Seus Utentes</h1></center>";
$connect = mysqli_connect('localhost', 'root', '','covid')
or die('Error connecting to the server: ' . mysqli_error($connect));
$sql3 = "SELECT * FROM usuarios INNER JOIN pacientes ON usuarios.id=pacientes.user_id WHERE medico='$medico'";
$result = mysqli_query($connect ,$sql3)
or die('The query failed: ' . mysqli_error($connect));

echo "<form action='index.php?option=fichaDosSeusUtentes' method='POST'>";

echo "Escolha o Utente que pretende ver a ficha.<br>";
echo "<input list='utente' name='utente'>";
echo "<datalist id='utente'>";
while($row = mysqli_fetch_array($result)){
    $pt=$row['nome'];
    echo "<option value='$pt'>" ;
}
echo"</datalist>";
echo "<input type='submit' value='Mostrar'>";
echo "</form>";


$connect = mysqli_connect('localhost', 'root', '','covid')
or die('Error connecting to the server: ' . mysqli_error($connect));
$sql3 = "SELECT * FROM usuarios INNER JOIN pacientes ON usuarios.id=pacientes.user_id WHERE nome='$utente'";
$result = mysqli_query($connect ,$sql3)
or die('The query failed: ' . mysqli_error($connect));

echo "<br><br><br>";
$resultado=0;
while($row = mysqli_fetch_array($result)){
    
    if($row['nome']==$row['nome'] &&$row['foto']==NULL) echo '<center><img width="200" src="assets\avatar.png"></center>';
    //else   

    $nome=$row['nome'];
    $username=$row['username'];
    $email=$row['email'];
    $sexo=$row['sexo'];
    $idade=$row['idade'];
    $morada=$row['morada'];
    $localidade=$row['localidade'];
    $contacto=$row['contacto'];
    $nif=$row['NIF'];
    $resultado=$row['resultado'];

    echo "<br><br><center><b>Nome:</b> $nome </center><br><br>" ;
    echo "<center><b>Username:</b> $username </center><br><br>" ;
    echo "<center><b>Email:</b> " .$email. "</center><br><br>";
    echo "<center><b>Sexo:</b> " .$sexo. "</center><br><br>";
    echo "<center><b>Idade:</b> " .$idade. "</center><br><br>";
    echo "<center><b>Morada:</b> " .$morada. "</center><br><br>";
    echo "<center><b>Localidade:</b> " .$localidade. "</center><br><br>";
    echo "<center><b>Contacto:</b> " .$contacto. "</center><br><br>";
    echo "<center><b>NIF:</b> " .$nif. "</center><br><br>";
    if($row['cartao_saude']== "S") echo "<center><b>Cartao de Saude:</b> Sim</center><br><br>";
    else echo "<center><b>Cartao de Saude:</b> Nao</center><br><br>";
    if($row['alergias']== "S") echo "<center><b>Alergias:</b> Sim</center><br><br>";
    else echo "<center><b>Alergias:</b> Nao</center><br><br>";
    
    if($row['resultado']==NULL) echo "<center><b>Resultado:</b> Sem avaliacao </center><br><br>";
    else if($row['resultado']==0) echo "<center><b>Resultado:</b> Low Risk </center><br><br>";
    else if($row['resultado']==1) echo "<center><b>Resultado:</b> Medium Risk </center><br><br>";
    else if($row['resultado']==2) echo "<center><b>Resultado:</b> High Risk </center><br><br>" ;
}
    

?>