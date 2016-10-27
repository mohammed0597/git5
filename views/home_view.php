<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>login application</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    </head>
    <body>


        <div class="content">
            <div class="container">
                <div class="row">


                    <?php
                    if ($this->session->flashdata('login_succed')) {
                        echo $this->session->flashdata('succed');
                    }
                    ?>

                    <?php
                    if ($this->session->flashdata('register_succed')) {
                        echo $this->session->flashdata('register_succed');
                    }
                    ?>
                    <?php
                    $this->load->view($content);
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>youtube</title>
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
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="/../ci4/index.php/home">HOME</a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="/../ci4/index.php/user/login">login</a></li>
                            <li><a href="/../ci4/index.php/user/register">sign up</a></li>
                            <li><a href="/../ci4/index.php/video/upload">upload videos</a></li>
                            <li><a href="/../ci4/index.php/user/index"> videos</a></li>
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
