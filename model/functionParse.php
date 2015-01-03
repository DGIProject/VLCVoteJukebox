<?php


function addTrack($title , $creator , $album)
{
    global $bdd;
    $req =  $bdd->prepare("INSERT INTO tracks(title,creator, album) VALUES(?, ?, ?)");
    if(!$req->execute(array($title, $creator, $album)))
    {
        print_r( $req->errorInfo());
        exit(1);
    }

    return true;
}