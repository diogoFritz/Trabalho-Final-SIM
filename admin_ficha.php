
<body>
    <h1>Administração -  Criar Conta Utilizador</h1>
    <hr>
    <form action="index.php?option=checkUserAdmin" method="POST">
        <label>Tipo de Perfil</label>
        <input type = "radio" name = "perfil" value = "admin" > Admininistrador
        <input type = "radio" name = "perfil" value = "medico"> Médico
        <input type = "radio" name = "perfil" value = "investigador" > Investigador
        <br>
        <label>Username:</label> <br> <input type = 'text' name = 'username'> <br>
        <label>Nome:</label> <br> <input type = 'text' name = 'nome'> <br>
        <label>Passsword:</label> <br> <input type = 'password' name = 'password'> <br>
        <label>Morada:</label> <br> <input type = 'text' name = 'morada' >  <br>
        <label>Contacto:</label> <br><input type = 'text' name = 'contacto' > <br>
        <label>Email</label> <br> <input type = 'text' name = 'email' > <br>
        <input type = 'submit' >
        </form>

        

</body>
