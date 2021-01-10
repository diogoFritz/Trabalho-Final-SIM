<?php
    $user_id = $_SESSION['user_id'];
    $idade = $_POST['idade'];
    $_SESSION['idade']=$idade;
    $morada = $_POST['morada'];
    $localidade = $_POST['localidade'];
    $contacto = $_POST['contacto'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $nif = $_POST['nif'];
    $cartao = $_POST['cartao'];
    $alergias = $_POST['alergias'];
    $medico = $_POST['medicos'];

    // Dados do Paciente
    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql = 'SELECT * FROM pacientes';
    $result = mysqli_query($connect ,$sql);
    $id = mysqli_num_rows($result);
    $id = $id+1;

    $sql2 = "SELECT * FROM pacientes where user_id=$user_id";
    $result = mysqli_query($connect ,$sql2)
    or die('The query failed: ' . mysqli_error($connect));
    $check = mysqli_num_rows($result);
    

    if($check){
        $sql = "UPDATE pacientes SET idade=$idade,morada='$morada',localidade='$localidade',contacto=$contacto,email='$email',sexo='$sexo',NIF=$nif,cartao_saude='$cartao',alergias='$alergias', medico='$medico' where user_id = $user_id";
        echo "Dados de conta atualizados!";
    }
       
    else {
        echo "Dados de conta atualizados!";
        $sql = "INSERT INTO pacientes (paciente_id,USER_ID,IDADE,MORADA,LOCALIDADE,CONTACTO,EMAIL,SEXO,NIF,CARTAO_SAUDE,ALERGIAS,MEDICO) VALUES (".$id.",".$user_id.",'".$idade."','".$morada."','".$localidade."',".$contacto.",'".$email."','".$sexo."',".$nif.",'".$cartao."','".$alergias."','".$medico."')";
        //Permite ir pra consulta
    }
        
    if (mysqli_query($connect, $sql)) {
        //echo "record created successfully in pacientes !";
        
    } else {
        echo "Error: ".$sql." ".mysqli_error($connect);
    }

    
    mysqli_close($connect);
?>