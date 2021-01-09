
<body>
    <h1>Administração  </h1>
    
    <h2>Criar Conta</h2>
    <hr>
    <form action="index.php?option=registaUser" method="POST">
        <label>Tipo de Perfil:</label> <br>
        
        <input type = "radio" name = "profile" value = "admin"> Administrador
        <input type = "radio" name = "profile" value = "investigator" > Analista de dados
        <input type = "radio" name = "profile" value = "medic" > Médico
        <input type = "submit" >

        <br>
       <label>Nome:</label> <br>
       <input type = "text" name = "name" value = "Artur Soares Dia" > 
       <br>
       <label>Username:</label> <br>
       <input type = "text" name = "username" value = "thebest" > 
       <br>
       <label>Passsword:</label> <br>
       <input type = "password" name = "password" value = "12345" > 
       <br>
       <label>Morada:</label> <br>
       <input type = "text" name = "address" > 
       <br>
       <label>Contacto:</label> <br>
       <input type = "text" name = "phone" > 
       <br>
       <label>Imagem:</label> <br> 
       <input type="file" id="image" name="photo" value="C:\wamp64\www\COVID\avatar.png"> <br>

       <h3>Dados Pessoais Este vai para pacientes</h3>
       <label>Idade:</label>
       <input type = "text" name = "age" >  <br>

       <label>Sexo:</label> <br>
       <input type = "radio" name = "sex" value = "male"> Masculino
       <input type = "radio" name = "sex" value = "female"> Feminino
       <input type = "radio" name = "sex" value = "other" checked=True> Outro
       <br>
       <label>Email:</label> <br> 
       <input type="email" name="email" > <br>
       <label>NIF:</label> <br> 
       <input type="text" name="nif"> <br>
       
       <br>
        
        <input type="submit">
    </form>

    <h2>Alterar Conta</h2>
    <hr>
    
    <form>
        <label>Qual é o a username que pretende alterar?</label>
        <input type="text" name=username>
        <input type=submit> 
    </form>

    <h2>Remover Conta</h2>
    <hr>
    <form>
        <label>Qual é o a username que pretende eliminar?</label>
        <input type="text" name=username>
        <input type=submit> 
    </form>

</body>
