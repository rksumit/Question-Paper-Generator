<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Question Paper Generator</title>
    <link rel="stylesheet" type="text/css" href="/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            margin-left: -5px;
            margin-right: -5px;
        }

        .column {
            float: left;
            width: 50%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

    </style>

</head>


<body>
    <header class="header">
        <nav class="navbar navbar-style">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#micon">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="">
                        <img class="logo" src="img/logo.png" src="home">

                    </a>

                </div>
                <div class="collapse navbar-collapse" id="micon">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home"> Home </a></li>
                        <li><a href="AddQuestion"> Questions </a></li>
                        <li><a href="AddSubject"> Add Subjects </a></li>
                        <li><a href="AddTopic"> Add Topic </a></li>
                        <li><a href="Subview"> View Subject Table </a></li>
                        <li><a href="Qview"> View Question Table </a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="arkofont">Question Paper </h1>
                    <p class="big-text">Generator</p>

                </div>

                <div class="col-sm-6">
                    <img src="img/questions.jpg" class="img-responsive">
                </div>

            </div>

        </div>
        <hr>
    </header>





</body>

</html>
