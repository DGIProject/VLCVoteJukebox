<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 03/01/2015
 * Time: 23:50
 */
include_once("model/sql.php");

function getData($listId)
{
    global $bdd;
    $req = $bdd->prepare("SELECT creator FROM tracks WHERE listId = ? GROUP BY creator ");
    if (!$req->execute(array($listId)))
    {
        print_r($req->errorInfo());
        exit(0);
    }
    $rep = $req->fetchAll();
    return $rep;
}

function getAlbum($listId, $creator)
{
    global $bdd;
    $req = $bdd->prepare("SELECT album FROM tracks WHERE listId = ? AND creator = ? GROUP BY album");
    if (!$req->execute(array($listId, $creator)))
    {
        print_r($req->errorInfo());
        exit(0);
    }
    $rep = $req->fetchAll();
    return $rep;
}


function getTracks($listId, $album, $creator)
{
    global $bdd;
    $req = $bdd->prepare("SELECT title FROM tracks WHERE listId = ? AND album = ? AND creator =?");
    if (!$req->execute(array($listId, $album, $creator)))
    {
        print_r($req->errorInfo());
        exit(0);
    }
    $rep = $req->fetchAll();
    return $rep;
}
$data = getData($_GET['listId']);

//print_r($data);
//exit(0);
