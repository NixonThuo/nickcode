<?php
//include connection
require '../database/database.php';
//check if already logged in move to home page
//if logged in redirect to members page
?>
<!doctype html>
<htmllang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kawa Self Help</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="font/css/font-awesome.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color:  #4885ed;
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: : 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-left links">
                <a href="#">
                    <?php 
                if( $user->is_logged_in() ):
                    echo $_SESSION["username"];
                elseif (!($user->is_logged_in()) ):
                endif;
                ?>
                </a>
                </div>
                <div class="top-right links">
                <?php 
                if( $user->is_logged_in() ):
                    echo '<a href="../member">Members</a>';
                    echo '<a href="../Savings">Savings</a>';
                    echo '<a href="../auth/logout.php">logout</a>';
                elseif (!($user->is_logged_in()) ):
                    echo '<a href="../auth/login.php">Login</a>';
                    echo '<a href="../auth/register.php">Register</a>';
                endif;
                ?>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    Kawa Self Help Group
                </div>

                <div class="links">
                    <a href="#">Loans</a>
                    <a href="#">Savings</a>
                    <a href="#">Contributions</a>
                    <a href="#">Projects</a>
                    <a href="#">Funds</a>
                </div>
            </div>
        </div>
    </body>
</html>
