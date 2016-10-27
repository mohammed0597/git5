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

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
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
                    <a class="brand" href="home">youtube</a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="user/login">login</a></li>
     
   
                            <li><a href="user/register">sign up</a></li>
                            <li><a href="video/upload">upload videos</a></li>
                            <li><a href="user/index"> videos</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">


            <h1></h1>
            <p></p>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap-transition.js"></script>
        <script src="../assets/js/bootstrap-alert.js"></script>
        <script src="../assets/js/bootstrap-modal.js"></script>
        <script src="../assets/js/bootstrap-dropdown.js"></script>
        <script src="../assets/js/bootstrap-scrollspy.js"></script>
        <script src="../assets/js/bootstrap-tab.js"></script>
        <script src="../assets/js/bootstrap-tooltip.js"></script>
        <script src="../assets/js/bootstrap-popover.js"></script>
        <script src="../assets/js/bootstrap-button.js"></script>
        <script src="../assets/js/bootstrap-collapse.js"></script>
        <script src="../assets/js/bootstrap-carousel.js"></script>
        <script src="../assets/js/bootstrap-typeahead.js"></script>

    </body>
</html>
