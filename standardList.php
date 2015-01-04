<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h3><?php echo $nameList ?></h3>
                <div class="btn-group" role="group" aria-label="...">
                    <a href="getList.php?listId=<?php echo $_GET['listId'] ?>&view=2" class="btn btn-default">Album</a>
                    <a href="getList.php?listId=<?php echo $_GET['listId'] ?>&view=1" class="btn btn-default active">Standard</a>
                </div>
                <a href="startVote.php?listId=<?php echo $_GET['listId'] ?>" class="btn btn-primary btn-lg active">Lancer un vote</a>

                <br/><br/><br/>
                <div class="panel-group" id="accordionArtist" role="tablist" aria-multiselectable="true">
                    <?php
                    $i = 0;
                    foreach($data as $d)
                    {
                        $albums = getAlbum($_GET['listId'], $d['creator']);

                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="hedArtist<?php echo $i ?>">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordionArtist" href="#collapseArtist<?php echo $i ?>" aria-expanded="true" aria-controls="collapseArtist<?php echo $i ?>">
                                        <?php echo $d['creator'] ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseArtist<?php echo $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="hedArtist<?php echo $i ?>">
                                <div class="panel-body">

                                    <div class="panel-group" id="accAlbum<?php echo $i ?>" role="tablist" aria-multiselectable="true">
                                        <?php
                                        $y=0;
                                        foreach($albums as $a)
                                        {
                                            $tracks = getTracks($_GET['listId'], $a['album'], $d['creator'])

                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headAlbum<?php echo $i ?>">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accAlbum<?php echo $i ?>" href="#collapseAlbum<?php echo $i ?>-<?php echo $y ?>" aria-expanded="true" aria-controls="collapseAlbum<?php echo $i ?>-<?php echo $y ?>">
                                                            <?php echo $a['album'] ?>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseAlbum<?php echo $i ?>-<?php echo $y ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headAlbum<?php echo $i ?>">
                                                    <div class="panel-body">
                                                        <ul class="list-group">

                                                            <?php

                                                            foreach ($tracks as $t)
                                                            {
                                                                echo "<li class=\"list-group-item\">".$t['title']."</li>";
                                                            }

                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $y++;
                                        } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }

                    ?>
                </div>

            </div></div>
    </div>
</div><!-- /.container -->
</body>
</html>