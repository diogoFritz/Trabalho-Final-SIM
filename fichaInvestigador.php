<?php
    
    $user_id=$_SESSION['user_id'];
    $nome = $_SESSION['nome'];
    $username = $_SESSION['username'];

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql = 'SELECT * FROM investigadores WHERE (user_id = "'. $user_id .'")';
    $result = mysqli_query ($connect ,$sql)
    or die('The query failed: ' . mysqli_error($connect));
    $number = mysqli_num_rows($result); //if returns 1, then is a valid user

    

    $row = $result -> fetch_assoc();
    $email =$row['email'];
    $morada =$row['morada'];
    $contacto=$row['contacto'];

    //echo "<tr>";
    echo "<center><h1>Ficha do Investigador</h1></center>";
    echo "<center><b>Nome:</b> $nome </center><br><br>" ;
    echo "<center><b>Username:</b> $username </center><br><br>" ;
    echo "<center><b>Email:</b> $email</center><br><br>";
    echo "<center><b>Morada:</b> $morada</center><br><br>";
    echo "<center><b>Contacto:</b> $contacto </center><br><br>";
   
    mysqli_close($connect);
?>