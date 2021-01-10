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

while($row = mysqli_fetch_array($result)){
    $nome=$row['nome'];
    $username=$row['username'];
    $email=$row['email'];
    $sexo=$row['sexo'];
    $idade=$row['idade'];
    $morada=$row['morada'];
    $localidade=$row['localidade'];
    $contacto=$row['contacto'];
    $nif=$row['NIF'];

    echo "$nome<br>";
    echo "$username<br>";
    echo "$email<br>";
    echo "$sexo<br>";
    echo "$idade<br>";
    echo "$morada<br>";
    echo "$localidade<br>";
    echo "$contacto<br>";
    echo "$nif<br>";
    if($row['cartao_saude']== "S") echo "Cartao de Saude: Sim";
    else echo "<b>Cartao de Saude:</b> Nao</center><br>";
    if($row['alergias']== "S") echo "<b>Alergias:</b> Sim<br><br>";
    else echo "<b>Alergias:</b> Nao<br><br>";

}


?>