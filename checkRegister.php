
<?php

    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $perfil = $_POST['perfil'];
    //$foto = $_POST['foto'];
    // Dados do Paciente

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    //$sql = 'SELECT * FROM USERS WHERE (username = "'.$_POST['user'] .'"AND password = "'.md5($_POST['pass']).'")';
    $sql = 'SELECT * FROM usuarios WHERE USERNAME="'.$user.'"';
    $sql2 = 'SELECT * FROM usuarios inner join pacientes on usuarios.user_id = pacientes.user_id where USERNAME="'.$user.'"' ;
    $result = mysqli_query($connect ,$sql2)

    
    or die('The query failed: ' . mysqli_error($connect));
    $resultados = mysqli_num_rows($result); // numero de resultados para optimizar numero de páginas
    //print_r($result);

   
    if ($resultados)
        echo "Username ja existe. Tente Outra vez.";
    else {
        //echo "Criar Novo Utilizador";
        $id_user =result["user_id"];
        $sql3 = "INSERT INTO usuarios (NAME,USERNAME,PASSWORD,PERFIL) VALUES (".$user.",".$pass.",".$perfil.")";
        $sql4 = "INSERT INTO pacientes (NOME,user_id) VALUES (".$name.",".$user_id.")";

        if (mysqli_query($connect, $sql3)) {
            echo "New record created successfully in usuarios !";
        } else {
           echo "Error: ".$sql." ".mysqli_error($connect);
        }

        if (mysqli_query($connect, $sql4)) {
            echo "New record created successfully in pacientes !";
        } else {
           echo "Error: ".$sql." ".mysqli_error($connect);
        }

    }
    mysqli_close($connect);
?>