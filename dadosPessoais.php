
<body>
    <h1>Dados Pessoais de Paciente  </h1>

    <form action="index.php?option=checkPersonalData" method="POST">
    
        <h2>Editar conta</h2>
        <hr>

       <label>Sexo:</label> <br>
       <input type = "radio" name = "sexo" value = "M"> Masculino
       <input type = "radio" name = "sexo" value = "F"> Feminino
       <br>

       <label>Morada:</label> <br>
       <input type = "text" name = "morada" > 
       <br>

       <label>Localidade:</label> <br>
       <input type = "text" name = "localidade"  > 
       <br>

       <label>Contacto:</label> <br>
       <input type = "text" name = "contacto"  > 
       <br>
       
       <label>Idade:</label>
       <input type = "text" name = "idade"  >  <br>

       <label>Email:</label> <br> 
       <input type="email" name="email" > <br>
       <label>NIF:</label> <br> 
       <input type="text" name="nif"> <br>
       <br>

       <label>Cartao Saude:</label> <br>
       <input type = "radio" name = "cartao" value = "S" checked> Sim
       <input type = "radio" name = "cartao" value = "N"> Não
        <br>
        <label>Alergias:</label> <br>
       <input type = "radio" name = "alergias" value = "S" > Sim
       <input type = "radio" name = "alergias" value = "N" checked> Não
        <br>
        

        <input type="submit">
    </form>

    

</body>
