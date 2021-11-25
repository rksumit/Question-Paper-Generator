<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Topic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-style">
    <div class="container">
        <div class="navbar-header">
          <a href="">
            <img class="logo" src="img/logo.png" alt="">
           
        </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#micon">
                <span class="icon-bar">MENU</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        
        </div>
        <div class="collapse navbar-collapse" id="micon">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="home"> Home </a></li>
            <li><a href="AddQuestion"> Add Questions </a></li>
            <li><a href="AddSubject"> Add Subjects </a></li>
            <li><a href="AddTopic"> Add Topic </a></li>
            <li><a href="Subview"> View Subject Table </a></li>
            <li><a href="Qview"> View Question Table </a></li>
        </ul>
    </div>
    </div>
    <hr>
</nav>
  <div class="card bg-dark text-black">
    <img src="img/bg.png" alt="">
    <div class="card-img-overlay">
      <div class="col d-flex justify-content-center">
    <div class="card" style="width: 50rem;">
      
       
    <div class="card-header text-center">
      <h1>Add Subject Topic</h1>
    </div>
  
    <form class="form-horizontal">
      <div class="card">
      <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
                    <div class="form-group">
          <label class="control-label col-sm-2" for="topics"><b>Topic</b></label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="topics" required>
        </div>
        </div><br>
        <div class="form-group">
          <label class="control-label col-sm-3" for="Hours"><b>Hours Allocated</b></label>
          <div class="col-sm-5">
          <input type="number" step="0.1" class="form-control" id="Hours" required>
        </div>
        </div><br>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
       
      
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
</div>

      </form>
</body>
</html>