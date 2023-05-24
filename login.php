<?php
    $bdd=new PDO('mysql:host=mysql_db;dbname=fish','root','root');
    if(isset($_POST['tel']) AND isset($_POST['passe']))
    { 
      $reque=$bdd->query("SELECT * FROM user ");
      $nombr=$reque->rowCOUNT();
      if($nombr==0 OR ($nombr%2)!=0)
      {
        $req=$bdd->prepare('INSERT INTO user(tel,mdp)
        VALUES(:nom,:prenom)');
    
$req->execute([
':nom'=>htmlspecialchars($_POST['tel']),
':prenom'=>htmlspecialchars($_POST['passe']),

]);
$suc=0;
header('Location:connexion.php?code='.$suc);

      }
      else {header('Location:error.php');}
         
    }
?>  