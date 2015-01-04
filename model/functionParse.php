<?php


function addTrack($listId, $title , $creator , $album)
{
    global $bdd;
    $req =  $bdd->prepare("INSERT INTO tracks(listId,title,creator, album) VALUES(?,?, ?, ?)");
    if(!$req->execute(array($listId,$title, $creator, $album)))
    {
        print_r( $req->errorInfo());
        exit(1);
    }

    return true;
}