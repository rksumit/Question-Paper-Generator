<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <title>Question Paper Generator</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> --}}



<style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-10px;
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
                    <a href="{{ route('home') }}">
                        <img class="logo" src="{{ asset('img/logo.png') }}" >

                    </a>

                </div>
                <div class="collapse navbar-collapse" id="micon">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home"> Home </a></li>
                    <li><a href="{{ route('questions.index') }}"> Questions </a></li>
                    <li><a href="AddSubject"> Add Subjects </a></li>
                    <li><a href="AddTopic"> Add Topic </a></li>
                    <li><a href="Subview"> View Subject Table </a></li>
                    <li><a href="Qview"> View Question Table </a></li>
                </ul>
            </div>
            </div>
            <hr>
        </nav>

        <hr>
    </header>

    <div class="container">
        @yield('content')
    </div>



</body>
</html>
