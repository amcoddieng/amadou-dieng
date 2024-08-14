<!DOCTYPE html>
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
div,label{
  margin-top: -10px;
}
span{
  margin-left: 60px;
}


  </style>
</head>
<body style="background-image: url('img/xxx.png');background-repeat: no-repeat;background-size: contai">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/aaa.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post" name="form" action="traitement.php" enctype="multipart/form-data">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
           
          </div>

          <div class="divider d-flex align-items-center my-4">
            <span class="text-center fw-bold mx-3 mb-0">Inscription</span>
          </div>
          <!-- prenom nom -->
          <div class="row"> 
            <div class="col-md-6 mb-4">
              <div data-mdb-input-init class="form-outline">
                 <label for="prenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control
                 " placeholder="prenom">
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div data-mdb-input-init class="form-outline">
                 <label for="nom" class="form-label">Nom</label>
                 <input type="text" name="nom" id="nom" class="form-control
                 " placeholder="prenom">
              </div>
            </div>
          </div>
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="email">Addresse Email </label>
            <input type="email" id="email" name="email" class="form-control "
              placeholder="Entrer un addresse email valide" />
              <h6 style="color: red;" id="verifemail"></h6>
          </div>
          <!-- numero telephone -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="telephone"> Telephone </label>
            <input type="tel" id="telephone" name="telephone" class="form-control "
              placeholder="numero telephone" />
              <h6 style="color:red" id="veriftel"></h6>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <label class="form-label" for="mdp">Mot de passe</label>
            <input type="password" name="mdp" class="form-control "
              placeholder="Entrer un mot de passe" />
          </div>
          <div data-mdb-input-init class="form-outline mb-3">
            <span class="form-label" >Photo profile</span>
            <input type="file" name="photos" class="form-control"/>
          </div>

         

          <div class="text-center text-lg-start mt-4 pt-2">
            <input  type="submit" id="inscrire" name="inscription" value="s'inscrire" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"/>
            <span class="small fw-bold mt-2 pt-1 mb-0">j'ai deja un compte <a href="connexion.php"
                class="link-danger">Connexion</a></span>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary" style="margin-top: -52px;">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © JOKALANTE 2020. All rights reserved.
    </div>
   
  </div>
</body>
<script>
  document.addEventListener('DOMContentLoaded',function(){
      var email = document.getElementById('email');
      var tel = document.getElementById('telephone');
      email.addEventListener('keyup',function(){
        let query = this.value;
        if (query.length >0) {
          var xhr1 = new XMLHttpRequest();
          xhr1.open('GET','traitement.php?verifEmail='+encodeURIComponent(query),true);
          xhr1.onreadystatechange = function(){
            if (xhr1.readyState ===4 && xhr1.status === 200) {
              document.getElementById('verifemail').innerHTML = xhr1.responseText;
             
            }
          }
          xhr1.send();

        }
      })
      tel.addEventListener('keyup',function(){
        let queryTel = this.value;
        if (queryTel.length>0) {
          var xhr2 = new XMLHttpRequest();
          xhr2.open('GET','traitement.php?verifTel='+encodeURIComponent(queryTel),true);
          xhr2.onreadystatechange  = function(){
            if (xhr2.readyState===4 && xhr2.status===200) {
              document.getElementById('veriftel').innerHTML=xhr2.responseText;
              
        toggleButtonState();
        
            }
          }
          xhr2.send();
        }
            });

            function toggleButtonState() {
                if (document.getElementById('veriftel').innerHTML === xhr2.responseText ) {
                    document.getElementById('inscrire').disabled = true;
                } else {
                    document.getElementById('inscrire').disabled = false;
                }
            }
        });
    
</script>
</html>                                       
