<?php
$username = $_POST['username'];
$password = $_POST['password'];

//echo $username;
//echo $password;

$connect = mysqli_connect('localhost', 'root', '','covid')
or die('Error connecting to the server: ' . mysqli_error($connect));
$sql = 'SELECT * FROM usuarios WHERE (username = "'. $username .'" AND
password = "'. md5($password).'")';
$result = mysqli_query ($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));
$number = mysqli_num_rows($result); //if returns 1, then is a valid user

//$result2 = $connect -> query($sql);

// Associative array
$row = $result -> fetch_assoc();
//printf("%s , %s\n",$row['perfil'],$row['username']);


if($number) {
    $_SESSION['authuser']=1;
    $_SESSION['username']= $username;
    $_SESSION['nome']=$row['nome'];
    $_SESSION['perfil']= $row['perfil'];
    //$_SESSION['idade']=$row['idade'];
    $_SESSION['user_id']=$row['id'];
    
    echo "Autenticação correta.";
    header("Refresh:0; url=index.php");
}
else {
    $_SESSION['authuser']=0;
    echo "username ou pass esta errada!";
}

mysqli_close($connect);
?>