<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 03/01/2015
 * Time: 22:39
 */
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=guillaume' , 'guillaume' , 'villenag');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
