


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
    $low=0;
    $medium=0;
    $high=0;
    $semAv=0;
    
    while($row = mysqli_fetch_array($result)){
        
        echo "<tr>";
        echo "<td>".$row['sexo']."</td>";
        echo "<td>".$row['idade']."</td>";
        echo "<td>".$row['alergias']."</td>";
        
        if($row['resultado']== NULL)echo "<td>Sem avaliacao</td>";
        else echo "<td>".$row['resultado']."</td>";
        echo "</tr>";   
    }
    ?>
    
</table>

<a href="index.php?option=data_analysis&page=1&pageSize=10">1 - 10</a>
<a href="index.php?option=data_analysis&page=2&pageSize=10">11 - 20</a>
<a href="index.php?option=data_analysis&page=3&pageSize=10">21 - 30</a>
<a href="index.php?option=data_analysis&page=4&pageSize=10">31 - 40</a>
<a href="index.php?option=data_analysis&page=5&pageSize=10">41 - 50</a>
<br>
<br>
<hr>

<center><h1>Estatisticas</h1></center>
<?php
$sql = "SELECT * FROM pacientes";
$result = mysqli_query($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));

    while ($row= mysqli_fetch_array($result)) 
    { 
        if($row['resultado']==NULL) $semAv=$semAv+1;
        else if($row['resultado']==0) $low=$low+1;
        else if($row['resultado']==1) $medium=$medium+1;
        else if($row['resultado']==2) $high=$high+1;   
    } 

echo "<b><u>General</u></b><br>";    
echo "<br><b>Nº de High Risk:</b> $high<br>";
echo "<b>Nº de Medium Risk:</b>$medium<br>";
echo "<b>Nº de Low Risk:</b>$low<br>";
echo "<b>Nº de Pacientes sem avaliacao:</b>$semAv<br>";
$total=$high+$medium+$low+$semAv;
echo "<b>Num total de $total pacientes</b>";
echo "<br><br><br>";
$low=0;
$medium=0;
$high=0;
$semAv=0;
$sql = "SELECT * FROM pacientes";
$result = mysqli_query($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));

while ($row= mysqli_fetch_array($result)) 
    { 
        if($row['sexo']=="F"){
            if($row['resultado']==NULL) $semAv=$semAv+1;
            else if($row['resultado']==0) $low=$low+1;
            else if($row['resultado']==1) $medium=$medium+1;
            else if($row['resultado']==2) $high=$high+1;    
        }   
    } 

echo "<b><u>Female</u></b><br>";
echo "<br><b>Nº de High Risk:</b> $high<br>";
echo "<b>Nº de Medium Risk:</b>$medium<br>";
echo "<b>Nº de Low Risk:</b>$low<br>";
echo "<b>Nº de Pacientes sem avaliacao:</b>$semAv<br>";
$total=$high+$medium+$low+$semAv;
echo "<b>Num total de $total mulheres</b>";
echo "<br><br>";

$low=0;
$medium=0;
$high=0;
$semAv=0;
$sql = "SELECT * FROM pacientes";
$result = mysqli_query($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));
while ($row= mysqli_fetch_array($result)) 
    { 
        if($row['sexo']=="M"){
            if($row['resultado']==NULL) $semAv=$semAv+1;
            else if($row['resultado']==0) $low=$low+1;
            else if($row['resultado']==1) $medium=$medium+1;
            else if($row['resultado']==2) $high=$high+1;    
        }   
    } 

echo "<b><u>Male</u></b><br>";
echo "<br><b>Nº de High Risk:</b> $high<br>";
echo "<b>Nº de Medium Risk:</b>$medium<br>";
echo "<b>Nº de Low Risk:</b>$low<br>";
echo "<b>Nº de Pacientes sem avaliacao:</b>$semAv<br>";
$total=$high+$medium+$low+$semAv;
echo "<b>Num total de $total homens</b>";
?>
<?php
mysqli_close($connect);
?>

