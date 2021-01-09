<?php
    $user_id = $_SESSION['user_id'];
    $idade = $_POST['idade'];
    $morada = $_POST['morada'];
    $localidade = $_POST['localidade'];
    $contacto = $_POST['contacto'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $nif = $_POST['nif'];
    $cartao = $_POST['cartao'];
    $alergias = $_POST['alergias'];
  

    // Dados do Paciente
    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql = 'SELECT * FROM pacientes';
    $result = mysqli_query($connect ,$sql);
    $id = mysqli_num_rows($result);
    $id = $id+1;
    $sql = "INSERT INTO pacientes (paciente_id,USER_ID,IDADE,MORADA,LOCALIDADE,CONTACTO,EMAIL,SEXO,NIF,CARTAO_SAUDE,ALERGIAS) VALUES (".$id.",".$user_id.",'".$idade."','".$morada."','".$localidade."',".$contacto.",'".$email."','".$sexo."',".$nif.",'".$cartao."','".$alergias."')";

    if (mysqli_query($connect, $sql)) {
        echo "Added new record created successfully in pacientes !";
    } else {
        echo "Error: ".$sql." ".mysqli_error($connect);
    }
    mysqli_close($connect);
?>