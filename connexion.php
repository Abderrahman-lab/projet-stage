<?php
session_start();
try{$con = new PDO("mysql:host=localhost;dbname=facebook", "root", "",);
}catch(exeption $e){
    $e->Get_Message();
}
if(isset($_POST['Connexion'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo=htmlspecialchars($_POST['pseudo']);
         $mdp=sha1($_POST['mdp']);
         $recupUser=$con->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp=?');
         $recupUser->execute(array($pseudo,$mdp));
         if($recupUser->rowCount()>0){
            $_session['pseudo']=$pseudo;
            $_session['mdp']=$mdp;
            $_session['id']=$recupUser->fetch()['id'];
            header('location:index.php');
    }else{
        echo"<h2>votre pseudo ou mot de passe est incorrect</h2>";
    }
}else{
    echo"<h2>veullez completez tous les champs..</h2>";
}
}
//code source de medci
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <title>Register</title>
</head>

<body>
  <div class="main" >
    <p class="sign" align="center">Sign in</p>
    <form class="form1" action="" method="POST">
      <input class="un" name="pseudo" type="text" align="center" placeholder="Username">
      <input class="pass" name="mdp" type="password" align="center" placeholder="Password">
      <input class="submit" type="submit" name="Connexion" value="Sing up" align="center">
      <p class="creer" align="center"><a href="validation (2).php">I dont have account! </p></form>  
                
    </div>
</body>
</html>

   <!--<aside>
        <h1>hello if you are already registered, please enter your username and password.</h1>
    <form action="" method="POST" action="validation.php">
    // if(isset($erreur)) echo "<h3>$erreur</h3>";?>
        <input type="text" name="pseudo" placeholder="Email ou Tèl"><br><br>
        <input type="password" name="mdp" placeholder="Mot De Passe" ><br><br>
        <input type="submit" value="Connexion" name="Connexion" >
    </form>
</aside>-->
