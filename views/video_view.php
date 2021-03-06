<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Display contents</title>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" 
              type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <style type="text/css">
            a:hover{
                text-decoration: none;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            #container {
                margin-top: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            p {
                margin: 12px 15px 12px 15px;
            }

            i {
                cursor: pointer;
                text-decoration: none;
            }


            .thumbnail {
                padding:0px;
            }
            .panel {
                position:relative;
            }
            .panel>.panel-heading:after,.panel>.panel-heading:before{
                position:absolute;
                top:11px;left:-16px;
                right:100%;
                width:0;
                height:0;
                display:block;
                content:" ";
                border-color:transparent;
                border-style:solid solid outset;
                pointer-events:none;
            }
            .panel>.panel-heading:after{
                border-width:7px;
                border-right-color:#f7f7f7;
                margin-top:1px;
                margin-left:2px;
            }
            .panel>.panel-heading:before{
                border-right-color:#ddd;
                border-width:8px;
            }
        </style>
    </head>
    <body>
    <center>


        <?php
        if (isset($single_video) && is_array($single_video) && count($single_video)): $i = 1;
            foreach ($single_video as $key => $usersvideo) {
                ?>


                <div class="container" id="container">



                    <label ></label>

                    <div>

                        <iframe src="/ci3/images/<?php echo $usersvideo->video ?>"
                                width="560" height="315" frameborder="0" allowfullscreen>




                        </iframe>
                    </div>

                    </tr>
                    <div>
                        <tr> <label></label>
                        <?php echo $usersvideo->video_name; ?>

                        </tr>
                    </div>

                    <div>
                        <tr> <label>views :</label>
                        <?php echo $usersvideo->views; ?>
                    </div>




                    <a onclick="javascript:savelike(<?php echo $usersvideo->id; ?>);">
                        <i class="fa fa-thumbs-up"></i> 
                        <span id="like_<?php echo $usersvideo->id; ?>">
                            <?php
                            if ($usersvideo->likes > 0) {
                                echo $usersvideo->likes . ' Likes';
                            } else {
                                echo 'Likes';
                            }
                            ?>
                        </span></a>






                    <a onclick="javascript:saveunlike(<?php echo $usersvideo->id; ?>);">
                        <i class="fa fa-thumbs-down"></i> 
                        <span id="unlike_<?php echo $usersvideo->id; ?>">
                            <?php
                            if ($usersvideo->unlikes > 0) {
                                echo $usersvideo->unlikes . ' unLikes';
                            } else {
                                echo 'unLikes';
                            }
                            ?>
                        </span></a>
                    <p>


                        <?php
                        echo'<h1>comment</h1>';
                        if ($this->session->flashdata('errors')) {
                            echo $this->session->flashdata('errors');
                        }
                        echo '<div class="col-md-12 pull-left">';
                        ?>

                        <?php
                        echo '<div class="form_login">';
                        $data = array(
                            'class' => 'form-horizontal',
                            'method' => 'post'
                        );


                        echo form_open('show/comment_v', $data);



                        echo'<div class="form-group">';
                        $data = array(
                            'class' => 'form-control',
                            'type' => 'textarea',
                            'name' => 'comment',
                            'placeholder' => 'comment'
                        );



                        echo form_input($data);
                        echo'</div>';
                        echo'<div class="form-group">';
                        $data = array(
                            'class' => 'form-control',
                            'type' => 'hidden',
                            'name' => 'usersvideoid',
                            'value' => $usersvideo->id,
                        );



                        echo form_input($data);
                        echo'</div>';

                        echo'<div class="form-group">';
                        $data = array(
                            'class' => ' btn btn-primary',
                            'type' => 'submit',
                            'value' => 'comment'
                        );
                        echo form_input($data);
                        echo'</div>';






                        echo'</div>';
                        ?>


                    </p>

                    <p> 
                        <?php
                        if (isset($s_video) && is_array($s_video) && count($s_video)): $i = 1;
                            foreach ($s_video as $key => $usersvideocomment) {
                                ?>


 



                        </div>

                    </tr>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">

                            </div><!-- /col-sm-12 -->
                        </div><!-- /row -->
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="col-sm-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong></strong> <span class="text-muted"><?php echo $usersvideocomment->data; ?></span>
                                    </div>
                                    <div class="panel-body">

                                        <?php echo $usersvideocomment->comment; ?></div>
           

                                    <div class="col-sm-1">
                                        <div class="thumbnail">
                                            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                        </div><!-- /thumbnail -->
                                    </div><!-- /col-sm-1 -->



                                </div><!-- /container -->









                            <?php } endif; ?>

                        </p>

                    <?php } endif; ?>


                <script type="text/javascript">
                    function savelike(usersvideoid)
                    {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('show/savelikes'); ?>",
                            data: "usersvideoid=" + usersvideoid,
                            success: function (response) {
                                $("#like_" + usersvideoid).html(response + " Likes");

                            }
                        });
                    }
                </script>

                <script type="text/javascript">
                    function saveunlike(usersvideoid)
                    {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('show/saveunlikes'); ?>",
                            data: "usersvideoid=" + usersvideoid,
                            success: function (response) {
                                $("#unlike_" + usersvideoid).html(response + " unLikes");

                            }
                        });
                    }
                </script>



                </center>

                </body>
                </html>


   <!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="utf-8">
                            <title>youtube clone</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <meta name="description" content="">
                            <meta name="author" content="">

                            <!-- Le styles -->
                            <link href="../assets/css/bootstrap.css" rel="stylesheet">
                            <style>
                                body {
                                    padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
                                }
                            </style>
                            <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">


                           
                        </head>

                        <body>

                            <div class="navbar navbar-inverse navbar-fixed-top">
                                <div class="navbar-inner">
                                    <div class="container">
                                      
                                        </button>
                                        <a class="brand" href="/../ci4/index.php/home">HOME</a>

                                            </ul>
                                        </div><!--/.nav-collapse -->
                                    </div>
                                </div>
                            </div>

                            <div class="container">

                                <h1></h1>
                                <p></p>

                            </div> <!-- /container -->

                          
                        </body>
                    </html>


