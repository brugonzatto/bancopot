<?php
session_start();
// Verifica se existe os dados da sessao de login
if (!isset($_SESSION["id"]) || !isset($_SESSION["nome"])) {
    // Usuario nao logado! Redireciona para a pagina de login
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ./index.php'>";
    exit;
}