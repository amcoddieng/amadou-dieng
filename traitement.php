<?php
session_start();
// fonction pour se connecter a la base de donnee
function bd(){
	$dataBase= new PDO('mysql:host=localhost;dbname=jokolante;charset=utf8','root','');
	return $dataBase;
}

	// enregistrement d'un nouveau user
	if (isset($_POST['inscription'])) {
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$telephone=$_POST['telephone'];
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		$photos=$_FILES['photos'];
		$PHsource=$photos['tmp_name'];
		$PHdestination=$photos['name'];
		move_uploaded_file($PHsource,$PHdestination='img/'.$email.'.png');
		$bd=bd();
		$prepare=$bd->prepare('INSERT INTO `users` (`Prenom`,`nom`,`tel`,`email`,`password`,`photos`) VALUES (?,?,?,?,?,?)');
		$prepare->execute(array($prenom,$nom,$telephone,$email,$mdp,$PHdestination));
		if ($prepare) {
			session_start();
			$_SESSION['connexion']='reussi';
			$_SESSION['email']=$email;
			header('location:index.php');
		}	
	}
	// verification de l'existance du mail lors de l'inscription
		if (isset($_GET['verifEmail'])) {
			$email=$_GET['verifEmail'];
			$verif=bd()->prepare('SELECT * FROM users WHERE email=?');
			$verif->execute(array($email));
			if ($verif->rowCount()>0) {
				echo "Email existe deja";
			}
		}
	// verification de l'existance du telephone lors de l'inscription
		if (isset($_GET['verifTel'])) {
			$tel=$_GET['verifTel'];
			$verif=bd()->prepare('SELECT * FROM users WHERE tel=?');
			$verif->execute(array($tel));
			if ($verif->rowCount()>0) {
				echo "telephone existe deja ";
			}
		}
	//connexion pour un user
	if (isset($_POST['connexion'])) {
		session_start();
	 	$email=$_POST['email'];
	 	$mdp=$_POST['mdp'];
	 	$bd=bd();
	 	$prepare=$bd->prepare('SELECT * FROM users WHERE email=? AND password=?');
	 	$prepare->execute(array($email,$mdp));
	 	if ($prepare->rowCount()>0) {
	 		$_SESSION['connexion']='reussi';
	 		$_SESSION['email']=$email;
	 		header('location:index.php');
	 	}else{
	 		$_SESSION['connexion']='Email ou mot de passe incorrect';
	 		header('location:connexion.php');
	 	}
	 }
	  //deconnexion pour un users
	  if (isset($_GET['deconnexion'])) {
	  		session_start();
	  		session_destroy();
	  		header('location:connexion.php');
	   } 
	   // recherche users
	   if (isset($_GET['searchuser'])) {
    $search = $_GET['searchuser'];
    $stmt = bd()->prepare('SELECT * FROM users WHERE email LIKE ? OR nom LIKE ? OR prenom LIKE ?');
    $stmt->execute(["%$search%", "%$search%", "%$search%"]);
    // RESULTATS EN LI
     if ($stmt->rowCount() > 0) {
     	$resultats = $stmt->fetchAll();
    	echo "<ul>";
	   	foreach ($resultats as $key => $value) {
	   		$photos=$value['photos'];
	   		$email=$value['email'];
	   		// rechercher s'il est son amis ou pas
	   		$searche1=bd()->prepare('SELECT * FROM amitie WHERE email=? AND email_ami=? ');
	   		$searche1->execute(array($_SESSION['email'],$email));
	   		// verifier si une demande d'amis est en cours
	   		$searche2=bd()->prepare('SELECT * FROM demande WHERE email_demandeur=? AND email_demande=? AND etat = ? ');
	   		$searche2->execute(array($_SESSION['email'],$email,'attente'));
	   		$amis="";
	   		if ($searche1->rowCount()>0) {
	   			$amis="<li id='li1' class='li2' data-emaill =".$value['email']." > 
	   					<div class='row' id='divContLi'>
	   						<div class='col-lg-1'><img id='imgli' src='".$photos."'/></div>
	   						<div class='col-lg-3' id='nomemail'>&nbsp&nbsp".$value['Prenom']."&nbsp".$value['nom']."
	   							<p id='emailOpo'>&nbsp&nbsp".$value['email']."</p>
	   						</div>
	   						<div  id='btnkey' data-email=".$value['email']." class='encours col'>
	   						 	amis
	   					</div>
	   						</div>
				  </li>";
	   		}elseif ($searche2->rowCount()>0) {
	   			$amis="<li id='li1' data-emaill =".$value['email']." > 
	   					<div class='row' id='divContLi'>
	   						<div class='col-lg-1'><img id='imgli' src='".$photos."'/></div>
	   						<div class='col-lg-3' id='nomemail'>&nbsp&nbsp".$value['Prenom']."&nbsp".$value['nom']."
	   							<p id='emailOpo'>&nbsp&nbsp".$value['email']."</p>
	   						</div>
	   						<div  id='btnkey' data-email=".$value['email']." class='encours col'>
	   						 	encours
	   					</div>
	   						</div>
				  </li>";
	   		}else{
	   			$amis="<li id='li1' data-emaill =".$value['email']." > 
	   					<div class='row' id='divContLi'>
	   						<div class='col-lg-1'><img id='imgli' src='".$photos."'/></div>
	   						<div class='col-lg-3' id='nomemail'>&nbsp&nbsp".$value['Prenom']."&nbsp".$value['nom']."
	   							<p id='emailOpo'>&nbsp&nbsp".$value['email']."</p>
	   						</div>
	   						<div  id='btnkey' data-email=".$value['email']." class='btnajout col'>
	   						 	ajouter
	   					</div>
	   						</div>		
				  </li>";
	   		}
	   		echo "$amis";
	   	}
	   	echo "</ul>";		
    	}else{
    	echo "<h4 style='color: red;'>Aucun resultat</h4>";
    }
    }
	// ajout d'un ami
	if (isset($_GET['SendDemander'])) {
		$ajoutami=bd()->prepare('INSERT INTO `demande`(`email_demandeur`,`email_demande`,`etat`) VALUES (?,?,?)');
		$ajoutami->execute(array($_SESSION['email'],$_GET['SendDemander'],'attente'));
		echo "en&nbspcours";
	}
	// afficher les demandes
if (isset($_GET['afficheLesDemandes'])) {
    // Préparer la requête SQL pour sélectionner les demandes
    $sql = '
        SELECT *
        FROM demande 
        JOIN users ON users.email = demande.email_demandeur 
        WHERE demande.email_demande = ? AND etat=?
    ';
    // Préparer la requête avec la base de données
    $Demandes = bd()->prepare($sql);
    // Exécuter la requête avec les paramètres spécifiés
    $emailDemande = $_SESSION['email'];
    $Demandes->execute(array($emailDemande, "attente"));
    // Vérifier si des résultats ont été trouvés
    if ($Demandes->rowCount() > 0) {
        echo "
        	 <div id='user_info' class='row'>
			<span class='LesdemandeAmis'>Les demandes d'amis</span>
			</div>
        	<ul>";
        foreach($Demandes as $result){
            echo "
                <li class='liDesDemandeAmi row'>
                <div class='col col-lg-2'>
                    <img src='".htmlspecialchars($result['photos'])."' class='IMGliDesDemandeAmi' width='96' height='96'>
                </div>
                    <div class='detail col col-lg-8'>
                        <span class='SpanDesDemandeAmiPRENOM'>Prenom : " . htmlspecialchars($result['Prenom']) . "</span><br>
                        <span class='SpanDesDemandeAmiNOM'>Nom : " . htmlspecialchars($result['nom']) . "</span><br>
                        <span class='SpanDesDemandeAmiEMAIL'>E-mail : " . htmlspecialchars($result['email']) . "</span>
                    </div>
                    <div class='btnAcceptDet col'>
                        <button data-email=".htmlspecialchars($result['email'])." class='btna'>accepter </button>
                        <button data-email=".htmlspecialchars($result['email'])." class='btnr'>refuser </button>
                    </div>           
                </li>
            ";
        }
        echo "</ul>";
    } else {
        echo "Aucune demande trouvée.";
    }
}
	// Accepter la demander d'une amis
	if (isset($_GET['AccepterAmis'])) {
		$email=$_GET['AccepterAmis'];
		$insertAMI=bd()->prepare('INSERT INTO `amitie` (`email`,`email_ami`) VALUES(?,?)');
		$insertAMI->execute(array($email,$_SESSION['email']));
		$insertAMI->execute(array($_SESSION['email'],$email));
		$refuser=bd()->prepare('UPDATE demande SET etat = ? WHERE email_demande = ? AND email_demandeur = ?');
		$refuser->execute(array('accepté',$_SESSION['email'],$email));
		echo "accepté";
	}
	// Refuser la demander d'une amis
	if (isset($_GET['refuserAmis'])) {
		$email=$_GET['refuserAmis'];
		$refuser=bd()->prepare('UPDATE demande SET etat = ? WHERE email_demande = ? AND email_demandeur = ?');
		$refuser->execute(array('rejeté',$_SESSION['email'],$email));
		if ($refuser) {
			echo "Refusé";
		}
	}
	
	// envoyer des messages
	if (isset($_GET['recepteur'])) {
		$eemailRecepteur = $_GET['recepteur'];
		$message = $_GET['messages_send'];
		$insertMessage=bd()->prepare('INSERT INTO `messages`(`email_emetteur`,`email_recepteur`,`message`) VALUES(?,?,?)');
		$insertMessage->execute(array($_SESSION['email'],$eemailRecepteur,$message));
		if ($insertMessage) {
			message($eemailRecepteur,$_SESSION['email']);
		}
	}
	//discuter avec
	if (isset($_GET['discuterAvec'])) {
		personne_discut($_GET['discuterAvec']);
	}
	//messages
	if (isset($_GET['message1'])) {
		message($_GET['message1'],$_SESSION['email']);
	}

// function pour afficher le personne a qui on discute
	function personne_discut($a){
		$email_recepteur = $a;
		$RecupAmi=bd()->prepare('SELECT * FROM users WHERE email = ?');
		$RecupAmi->execute(array($email_recepteur));
		$Ami=$RecupAmi->fetch();
		echo" <div id='user_info' class='row'>
			<img src='".$Ami['photos']."' id='tofSMS'>
			<span id='nomuserSMS' class='col'>
				".$Ami['Prenom']."&nbsp".$Ami['nom']."
			</span>
			</div> 
			<div id='SMS'>
		 	</div> 
	 	 	<div id='BoiteSMS'>
	 		  <div id='textarea' class='form-group'>
	 		    <textarea class='form-control' placeholder='taper votre message ici...' id='Textarea1' rows='1'></textarea>
	 		  </div>
	 			<svg id='envoyer' data-emailRecepter=".$Ami['email']."  xmlns='http://www.w3.org/2000/svg' width='55' height='52' fill='lightblue' class='bi bi-caret-right-square-fill' viewBox='0 0 16 16'>
	 			  <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z'/>
	 			</svg>
	 		</div> 

		";
	}
// function pour afficher les messages
function message($a,$b){
$email_recepteur = $a;
		$email11=$b;
		$RecupMessages = bd()->prepare('SELECT * FROM messages WHERE (email_recepteur = ? AND email_emetteur = ?) OR (email_recepteur = ? AND email_emetteur = ?) ORDER BY date_message, heure_message');
		$RecupMessages->execute(array($email_recepteur, $email11, $email11, $email_recepteur));
		$MessageRecuperer=$RecupMessages->fetchAll();
		echo"
			<ul class='row'>";
			if (is_array($MessageRecuperer)) {
			foreach($MessageRecuperer as $value){
				if ($value['email_emetteur'] == $email_recepteur) {
					echo "
						<li id='reception'>
							<div>
								<p>".$value['message']."
								<br><span>".$value['heure_message']."</span>
								</p>
							</div>	
						</li>
					";
				}elseif($value['email_emetteur'] == $email11){
					echo "
							<li id='envoie'>
								<div>
									<p>".$value['message']."
									   <br><span>".$value['heure_message']."</span>
									</p>
								</div>									
							</li>
					";
				}
				}
			}else{
					echo "<h1 class='hhh' >Aucun Message pour l'instant <br> Envoyer en premier</h1>";
				}
	   		echo "
			</ul>
		 ";
}
  ?>