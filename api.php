<?php
// On se connecte à MySQL :
try {
    $link = new PDO('mysql:host=localhost;dbname=write_database_name_here', 'write_database_username_here', 'write_password_here', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
    echo $e->getMessage();
}
if(isset($_GET['format']) and $_GET['format']=="json"){
   header("Access-Control-Allow-Origin: *");
   if(isset($_GET['login'])){
      $login = $_GET['login'];
      if(isset($_GET['email'])){
         $email = $_GET['email'];
         if(isset($_GET['message'])){
            $message = $_GET['message'];
            $sql = "INSERT INTO messages(login,email,message,ip) VALUES (:login,:email,:message,'".$_SERVER['REMOTE_ADDR']."')";
            // On prépare la requête avant l'envoi :
            $req = $link -> prepare($sql);
            // On exécute la requête en insérant les valeurs transmise en GET
            $req -> execute(array(":login" => $_GET["login"], ":email" => $_GET["email"], ":message" => $_GET["message"]));
            $req = null;
            echo '{"status":"success","message":"message sent to the database / message bien envoyé à la base de données"}';
         } else {
            echo '{"status":"error","message":"message parameter missing in the URL / paramètre message manquant dans l\'URL"}';
         }   
      } else {
         echo '{"status":"error","message":"email parameter missing in the URL / paramètre email manquant dans l\'URL"}';
      }        
   } else {
      echo '{"status":"error","message":"login parameter missing in the URL / paramètre login manquant dans l\'URL"}';
   } 
   
} else {
echo '<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css" />
<title>API de sauvegarde de messages / API for saving messages</title>
</head>
<body>
<div class="container">
<h1>API de sauvegarde de messages / API for saving messages</h1>
<h2>Documentation in English</h2>
<p>Warning about GDPR: this API stores the IP address of the computer sending the message and possibly personal data submitted by the user. This data is stored on the servers of o2switch and deleted after 2 years. Please contact [WRITE DPO NAME HERE] by email at [WRITE DPO EMAIL ADDRESS HERE] to access or remove any personal information.</p>
<ul>API parameters:
<li><tt><a href="api.php?format=JSON">format</a></tt>: json to get the result of the API call in JSON format</li>
<li><tt><a href="api.php?format=JSON&login=berthet">login</a></tt>: your login, in order to link messages to your website</li>
<li><tt><a href="api.php?format=JSON&login=berthet&email=philippe.gambette@gmail.com">email</a></tt>: email address of the person sending the message</li>
<li><tt><a href="api.php?format=JSON&login=berthet&email=philippe.gambette@gmail.com&message=toto">message</a></tt>: message to send, in utf8</li>
</ul>

<h2>Documentation en français</h2>
<p>Avertissement à propos du RGPD&nbsp;: cette API enregistre l\'adresse IP de l\'ordinateur qui envoie le message et des informations à caractère personnel potentiellement envoyées par l\'internaute. Ces données sont stockées sur des serveurs d\'o2switch et supprimées au bout de 2 ans. Merci de contacter [NOM DU OU DE LA DPO ICI] par courriel à [COURRIEL DU OU DE LA DPO] pour exercer votre droit d\'accès ou de suppression à ces données.</p>
<ul>Paramètres de l\'API&nbsp;:
<li><tt><a href="api.php?format=JSON">format</a></tt>&nbsp;: json pour récupérer le résultat de l\'API au format JSON</li>
<li><tt><a href="api.php?format=JSON&login=berthet">login</a></tt>&nbsp;: votre login, pour relier à votre site les messages reçus</li>
<li><tt><a href="api.php?format=JSON&login=berthet&email=philippe.gambette@gmail.com">email</a></tt>&nbsp;: adresse de courriel de la personne qui envoie le message</li>
<li><tt><a href="api.php?format=JSON&login=berthet&email=philippe.gambette@gmail.com&message=toto">message</a></tt>&nbsp;: message à envoyer, encodé en utf8</li>
</ul>

</div>
</body>
</html>';
}
?>