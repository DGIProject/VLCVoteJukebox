
<?php
// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
// doit être utilisée à la place de la variable $_FILES.



if (is_uploaded_file($_FILES['list']['tmp_name']))
{
    echo 'success';
    move_uploaded_file($_FILES['list']['tmp_name'], "../data/".$_FILES['list']['name']);
}
else
{
    echo 'error2';
}

print_r($_POST);

