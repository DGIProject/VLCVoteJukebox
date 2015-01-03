<?php

function addList($name,$time)
{
    global $bdd;
    $req =  $bdd->prepare("INSERT INTO lists(name,path) VALUES(?, ?)");
    if(!$req->execute(array($name, $time)))
    {
        return $req->errorInfo();
    }

    return true;
}