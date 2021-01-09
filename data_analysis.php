
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
$sql3 = "SELECT * FROM pacientes WHERE (paciente_id >= $min and paciente_id <=$max)";
$result = mysqli_query($connect ,$sql3)
or die('The query failed: ' . mysqli_error($connect));

?>

<table class="tabela">
    <tr>
        <th>SEXO</th>
        <th>IDADE</th>
        <th>ALERGIAS</th>   
        <th>RESULTADO</th>  
    </tr>

    <?php
    while($row = mysqli_fetch_array($result)){
        
        echo "<tr>";
        echo "<td>".$row['sexo']."</td>";
        echo "<td>".$row['idade']."</td>";
        echo "<td>".$row['alergias']."</td>";
        
        if($row['resultado']== NULL) echo "<td>Sem avaliacao</td>";
        else echo "<td>".$row['resultado']."</td>";
        echo "</tr>";   
    }
    ?>
    
</table>

<a href="index.php?option=data_analysis&page=1&pageSize=5">1 - 10</a>
<a href="index.php?option=data_analysis&page=2&pageSize=5">11 - 20</a>
<a href="index.php?option=data_analysis&page=3&pageSize=5">21 - 30</a>
<a href="index.php?option=data_analysis&page=4&pageSize=5">31 - 40</a>
<a href="index.php?option=data_analysis&page=5&pageSize=5">41 - 50</a>

<?php
mysqli_close($connect);
?>

