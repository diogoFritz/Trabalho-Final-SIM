
<body>
    <h1>Dados Pessoais de Paciente  </h1>

    <form action="index.php?option=checkPersonalData" method="POST">
    
        <h2>Editar conta</h2>
        <hr>
       <label>Nome:</label> <br>
       <input type = "text" name = "nome" value = "Artur Soares Dia" > 
       <br>

       <label>Sexo:</label> <br>
       <input type = "radio" name = "sexo" value = "M"> Masculino
       <input type = "radio" name = "sexo" value = "F"> Feminino
       <input type = "radio" name = "sexo" value = "N" checked=True> Outro
       <br>

       <label>Morada:</label> <br>
       <input type = "text" name = "morada" value = "Rua dos Pentasilgos" > 
       <br>

       <label>Localidade:</label> <br>
       <input type = "text" name = "localidade" value = "Lisboa" > 
       <br>

       <label>Contacto:</label> <br>
       <input type = "text" name = "contacto" value = "91789456" > 
       <br>
       
       <label>Idade:</label>
       <input type = "text" name = "idade" value = "45" >  <br>

       <label>Email:</label> <br> 
       <input type="email" name="email" value="arturSoares@gmail.com"> <br>
       <label>NIF:</label> <br> 
       <input type="text" name="nif" value="12005000647"> <br>
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
