	<?php session_start();
	function bd(){
		$dataBase= new PDO('mysql:host=localhost;dbname=jokolante;charset=utf8','root','');
		$dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $dataBase;
	}

		if ($_SESSION['connexion']=='reussi') {
			$bd=bd();
			 
	        // Recuperation des donnees personnes
	        $stmt = $bd->prepare("SELECT * FROM users WHERE email = :email");
	        $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
	        $stmt->execute();
	        $resultats = $stmt->fetch();
	        echo " <script type='text/javascript'>
	 	var email='".$_SESSION['email']."'
	 </script>";
		}else{
			header('location:connexion.php');
		}
	 ?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SenJokko</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css2.css">
		<script type="text/javascript" src="jquery-3.7.1.min.js"></script>
		<style type="text/css">
			*{
				font-family: monospace;
				font-size: 102%;
			}

			#contPrincipal{
				margin: 0;
				padding: 0;
				
			}
			#cont,#contPrincipal{
				border: 5px lightblue solid;
	/*			border-radius: 10px;*/
				height: 100%;
	/*			margin-top: 1%;*/
	/*			background-color: primary;*/
				overflow-y: scroll;
	  			scrollbar-color:lightblue white ;
	 			scrollbar-width:  thin ;
			}
			#cont1{
				border: 5px lightblue solid;
	/*			border: 1px black solid;*/
				height: 100%;
				overflow-y: scroll;
	  			scrollbar-color: white primary;
	 			scrollbar-width: none ;
	 			background-image:url('img/qqq.png');
			}
			#cont2{
				padding-top: 1%;
				border: 5px lightblue solid;
	/*			border: 1px black solid;*/
				text-align: center;
				height: 100%;
				overflow-y: scroll;
	  			scrollbar-color: white primary;
	 			scrollbar-width: none ;
			}
			.container{
				margin-top: 1%;
				border: 10px white solid;
				border-radius: 10px;
				height: 550px;
				background-color: white;
			}
			#prof{
				margin: auto;
	/*			border: px solid;*/
				border-radius: 90%;
				height: 75px;
				width:75px;
	/*			margin-right: -100px;*/
			}
			#improf{
				margin-: auto;
				width: 100%;
				height: 100%;
				border-radius: 100%;
			}
			.span1,.span2,.span3{
	/*			display: flex;*/
				background-color: none;
				color: black;
				font-weight: bold;
				width: 100%;
				height: px;
	/*			text-decoration: underline;*/
	/*			border: 1px lightblue solid;*/
			}
			.span2,.span3{
				text-decoration: un;
				background-color: lightblue;
			}
			.span2:hover{
				background-color: blueviolet;
				color: white;
			}
			.span3:hover{
				background-color: red;
				color: white;
			}
			#liusers{
/*				padding: -6px;*/
/*				border: 5px white solid;*/
/*				border-bottom-right-radius: 20px ;*/
/*				border-top-right-radius: 20px;*/
/*				height: 75px;*/
/*				background-color: lightblue;*/
	/*			border-radius:;*/
/*				width: 100%;*/
				*{
/*					border: solid;*/
				}
			}
			/*#liusers img{
	/*			border: solid;*/
/*				width:45px ;*/
/*				border-radius: 20%;*/
/*				height: 45px;*/
/*				margin-left: 10%;*/
/*				float: right;*/
/*				margin-top: 10px;*/*/
			}
			#nomemail{
				width: 40px;
				height: 40px;
				border-radius: 50%;
/*				margin-top: 10px;*/
				margin-left: 60%;
			}
			#emailOpo{
				opacity: 50%;
			}
			#divajout{				
/*				display: flex;*/
				text-align: right;
				padding-top: 10px;
			}
			#divContLi{
				background-color: none;
			}
			.btnajout:hover{
				color: blue;
				cursor: pointer;
				text-decoration: underline;
/*				background-color: blue;*/
/*				background-color: white;*/
				font-weight: bold;
			}
			.encours{
				
/*				height: 30px;*/
				margin-left: 175px;
				margin-top: -55px;
				color:blue;
				height: 20px;
/*				padding:0;*/
				opacity:90%; 
				font-size: 80%;
				
			}
			.btnajout{
/*				width: 1px;*/
				margin-left: 170px;
				margin-top: -60px;
				color:blue;
				height: 20px;
/*				padding:0;*/
				opacity:90% ;
/*				background-color: red;*/
/*				display: flex;*/
/*				float: right;*/
			}
			#btnNotification{

				margin-left: 110px;
/*				font-family: cursive;*/
				color: blue;
/*				font-weight: bold;*/
				letter-spacing: 1px;
				margin-top: 10px;
/*				border: solid;*/
				height: 30px;
				font-size: 90%;
/*				display: flex;*/
/*				float: right;*/
			}
			#li1{
				margin-top: 3px;
				border-bottom:2px lightblue solid;
				background-color: white;
				width: 100%;
				height: 50px;
			}		
			.li2:hover{
				border-right: 2px blueviolet solid;
				cursor: pointer;
			}
			ul{
/*					background-color: red;*/
/*					width: 100%;*/
					list-style-type: none;
        			padding: 0;
        			margin: 0;
			}
			#imgli{
				width: 40px;
				height: 40px;
				border-radius: 50%;
/*				margin-top: 10px;*/
				margin-left: -10px;
			}
			#user_info{
				background-color: lightblue;
				height: 10%;
				margin: 0;
				border: 1px white solid;
			}
			#SMS{
/*				background-color: yellow;*/
				height: 78%;
				border-bottom: 3px lightblue solid;
				overflow-y: scroll;
	  			scrollbar-color:lightblue white ;
	 			scrollbar-width:  thin ;
	 			margin:0;
	 			padding: 0;
	 			width: 100%;
			}
			#BoiteSMS{
				background-color: lightblue;
/*				border-radius: 100px;*/
				display: flex;
				height: 12%;
				border: 3px lightblue solid;
				margin:0;
			}
			#textarea{
				width:600px ;
/*				border-radius: 10px;*/
				border: 2px lightblue solid;
				font-size: 90%;
				font-family: lucida;
				text-decoration: none;
/*				position: relative;*/
				background-color: whitesmoke;
				outline: none;
			}
			#envoyer{
				border: 3px white solid;
				margin-top: 2px;
				background-color: white;
				float: right;
				outline: none;
			}
			#envoyer:hover{
				cursor: pointer;
/*				background-color: blueviolet;*/
				fill:blueviolet;
			}
			#Textarea1{
				height: 100%;
				background-color: ghostwhite;
				outline: none;

			}
			#tofSMS{
				border:1px lightblue solid;
				margin-left: 20;
				padding: 0;
				margin-top: 1px;
				width: 45px;
				height: 45px;
				border-radius: 50%;
			}
			#nomuserSMS{
				margin: auto;
				font-weight: bold;
				letter-spacing: 1px;
			}
			#reception{
/*				background-color: lightblue;*/
/*				padding: 10px;*/
				border-radius: 30px;
				width: 100%;
/*				margin-bottom: 5px;*/
				margin:0 ;
					
			}
			#envoie{	
/*				text-align: right;*/
/*				background-color: lightblue;*/
/*				padding: 5px;*/
				border-radius: 30px;
				width: 100%;
				margin: 0;
/*				margin-bottom: 5px;*/
			}
			#envoie p{
				background-color: ghostwhite;
				border-radius: 20px;
				padding: 6px;
				max-width: 50%;
				float: right;
				border: 1px lightblue solid;
			}
			#reception p{
				border: 1px lightblue solid;
				background-color: lightblue;
				border-radius: 20px;
				padding: 6px;
				max-width: 50%;
				float: left;

			}
			#SMS ul{
				padding: 0;
				margin: 0;
			}
			#reception p span{
				opacity: 50%;
/*				display: flex;*/
				float: right;
/*				margin-top: 16px;*/
			}
			#envoie p span{
				opacity: 50%;
/*				display: flex;*/
				float: right;
/*				margin-top: 38px;*/
			}
			.LesdemandeAmis{
				font-weight: bold;
				font-size: 160%;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.liDesDemandeAmi{
				width: 100%;
				height: 19%;
				background-color: lightblue;
				border: 1px white solid;
			}
			.IMGliDesDemandeAmi{
				margin-top:px;
				border: 1px white solid;
			}
			.SpanDesDemandeAmiPRENOM{
/*				margin-top:0;*/
			}
			.SpanDesDemandeAmiNOM{
/*				margin-top:-60px;*/
			}
			.SpanDesDemandeAmiEMAIL{
/*				margin:0	;*/wq	 
			}
			.btnAcceptDet .btnr:hover{
				background-color: red;
			}
			.btnAcceptDet .btna:hover{
				background-color: green;
			}
			.btnAcceptDet button{
				height: 30px;
				border: none;
				width: 90px;
			}
			.btnAcceptDet .btna{
				background-color: lightgreen;
				margin-bottom: 3px;
			}
			.btnAcceptDet .btnr{
				background-color: coral;
				margin-bottom: 3px;
			}

			.btnAcceptDet,.liDesDemandeAmi .detail{
				margin-top: auto;
				margin-bottom: auto;
			}
			.hhh{
				height: 395px;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 110%;
				font-weight: bold;
				text-align:center;
			}
			#improf{
				cursor: pointer;
			}
		</style>
	</head>
	<body style="background-image: url('img/xxx.png');background-repeat: no-repeat;" >
		
<div class="container" >
<div id="cont1" class="row justify-content-md-center">
				
	<div id="cont2" class="col col-lg-auto">
					<div id="prof">
						
							<?php echo "<img id='improf' src=".$resultats['photos']." />"; ?>
							<script type="text/javascript">
								document.getElementById('improf').addEventListener('click',function(){
									
								})
							</script>
						
					</div>
					<div class="span1">
						<span class="span1"><?php echo $resultats['Prenom']; ?></span><br>
						<span class="span1"><?php echo $resultats['nom']; ?></span><br><br>
						<button class="span2">Mes amis</button><br><br>
						<button class="span2" id="lesDemandes">Demande</button><br><br>
						<!-- afficher les demander -->

							<script type="text/javascript">
								document.getElementById('lesDemandes').addEventListener('click',function(){
									let xhr = new XMLHttpRequest();
									xhr.open('GET','traitement.php?afficheLesDemandes=ok',true);
									xhr.onreadystatechange = function(){
										if (xhr.readyState===4 && xhr.status===200) {
											document.getElementById('contPrincipal').innerHTML=xhr.responseText;
											// accepter les demandes

											var divv = document.querySelectorAll('.btnAcceptDet');
											// alert(divv.length);
											let btns = document.querySelectorAll('.btna');

											btns.forEach((btn, index) => {  
											  btn.addEventListener('click', function(){
											    let emailAmi = this.dataset.email;
											    let xhrs = new XMLHttpRequest();
											    xhrs.open('GET','traitement.php?AccepterAmis='+encodeURIComponent(emailAmi),true);
											    xhrs.onreadystatechange = function(){
											      if (xhrs.readyState===4 && xhrs.status===200) {
											        divv[index].innerHTML=xhrs.responseText;
											      }
											    }
											    xhrs.send();
											  });
											});
												// Refuser la demande 

											let btnrs = document.querySelectorAll('.btnr');

											btnrs.forEach((btnr, index) => {  
											  btnr.addEventListener('click', function(){
											    let emailAmi1 = this.dataset.email;
											    let xhrrs = new XMLHttpRequest();
											    xhrrs.open('GET','traitement.php?refuserAmis='+encodeURIComponent(emailAmi1),true);
											    xhrrs.onreadystatechange = function(){
											      if (xhrrs.readyState===4 && xhrrs.status===200) {
											        divv[index].innerHTML=xhrrs.responseText;
											      }
											    }
											    xhrrs.send();
											  });
											});

											
											
										}
									}
									xhr.send();
								});
							</script>
						<a href="traitement.php?deconnexion=ok"><button class="span3">Deconnexion</button></a><br>
					</div>
	</div>

	<div id="cont" class="col col-lg-3">
					<p>
						
						<div class="input-group">
						    <input id="search-focus" type="search" id="form1" placeholder="search..." class="form-control" />
			<script>
						    // affichage des utilisateurs
			let users=document.getElementById('search-focus');
			users.addEventListener('keyup',function(){
				var query = this.value;
                if (query.length > 0) {
				
				let xhr1= new XMLHttpRequest();
				xhr1.open('GET','traitement.php?searchuser='+ encodeURIComponent(query),true);
				xhr1.onreadystatechange = function(){
					 if (xhr1.readyState === 4 && xhr1.status === 200) {
                document.getElementById('contUsers').innerHTML = xhr1.responseText;
                discuter_avec();
                			// envoyer demander a une personne
                let buttons = document.querySelectorAll('.btnajout');
                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        let email = this.dataset.email;
                        let xhr2 =new XMLHttpRequest();
                        xhr2.open('GET','traitement.php?SendDemander='+encodeURIComponent(email),true)
                        xhr2.onreadystatechange = function(){
                        	if (xhr2.readyState===4 && xhr2.status===200) {
                        		button.className='encours'
                        		button.innerHTML = xhr2.responseText;
                        		document.getElementById('ddd').innerHTML = email;
                        	}
                        }
                        xhr2.send();
                        // 
                    });
                });
            }
        }
				xhr1.send();
			}else{
				document.getElementById('contUsers').innerHTML = "";
			}
			})
			
		</script>

						</div>
					</p>
					<div id="contUsers">							
					</div>
					<div id="usersExistant">
							<?php
								$stmt = bd()->prepare('

									SELECT users.email, users.Prenom, users.nom, users.photos
   							     	FROM amitie
 								    JOIN users ON amitie.email_ami = users.email
 								    WHERE amitie.email = ?
								');
								$stmt->execute(array($_SESSION['email']));
								$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
								echo "
						    	<ul>";
							   	foreach ($resultats as $key => $value) {
							   		$photos=$value['photos'];
							   		echo "<li id='li1' class='li2' data-emaill=".$value['email'].">
							   					<div class='row' id='divContLi'>
							   						<div class='col-lg-1'><img id='imgli' src='".$photos."'/></div>
							   						<div class='col-lg-3' id='nomemail'>&nbsp&nbsp".$value['Prenom']."&nbsp".$value['nom']."
							   							<p id='emailOpo'>&nbsp&nbsp".$value['email']."</p>
							   						</div>
							   						<div id='btnNotification' class='col'>
							   							
							   						</div>
							   					</div>							   				
										  </li>";
							   	}
							   	echo "</ul>";
							  ?>
					</div>					
	</div>
		
		<div id="contPrincipal" class="col  container-fluid h-100">
		</div> 
	</div>				
</div>
</div>
	</body>
	<script type="text/javascript">
		function discuter_avec() {
			var Mesamis = document.querySelectorAll('.li2');
			for (var i = 0; i < Mesamis.length; i++) {
				Mesamis[i].addEventListener('click',function () {
						let xhrMessages = new XMLHttpRequest();
						let eem = this.dataset.emaill
						xhrMessages.open('GET','traitement.php?discuterAvec='+encodeURIComponent(eem),true);
						xhrMessages.onreadystatechange=function(){
							if (xhrMessages.readyState===4 && xhrMessages.status===200) {
								document.getElementById('contPrincipal').innerHTML=xhrMessages.responseText;
								
								let xhrMessages1 = new XMLHttpRequest();
								setInterval(function(){
								xhrMessages1.open('GET','traitement.php?message1='+encodeURIComponent(eem),true);
						xhrMessages1.onreadystatechange=function(){
							if (xhrMessages1.readyState===4 && xhrMessages.status===200) {
								document.getElementById('SMS').innerHTML=xhrMessages1.responseText;
								var div = document.getElementById('SMS');
								div.scrollTop = div.scrollHeight;
							}}
							
							xhrMessages1.send();
						},1000)
								
								sendMessage();
							}
						}
						xhrMessages.send();
					
				})
			}
		}
		// fonction pour envoyer un message
		function sendMessage() {
			document.getElementById('envoyer').addEventListener('click',function(){
				let emailEnvoyer = document.getElementById('envoyer').dataset.emailrecepter;;
				let messageSend = document.getElementById('Textarea1').value;
				xhrMessages=new XMLHttpRequest();
				xhrMessages.open('GET','traitement.php?recepteur='+encodeURIComponent(emailEnvoyer)+'&messages_send='+encodeURIComponent(messageSend),true);
				xhrMessages.onreadystatechange=function(){
					if (xhrMessages.readyState===4 && xhrMessages.status===200) {
						document.getElementById('SMS').innerHTML=xhrMessages.responseText;
						document.getElementById('Textarea1').value=''
						var div = document.getElementById('SMS');
							div.scrollTop = div.scrollHeight;
						// sendMessage();
					}
				}
				xhrMessages.send();
				})
		}
		discuter_avec();





		// function discuter_avec() {
		// 	var Mesamis = document.querySelectorAll('.li2');
		// 	for (var i = 0; i < Mesamis.length; i++) {
		// 		Mesamis[i].addEventListener('click',function () {
		// 				let xhrMessages = new XMLHttpRequest();
		// 				let eem = this.dataset.emaill
		// 			// 
		// 				xhrMessages.open('GET','traitement.php?mesmessages='+encodeURIComponent(eem),true);
		// 				xhrMessages.onreadystatechange=function(){
		// 					if (xhrMessages.readyState===4 && xhrMessages.status===200) {
		// 						document.getElementById('contPrincipal').innerHTML=xhrMessages.responseText;
		// 						var div = document.getElementById('SMS');
		// 						div.scrollTop = div.scrollHeight;
		// 						sendMessage();
		// 					}
		// 				}
		// 				xhrMessages.send();
		// 			// 
		// 		})
		// 	}
		// }

	</script>
	</html>