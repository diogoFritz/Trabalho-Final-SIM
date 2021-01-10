<?php
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $perfil = $_POST['perfil'];
    $morada = $_POST['morada'];
    $contacto = $_POST['contacto'];
    $email = $_POST['email'];

    if($perfil == 'admin')
        $tabela = "ADMINISTRADORES";
    if($perfil == 'medico')
        $tabela = "MEDICOS";
    if($perfil == 'investigador')
        $tabela = "INVESTIGADORES";

    // Dados do Utilizador

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql ="SELECT * FROM usuarios where username = '$username' ";
    $result = mysqli_query($connect ,$sql);
    $resultados = mysqli_num_rows($result);
   // printf("$username , Result set has %d rows.\n",$resultados);
    if ($resultados)
        echo "Username ja existe. Tente Outra vez.";
    else {
        // Criar novo usuario
        $sql = 'SELECT * FROM usuarios';
        $result = mysqli_query($connect ,$sql);
        $user_id = mysqli_num_rows($result);
        $user_id = $user_id+1;
        
        $sql1 = "INSERT INTO usuarios (id,nome,username,password,perfil) VALUES (".$user_id.",'".$nome."','".$username."','".$password."','".$perfil."')";
        //print( "user id é $user_id . $sql");
        //Criar Novo Utilizador do tipo admin/medico/investigador";
        $sql = "SELECT * FROM $tabela";
        $result = mysqli_query($connect ,$sql);
        $id = mysqli_num_rows($result);
        $id = $id+1;
        $sql2 = "INSERT INTO $tabela (id,user_id,nome,morada,contacto,email) VALUES (".$id.",".$user_id.",'".$nome."','".$morada."','".$contacto."','".$email."')";

        
        if (mysqli_query($connect, $sql1)) {
            echo "New record created successfully in usuarios !";
        } else {
           echo "Error: ".$sql." ".mysqli_error($connect);
        }
        if (mysqli_query($connect, $sql2)) {
            echo "New record created successfully in $tabela !";
        } else {
           echo "Error: ".$sql2." ".mysqli_error($connect);
        }

    }
    
    
    
    
    
/*
    $sql2 = "SELECT * FROM pacientes where user_id=$user_id";
    $result = mysqli_query($connect ,$sql2)
    or die('The query failed: ' . mysqli_error($connect));
    $check = mysqli_num_rows($result);

    
    if($check){
        $sql = "UPDATE pacientes SET idade=$idade,morada='$morada',localidade='$localidade',contacto=$contacto,email='$email',sexo='$sexo',NIF=$nif,cartao_saude='$cartao',alergias='$alergias' where user_id = $user_id";
        echo "LISTA ATUALIZADA";
    }
       
    else {
        echo "Adicionou medico à tabela";
        $sql = "INSERT INTO medico (paciente_id,USER_ID,IDADE,MORADA,LOCALIDADE,CONTACTO,EMAIL,SE) VALUES (".$id.",".$user_id.",'".$idade."','".$morada."','".$localidade."',".$contacto.",'".$email."','".$sexo."',".$nif.",'".$cartao."','".$alergias."')";
        //Permite ir pra consulta
    }
        
    if (mysqli_query($connect, $sql)) {
        echo "record created successfully in pacientes !";
        
    } else {
        echo "Error: ".$sql." ".mysqli_error($connect);
    }
*/
    
    mysqli_close($connect);
?>