
<?php

include_once("sql.php");
include_once("functionFileSend.php");
include_once("functionParse.php");

$time = time();

if (is_uploaded_file($_FILES['list']['tmp_name']) && isset($_POST['name']))
{
    echo 'success';
    if(move_uploaded_file($_FILES['list']['tmp_name'], "../data/".$time.'.lst'))
    {
        $id =  addList($_POST['name'], $time);
        $fileContent = file_get_contents("../data/$time.lst");

        $playlist = new SimpleXMLElement($fileContent);
        $tracklist = $playlist->trackList;

        $i = 0;
        foreach ($tracklist->track as $track)
        {
            echo "$track->title | $track->creator | $track->album <br>";
            addTrack($id,$track->title , $track->creator , $track->album);
        }


    }
}
else
{
    echo 'error2';
}

print_r($_POST);

