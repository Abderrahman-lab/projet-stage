<?php
session_start();
 $con = new PDO("mysql:host=localhost;dbname=facebook", "root", "", );
 if(isset($_POST['Connexion'])){
     if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
         $pseudo=htmlspecialchars($_POST['pseudo']);
         $mdp=sha1($_POST['mdp']);
         $insertuser=$con->prepare('INSERT INTO users(pseudo,mdp) VALUES(?, ?)');
         $insertuser->execute(array($pseudo,$mdp ));
         $recupUser=$con->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp=?');
         $recupUser->execute(array($pseudo,$mdp));
         if($recupUser->rowCount()>0){
             $_session['pseudo']=$pseudo;
             $_session['mdp']=$mdp;
             $_session['id']=$recupUser->fetch()['id'];
             header('location:index.php');
        }
         echo "<h2>MERCI de créer votre compte avec Nous!!</h2>";
        
    }else{
        echo"<h2>veullez completez tous les champs..</h2>";
    }
  
}
if(isset($_POST['compte'])){
    header('location:validation.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index2.css">
    <title>Document</title>
</head>
<body>
  <div class="main" >
    <p class="sign" align="center">Register</p>
    <form class="form1" action="" method="POST">
      <input class="un" name="pseudo" type="text" align="center" placeholder="Username">
      <input class="pass" name="mdp" type="password" align="center" placeholder="Password">
      <input class="pass" name="" type="password" align="center" placeholder="rewrite password">
      <input class="submit" type="submit" name="Connexion" value="Sing up" align="center">
      <p class="creer" align="center"><a href="#"> </p>
      </form>  
    </div>
   <!-- <aside>
    <h1>
    hello if you want registered type your username and password.
    </h1>
    <form action="" method="POST" action="validation.php">
        <input type="text" name="pseudo" placeholder="Email ou Tèl"><br><br>
        <input type="password" name="mdp" placeholder="Mot De Passe" ><br><br>
        <input classe="but"type="submit" value="Creér" name="Connexion"><br><br>
        <input type="submit" value="I have an account" name="compte">
    </form>
    </aside>-->
</body>
</html>