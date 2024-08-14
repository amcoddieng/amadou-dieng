<!DOCTYPE html>
<?php 
    session_start(); ?>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>connexion a SenJokko</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
.aa{
  margin-left: 46%;
}
img{
  height: 10%;
}
span{
  margin-left: 40px;
}
	</style>
</head>
<body style="background-image: url('img/xxx.png');background-size: contai;background-repeat: no-repeat;">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/aaa.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post" action="traitement.php" name="form">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
           <?php
             echo "<h6 style='color:red'>". @$_SESSION['connexion'].'</h>';

             session_destroy();
             ?>
          </div>
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Connexion</p>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Entrer votre email ou telephone" />
            <label class="form-label" for="form3Example3">Email ou telephone</label>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" name="mdp" class="form-control form-control-lg"
              placeholder="Entrer votre de passe" />
            <label class="form-label" for="form3Example4">Mot de passe</label>
            <a class="aa" href="#!" class="text-body">Forgot password ?</a>
          </div>
          
          <div class="text-center text-lg-start mt-4 pt-2">
            <input  type="submit" value="connexion" name="connexion" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
            <span class="small fw-bold mt-2 pt-1 mb-0">je n'ai pas de compte? <a href="inscription.php"
                class="link-danger">S'inscrire</a></span>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © JOKALANTE 2020. All rights reserved.
    </div>
   
  </div>
</section>
</body>
</html>                                       