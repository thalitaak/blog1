<?php
session_start(); // inicia/retoma sessao
if (!isset($_SESSION['iduser'])) { // verifica se a sessao iduser esta definida
  header("Location: /blog/admin_login.php"); // se nao tiver, direciona para o login
}
?>