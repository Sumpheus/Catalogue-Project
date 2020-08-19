<?php
include_once 'connect.php';

  if(isset($_POST['suppress'])) {
    $titre = $_POST['titre'];

  if(empty($titre))
  {
    echo"<font color='red'>'Ne peut rester vide !'</font>";
  }
  else{

    try{
      $stmt =$conn->prepare("DELETE FROM `jeux_video` WHERE titre = :titre");
      $stmt->execute(array(
        ':titre'=>$titre
        ));
        }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
      echo "<font color='green'><br>Jeu supprimer avec succés !</font>";
    }
  }
?>
