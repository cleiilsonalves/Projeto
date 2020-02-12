<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 30/01/2017
 * Time: 15:43
 */
require ('config.php');
session_start();
unset($_SESSION ["nomeCompleto"]);
unset($_SESSION ["tipoAcesso"]);
unset($_SESSION ["master"]);
unset($_SESSION ["codigo"]);
unset($_SESSION ["empresa"]);
unset($_SESSION ["clientes"]);
//echo 'ola'. $_SESSION ["nomeCompleto"];
require 'login.php';
