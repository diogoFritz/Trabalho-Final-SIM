<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Rave Party</title>

</head>
<body>

    <!--
    Criar 4 perfis: medico/admin/investigador/paciente
    evitar usar o GET, usar post 
    criar bem vindo para cada perfil
    -->

    <style>
        html{
            margin: 0;
            padding:0;
        }

        .inline {
            display: inline;
        }

        .link-button {
            background: none;
            border: none;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
            font-size: 1em;
            font-family: serif;
        }

        .link-button:focus {
         outline: none;
        }

        .link-button:active {
            color:red;
        }

    </style>
    <?php 
        session_start();
        
        if(isset($_SESSION['authuser']) == false ) {
            $_SESSION['authuser']=0;
           // $_SESSION['authuser'];
        }

        if(isset($_SESSION['perfil']) == false ) {
            $_SESSION['perfil']="Guest";
            $perfil = $_SESSION['perfil'];  
        }
        else {
            $perfil = $_SESSION['perfil'];
        }

        if(isset($_GET['option'])==false){
            //echo "option nao existe";
            $option = 'homepage';
        }
        else {
            //echo "option existe";
            $option = $_GET['option'];
            //echo $option;
        }
    ?>

    <table width=100%>
        <tr>
            <td><img src="assets\data.png" alt="logo"></td>
            <td> 
                <h1 style="text-align: center; font-family: Montserrat"><strong>Covid Cure Center</strong></h1>
            </td>
        </tr>

        <tr>
            <td style="border:2px solid grey;font-size: 1em;text-align: center;width: 30%;">
                <ul style="list-style-type: none;">
                    <?php
                    // Menu para 4 perfis
                    echo "<h3>Menu</h3>";
                    echo '<hr>';

                    echo  "<li><a href='index.php?option=homepage'>Homepage</a></li>";
                    

                    if( $_SESSION['perfil'] == 'Guest') {
                        echo  "<li><a href='index.php?option=signin'>Sign In</a></li>";
                        echo  "<li><a href='index.php?option=register'>Registar Utente</a></li>";
                        
                    }

                    if( $_SESSION['perfil'] == 'admin') {
                        echo  "<li><a href='index.php?option=tabela&page=1&pageSize=5'>Consultar Dados dos Utilizadores</a></li>";
                        echo  "<li><a href='index.php?option=registaUser'>Registar Novo Utilizador (Medico/Admins/Invest)</a></li>";  
                        //echo  "<li><a href='index.php?option=homepage'>Visualizar/Alterar ficha do Utilizador (Medico/Admin/Invest)</a></li>";
                        //echo  "<li><a href='index.php?option=homepage'>Ativar/Desativar Utilizadores</a></li>";
                        echo  "<li><a href='index.php?option=logoff'>Sair </a></li>";
                    }
                    if( $_SESSION['perfil'] == 'medico') {
                        
                        echo  "<li><a href='index.php?option=homepage'>Visualizar/Alterar ficha do Utente</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar ficha do Médico</a></li>";
                        
                        echo  "<li><a href='index.php?option=logoff'>Sair </a></li>";

                    }
                    if( $_SESSION['perfil'] == 'investigador') {
                        echo  "<li><a href='index.php?option=homepage'>Visualizar ficha do Investigador</a></li>";
                        echo  "<li><a href='index.php?option=data_analysis&page=1&pageSize=5'>Consultar Dados anónimos e/ou Gráficos</a></li>";
                        echo  "<li><a href='index.php?option=logoff'>Sair </a></li>";
                    }
                    if( $_SESSION['perfil'] == 'paciente') {
                        echo  "<li><a href='index.php?option=dadosPaciente'>Inserir/Alterar Dados Pessoais</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar ficha do Utente</a></li>";
                        echo  "<li><a href='index.php?option=logoff'>Sair </a></li>";
                        echo  "<li><a href='index.php?option=consulta'>Consulta Medica</a></li>";
                    }
  
                    ?>
                  </ul>
                
            </td>
            <td style="border:2px solid grey"> 
            <?php 
                // condicao do GET homepage or loginForm

                switch($option){
                    case 'homepage': include('homepage.php'); break;
                    case 'signin' : include('loginForm.php'); break;
                    case 'register': include('signForm.php'); break;
                    case 'tabela' : 
                        if($_SESSION['authuser'] == 1) {
                            echo "Welcome ".$_SESSION['username'];
                            if($_SESSION['username']== paciente) echo "Nao se esqueca que antes de fazer a consulta tera de inserir os seus dados pessoais";
                            include('tabela.php'); 
                        }
                        else {
                            echo "Não esta com sessão aberta";
                        }
                        break;
                    case 'checklogin' :   include('checklogin.php')   ; break;
                    case 'checkregister': include('checkRegister.php');break;
                    case 'checkPersonalData': include('checkPersonaldata.php'); break;
                    //PACIENTE MENU
                    case 'dadosPaciente' : include('dadosPessoais.php');break;
                    //ADMIN MENU
                    case 'registaUser' : include('userForm.php'); break;
                    case 'fichaUtente' : include('fichaUtente.php'); break;
                    case 'consulta'    : 
                        if($_SESSION['consulta'] == 1) {
                            echo "Welcome ".$_SESSION['username'];
                            include('medicalReport.php'); 
                        }
                        else {
                            echo "Nao se esqueca que antes de fazer a consulta tera de inserir os seus dados pessoais";
                        }
                        break;
                    case 'diagnostico' : include('diagnostico.php');break;
                    case 'data_analysis':include('data_analysis.php');break;
                    case 'logoff' :  echo "Terminar sessão..."; session_unset(); header("Refresh:0; url=index.php");break;
                }
            
            ?>
            
            </td>
        </tr>

        <tr  style="background-color: yellowgreen;font-size: 20px">
            <td  colspan="2" style="text-align: center;">SIM 2020/2021 - Diogo Freitas - Manuel Benzinho</td>
        </tr>

    </table>


</body>


</html>