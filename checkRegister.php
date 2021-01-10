
<?php

    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $perfil = $_POST['perfil'];
    $image = $_FILES['image'];//['name'];
    
  
    // Dados do Paciente

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    //$sql = 'SELECT * FROM USERS WHERE (username = "'.$_POST['user'] .'"AND password = "'.md5($_POST['pass']).'")';
    $sql = 'SELECT * FROM usuarios WHERE USERNAME="'.$user.'"';
    $result = mysqli_query($connect ,$sql)
    or die('The query failed: ' . mysqli_error($connect));
    $resultados = mysqli_num_rows($result); // numero de resultados para optimizar numero de páginas
    //print_r($result);

 //inserir foto na base de dados metodo 1
    
    //$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    
    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    //$imageProperties = getimageSize($_FILES['image']['tmp_name']);
    //print(getImageType($image));
    //print($imgData);
    //print($imageProperties);

    if ($resultados)
        echo "Username ja existe. Tente Outra vez.";
    else {
        //echo "Criar Novo Utilizador";
        $sql = 'SELECT * FROM usuarios';
        $result = mysqli_query($connect ,$sql);
        $id = mysqli_num_rows($result);
        $id = $id+1;
        $sql = "INSERT INTO usuarios (ID,NOME,USERNAME,PASSWORD,PERFIL,FOTO) VALUES ('".$id."','".$name."','".$user."','".$pass."','".$perfil."','".$imgData."')";

        if (mysqli_query($connect, $sql)) {
            echo "New record created successfully in usuarios !";
        } else {
           echo "Error: ".$sql." ".mysqli_error($connect);
        }

    }
    
    mysqli_close($connect);


?>

