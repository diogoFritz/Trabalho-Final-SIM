
<?php

    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $perfil = $_POST['perfil'];
   
    
  
    // Dados do Paciente

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    //$sql = 'SELECT * FROM USERS WHERE (username = "'.$_POST['user'] .'"AND password = "'.md5($_POST['pass']).'")';
    $sql = 'SELECT * FROM usuarios WHERE USERNAME="'.$user.'"';
    $result = mysqli_query($connect ,$sql)
    or die('The query failed: ' . mysqli_error($connect));
    $resultados = mysqli_num_rows($result); // numero de resultados para optimizar numero de páginas
    //print_r($result);
/*
    //inserir imagem na base de dados
      $imagename=$_FILES["myimage"]["name"]; 
      //Get the content of the image and then add slashes to it 
      $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
      //Insert the image name and image content in image_table
      $sql2="INSERT INTO usuarios (foto) VALUES($imagename)";
      mysqli_query($connect,$sql2);
*/
   
    if ($resultados)
        echo "Username ja existe. Tente Outra vez.";
    else {
        //echo "Criar Novo Utilizador";
        $sql = 'SELECT * FROM usuarios';
        $result = mysqli_query($connect ,$sql);
        $id = mysqli_num_rows($result);
        $id = $id+1;
        $sql = "INSERT INTO usuarios (ID,NOME,USERNAME,PASSWORD,PERFIL) VALUES ('".$id."','".$name."','".$user."','".$pass."','".$perfil."')";

        if (mysqli_query($connect, $sql)) {
            echo "Conta criada com sucesso!";
        } else {
           echo "Error: ".$sql." ".mysqli_error($connect);
        }

    }
    mysqli_close($connect);
?>