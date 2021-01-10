<?php
    
    $user_id=$_SESSION['user_id'];
    $nome = $_SESSION['nome'];
    $username = $_SESSION['username'];

    $connect = mysqli_connect('localhost', 'root', '','covid')
    or die('Error connecting to the server: ' . mysqli_error($connect));
    $sql = 'SELECT * FROM pacientes WHERE (user_id = "'. $user_id .'")';
    $result = mysqli_query ($connect ,$sql)
    or die('The query failed: ' . mysqli_error($connect));
    $number = mysqli_num_rows($result); //if returns 1, then is a valid user

     

    $row = $result -> fetch_assoc();



    if($number) {   
        //echo "<tr>";
        echo "<center><h1>Ficha de Paciente</h1></center>";
        echo "<center><b>Nome:</b> $nome </center><br><br>" ;
        echo "<center><b>Username:</b> $username </center><br><br>" ;
        echo "<center><b>Email:</b> ".$row['email']."</center><br><br>";
        echo "<center><b>Sexo:</b> ".$row['sexo']."</center><br><br>";
        echo "<center><b>Idade:</b> ".$row['idade']."</center><br><br>";
        echo "<center><b>Morada:</b> ".$row['morada']."</center><br><br>";
        echo "<center><b>Localidade:</b> ".$row['localidade']."</center><br><br>";
        echo "<center><b>Contacto:</b> ".$row['contacto']."</center><br><br>";
        echo "<center><b>NIF:</b> ".$row['NIF']."</center><br><br>";
        if($row['cartao_saude']== "S") echo "<center><b>Cartao de Saude:</b> Sim</center><br><br>";
        else echo "<center><b>Cartao de Saude:</b> Nao</center><br><br>";
        if($row['alergias']== "S") echo "<center><b>Alergias:</b> Sim</center><br><br>";
        else echo "<center><b>Alergias:</b> Nao</center><br><br>";
        
        
    }
    else {
        echo "Tem de Inserir os seus Dados Pessoais primeiro!";
    }

    

    mysqli_close($connect);
?>