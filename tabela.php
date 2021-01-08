
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
$max = $page*$pageSize;
$min = $max - ($pageSize - 1);

$connect = mysqli_connect('localhost', 'root', '','covid')
or die('Error connecting to the server: ' . mysqli_error($connect));
$sql = "SELECT user_id,USERNAME,PASSWORD FROM usuarios WHERE (user_id >= $min and user_id <=$max)";
$result = mysqli_query($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));
//$resultados = mysqli_num_rows($result); // numero de resultados para optimizar numero de páginas

?>

<table class="tabela">
    <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>PERFIL</th>
        
    </tr>
    <?php
   
    // echo"Page".$page;
    // echo "PageSize".$pageSize;
    //sample_table($page,$pageSize);

    // 1ºoption $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // 2ºoption while($row = $result -> fetch_assoc())

    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<th>".$row['user_id']."</th>";
        echo "<th>".$row['username']."</th>";
        echo "<th>".$row['perfil']."</th>";
        echo "</tr>";   
    }
    ?>
    
</table>


<a href="index.php?option=tabela&page=1&pageSize=10">1 - 10</a>
<a href="index.php?option=tabela&page=2&pageSize=10">11 - 20</a>
<a href="index.php?option=tabela&page=3&pageSize=10">21 - 30</a>
<a href="index.php?option=tabela&page=4&pageSize=10">31 - 40</a>
<a href="index.php?option=tabela&page=5&pageSize=10">41 - 50</a>
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