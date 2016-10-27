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
        </style>
    </head>
    <body>

        <?php
        if (isset($single_video) && is_array($single_video) && count($single_video)): $i = 1;
            foreach ($single_video as $key => $usersvideo) {
                ?>

          <div class="container" id="container">
          <p>
                    <center>


                       

                        <div>

                            <video width="400" controls>
                                <source src="/ci3/images/<?php echo $usersvideo->video ?>">
                                <source src="mov_bbb.ogg" type="video/ogg">

                            </video>

                            <p>
                                
                                <a src="/ci3/images/<?php echo $usersvideo->video ?>" target="_blank"></a>.
                            </p>

                        </div>

                        </tr>
                        <div>
                            <tr> <label>Name :</label>
                            <?php echo $usersvideo->video_name; ?>

                            </tr>
                        </div>

                        <div>
                            <tr> <label>views :</label>
                            <?php echo $usersvideo->views; ?>
                        </div>

                        <a href='http://[::1]/ci4/index.php/show/delete_video/<?php echo $usersvideo->id ?>'>delete</a>


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

                    </center>
    </p>
    
     <a href='http://[::1]/ci4/index.php/show/show_v_id1/<?php echo $usersvideo->id ?>'>open video page</a>
    
    
    
</div>
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







                            </body>
                            </html>

