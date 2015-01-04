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
function getNameList($id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT name FROM lists WHERE id =?");
    if (!$req->execute(array($id)))
    {
        print_r($req->errorInfo());
        exit(0);
    }
    $rep = $req->fetch();
    return $rep[0];
}

function getAlbums($listId)
{
    global $bdd;
    $req = $bdd->prepare("SELECT album, creator FROM tracks WHERE listId = ? GROUP BY album");
    if (!$req->execute(array($listId)))
    {
        print_r($req->errorInfo());
        exit(0);
    }
    $rep = $req->fetchAll();
    return $rep;
}

function getTracksByAlbum($listId, $album)
{
    global $bdd;
    $req = $bdd->prepare("SELECT title FROM tracks WHERE listId = ? AND album = ?");
    if (!$req->execute(array($listId, $album)))
    {
        print_r($req->errorInfo());
        exit(0);
    }
    $rep = $req->fetchAll();
    return $rep;
}


//print_r($data);
//exit(0);
