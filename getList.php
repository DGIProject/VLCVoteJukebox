<?php
include_once("model/getTracks.php");


$nameList = getNameList($_GET['listId']);

if (isset($_GET['view']) && $_GET['view'] == 2) // album view
{
    $data = getAlbums($_GET['listId']);
    include_once("AlbumList.php");
}
else //standard View
{
    $data = getData($_GET['listId']);
    include_once("standardList.php");
}
