<?php
namespace MonBlog;
use \MonBlog\Framework\Routeur;
require('Autoloader.php');
Autoloader::register();
$Routeur = new Routeur();
$Routeur->routerRequete();








/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 10/04/2017
 * Time: 20:29
 */