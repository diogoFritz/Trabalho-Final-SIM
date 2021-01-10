
<body>
        
        <?php
        $user_id=$_SESSION['user_id'];
        $connect = mysqli_connect('localhost', 'root', '','covid')
        or die('Error connecting to the server: ' . mysqli_error($connect));
        $sql3 = "SELECT * FROM pacientes WHERE user_id='$user_id'";
        $result = mysqli_query($connect ,$sql3)
        or die('The query failed: ' . mysqli_error($connect));
        $aux=0;
        while ($row= mysqli_fetch_array($result)) 
        { 
            $aux=$aux+1;
            
        } 

        if($aux==0) header("Refresh:0; url=index.php");
        ?>
        
        <h1>Formulário Médico</h1>
        <form action="index.php?option=diagnostico" method="POST">
            
            <?php

            echo "<h2>Ola " .$_SESSION['nome']."! Bem vindo à consulta que lhe irá informar qual o seu grau de risco de ter COVID</h2>";
            echo "<h3>Terá de selecionar as seguintes opções para que o nosso classificador dar o resultado (selecionar em caso afirmativo)</h3>";
            ?>
            <input type='hidden' value='0' name='symptoms_progressed'>
            <input type='hidden' value='0' name='travel_history'>
            <input type='hidden' value='0' name='drowsiness'>
            <input type='hidden' value='35' name='body_temperature'>
            <input type='hidden' value='0' name='dry_cough'>
            <input type='hidden' value='0' name='chest_pain'>
            <input type='hidden' value='0' name='stroke'>
            <input type='hidden' value='0' name='diabetes'>
            
            <input type="checkbox" name="symptoms_progressed" value=1 > - Os seus sintomas progrediram?
            <br>
            <input type="checkbox" name="travel_history" value=1> - Viajou para algum país infetado?
            <br>
            <input type="checkbox" name="drowsiness" value=1> - Tem tido sonolência?
            <br>
            <input type="checkbox" name="dry_cough" value=1> - Tem tosse seca?
            <br>
            <input type="checkbox" name="chest_pain" value=1> - Tem dor no peito?
            <br>
            <input type="checkbox" name="stroke" value=1> - Já teve algum AVC ?
            <br>
            <input type="checkbox" name="diabetes" value=1> - Tem diabetes?
            <br>
            <input type="number"  name="body_temperature" min="30" max="50" value="30"> - Qual a sua temperatura corporal?
            <br>
            <br>
            <input type="submit">
        </form>
</body>