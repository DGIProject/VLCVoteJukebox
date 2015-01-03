
<?php

include_once("sql.php");
include_once("functionFileSend.php");

$time = time();

if (is_uploaded_file($_FILES['list']['tmp_name']) && isset($_POST['name']))
{
    echo 'success';
    if(move_uploaded_file($_FILES['list']['tmp_name'], "../data/".$time.'.lst'))
    {
        addList($_POST['name'], $time);
    }
}
else
{
    echo 'error2';
}

print_r($_POST);

