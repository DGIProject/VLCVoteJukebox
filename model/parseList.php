<!DOCTYPE html>
<meta charset="utf-8"/>
<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 03/01/2015
 * Time: 23:03
 */

include_once("sql.php");
include_once("functionParse.php");

$fileContent = file_get_contents("../data/1420324139.lst");

$playlist = new SimpleXMLElement($fileContent);
$tracklist = $playlist->trackList;

$i = 0;
foreach ($tracklist->track as $track)
{
    echo "$track->title | $track->creator | $track->album <br>";
    addTrack($track->title , $track->creator , $track->album);
}
