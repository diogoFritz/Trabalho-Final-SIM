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

 
    
    -->

    <style>
        html{
            margin: 0;
            padding:0;
        }

    </style>
    <?php 
        session_start();
        
        if(isset($_SESSION['authuser']) == false ) {
            $_SESSION['authuser']=0;
           // $_SESSION['authuser'];
        }
        if(isset($_SESSION['perfil']) == false ) {
            $_SESSION['perfil']="admin";
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
                <h1 style="text-align: center; font-family: 'Brush Script MT', cursive"><strong>Covid Cure Center - CCC</strong></h1>
            </td>
        </tr>

        <tr>
            <td style="border:2px solid grey;font-size: 30px;text-align: center;width: 20%;">
                <ul style="list-style-type: none;">
                    <?php
                    // Menu para 4 perfis
                    echo "<h3>Menu $perfil</h3>";
                    echo '<hr>';

                    echo  "<li><a href='index.php?option=homepage'>Homepage</a></li>";
                    echo  "<li><a href='index.php?option=logoff'>Sair </a></li>";

                    if( $_SESSION['authuser'] == 1)
                        echo  "<li><a href='index.php?option=tabela&page=1&pageSize=10'>Tabelas</a></li>";
                    
                    if( $_SESSION['perfil'] == 'Guest') {
                        echo  "<li><a href='index.php?option=signin'>Sign In</a></li>";
                        echo  "<li><a href='index.php?option=register'>Registar Utente</a></li>";
                    }

                    if( $_SESSION['perfil'] == 'admin') {
                        echo  "<li><a href='index.php?option=homepage'>Consultar Dados dos Utilizadores (ID,nome,idade e Perfil)</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Registar Novo Utilizador (Medico/Admin/Invest)</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar/Alterar ficha do Utente</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar/Alterar ficha do Utilizador (Medico/Admin/Invest)</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Ativar/Desativar Utilizadores</a></li>";
                    }
                    if( $_SESSION['perfil'] == 'medico') {
                        echo  "<li><a href='index.php?option=homepage'>Consultar Dados dos Utilizadores (ID,nome,idade e Perfil)</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar/Alterar ficha do Utente</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar ficha do Médico</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Registo da consulta Médica</a></li>";

                    }
                    if( $_SESSION['perfil'] == 'investigador') {
                        echo  "<li><a href='index.php?option=homepage'>Visualizar ficha do Investigador</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Consultar Dados anónimos e/ou Gráficos</a></li>";
                    }
                    if( $_SESSION['perfil'] == 'utente') {
                        echo  "<li><a href='index.php?option=homepage'>Consulta Médica</a></li>";
                        echo  "<li><a href='index.php?option=homepage'>Visualizar ficha do Utente</a></li>";
                    }
  
                    ?>
                  </ul>
                
            </td>
            <td style="border:2px solid grey"> 
            <?php 
                // condicao do GET homepage or loginForm

                switch($option){
                    case 'homepage': include('homepage.html'); break;
                    case 'signin' : include('loginForm.php'); break;
                    case 'register': include('signForm.php'); break;
                    case 'tabela' : 
                        if($_SESSION['authuser'] == 1) {
                            echo "Welcome ".$_SESSION['username'];
                            include('tabela.php'); 
                        }
                        else {
                            echo "Não esta com sessão aberta";
                        }
                        break;
                    case 'checklogin' :   include('checklogin.php')   ; break;
                    case 'checkregister': include('checkRegister.php');break;
                    case 'logoff' :  echo "Terminar sessão..."; session_unset(); break;
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