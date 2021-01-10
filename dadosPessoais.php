
<body>
    <h1>Dados Pessoais de Paciente  </h1>

    <form action="index.php?option=checkPersonalData" method="POST">
    
        <h2>Editar conta</h2>
        <hr>

       <label>Sexo:</label> <br>
       <input type = "radio" name = "sexo" value = "M"required> Masculino
       <input type = "radio" name = "sexo" value = "F"required> Feminino
       <br>

       <label>Morada:</label> <br>
       <input type = "text" name = "morada" required> 
       <br>

       <label>Localidade:</label> <br>
       <input type = "text" name = "localidade"  required> 
       <br>

       <label>Contacto:</label> <br>
       <input type = "text" name = "contacto" maxlength="9" required> 
       <br>
       
       <label>Idade:</label><br>
       <input type = "text" name = "idade"  required> 

       <br>

       <label>Email:</label> <br> 
       <input type="email" name="email" required> <br>
       <label>NIF:</label> <br> 
       <input type="text" name="nif"required> <br>
       <br>

       <label>Cartao Saude:</label> <br>
       <input type = "radio" name = "cartao" value = "S" required> Sim
       <input type = "radio" name = "cartao" value = "N" required> Não
        <br>
        <label>Alergias:</label> <br>
       <input type = "radio" name = "alergias" value = "S" required> Sim
       <input type = "radio" name = "alergias" value = "N" required> Não
        <br>

        <?php
            $connect = mysqli_connect('localhost', 'root', '','covid')
            or die('Error connecting to the server: ' . mysqli_error($connect));
            $sql3 = "SELECT * FROM medicos ";
            $result = mysqli_query($connect ,$sql3)
            or die('The query failed: ' . mysqli_error($connect));
            echo "<br>Escolha o medico que pretende que lhe siga.<br>";
            echo "<input list='doctors' name='medicos'>";
            echo "<datalist id='doctors' >";
            while($row = mysqli_fetch_array($result)){
                $dr=$row['nome'];
                echo "<option value='$dr'>" ;
            }
            echo"</datalist>";
            
            

        ?>        

        <input type="submit">
    </form>

    

</body>
