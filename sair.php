<?php
   //finalizar sessão
    //session_destroy();
 
    //Limpar dados
    unset ($_SESSION['codigoUsuario']);
    unset ($_SESSION['senhaUsuario']);
 
    //Redireciona para a página de autenticação
    header('location:index.php');
?>