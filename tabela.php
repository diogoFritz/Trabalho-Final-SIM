
<style>
.tabela{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
.tabela tr:nth-child(even) {
        background-color: #dddddd;
}
</style>

<?php
$page = $_GET['page'];
$pageSize = $_GET['pageSize'];
$max = $page*$pageSize ;
$min = $max - ($pageSize - 1);

$connect = mysqli_connect('localhost', 'root', '','covid')
or die('Error connecting to the server: ' . mysqli_error($connect));


//$sql2 = "SELECT usuarios.user_id as id, pacientes.user_id as pacient_id, nome , idade , perfil FROM usuarios left join pacientes on usuarios.user_id = pacientes.user_id" ;
$sql = "SELECT * FROM usuarios WHERE (id >= $min and id <=$max)";
$result = mysqli_query($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));
//$resultados = mysqli_num_rows($result); // numero de resultados para optimizar numero de páginas

?>

<table class="tabela">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Username</th>
        <th>Perfil</th>
        <th>Data de criação</th>
        
    </tr>
    <?php
    // 1ºoption $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // 2ºoption while($row = $result -> fetch_assoc())
    while($row = mysqli_fetch_array($result)){
        
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['perfil']."</td>";
        echo "<td>".$row['creation_date']."</td>";
        echo "</tr>";   
    }
    ?>
    
</table>

<a href="index.php?option=tabela&page=1&pageSize=5">1 - 10</a>
<a href="index.php?option=tabela&page=2&pageSize=5">11 - 20</a>
<a href="index.php?option=tabela&page=3&pageSize=5">21 - 30</a>
<a href="index.php?option=tabela&page=4&pageSize=5">31 - 40</a>
<a href="index.php?option=tabela&page=5&pageSize=5">41 - 50</a>

<?php
mysqli_close($connect);
//page_sampler($page,$pageSize,$resultados);
?>

<?php
function sample_table($page,$pageSize) {
    $max = $page*$pageSize;
    $min = $max - ($pageSize - 1);
    for ($i = $min; $i < $max; $i++){       
            echo "<tr>";
            echo "<th>".$i."</th>";
            echo "<th>"."Nome".$i."</th>";
            echo "</tr>";
    }
}


function page_sampler($page,$pageSize,$resultados) {
    $max = $page*$pageSize;
    $min = $max - ($pageSize - 1);
    
    for ($i = $min; $i < $resultados; $i++){       
        
            echo '<a href="index.php?option=tabela&page='.$page.'&pageSize='.$pageSize.'">'.$min.' - '.$max.'</a>';
            
    }
}
?>