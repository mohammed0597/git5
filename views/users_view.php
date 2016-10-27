
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

        <div class="users">
            <table class="users_table">

                <?php foreach ($users as $user): ?>
                    <tbody> 





                    <a> <?php echo $user->video_name ?> </a>
                    <id="video-gallery">


                        <p>

                            <a href="../show/show_v_id1/<?php echo $user->id ?>">
                                <video  src="/ci3/images/<?php echo $user->video
                    ?>"

                                        alt="Smiley face" height="150" width="150"/>



                        </p>
                        </tbody>

                    <?php endforeach; ?>




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



