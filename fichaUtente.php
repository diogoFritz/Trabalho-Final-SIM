<?php
    $user = $_SESSION['username'];

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql = 'SELECT * FROM usuarios inner join pacientes on usuarios.user_id = pacientes.user_id ' ;
    $sql2 = 'SELECT * FROM usuarios inner join pacientes on usuarios.user_id = pacientes.user_id where USERNAME="'.$user.'"' ;
    $result = mysqli_query($connect ,$sql)
    or die('The query failed: ' . mysqli_error($connect));
    $resultados = mysqli_num_rows($result); // numero de resultados para optimizar numero de páginas
    //print_r($result);

    print($result);
    if ($resultados)
        echo "Username ja existe. Tente Outra vez.";
    else {
        
        print($result);
    }
    mysqli_close($connect);
?>