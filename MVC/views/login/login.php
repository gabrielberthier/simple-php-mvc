<!DOCTYPE html>
<?php 
use System\Session;
$session =  Session::getInstance();?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/header.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="\">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <?php if(session_status() == PHP_SESSION_NONE || (!isset($session->name))) :?>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link">Olá, visitante</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="\signin">Sign in</a>
        <a class="dropdown-item" href="\login">Log in</a>
      </div>
    </li>
  </ul>
    <?php elseif(session_status() == PHP_SESSION_ACTIVE && isset($session->name)): ?>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link">Olá, usuário</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo($session->name); ?></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="\dashboard">Dashboard</a>
        <a class="dropdown-item" href="\signin\logout">Log Out</a>
      </div>
    </li>
  </ul>
<?php endif; ?>
  </div>
</nav> 


<div class="container">
 <div id="loginbox" style="margin: 50px auto;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
   <div class="panel panel-info" >
      <div class="panel-heading">
         <div class="panel-title">Sign In</div>
         <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
      </div>
      <div style="padding-top:30px" class="panel-body" >
         <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
         <form id="loginform" class="form-horizontal" role="form" action="/login/getuser" method="post">
            <div style="margin-bottom: 25px" class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email" required autofocus>
            </div>
            <div style="margin-bottom: 25px" class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required autofocus>
            </div>
            <div class="input-group">
               <div class="checkbox">
                  <label>
                  <input id="login-remember" type="checkbox" name="remember" value="1" name="remember"> Remember me
                  </label>
               </div>
            </div>
            <div style="margin-top:10px" class="form-group">
               <!-- Button -->
               <div class="col-sm-12 controls">
                  <button id="btn-login" type="submit" class="btn btn-success">Login  </button>
                  <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-12 control">
                  <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                     Don't have an account! 
                     <a href="/signin" onClick="//$('#loginbox').hide(); $('#signupbox').show()">
                     Sign Up Here
                     </a>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
</div>

<?php include '/../footer.php' ?>