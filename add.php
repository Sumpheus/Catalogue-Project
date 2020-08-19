<?php
include_once 'connect.php';

  if(isset($_POST['add'])) {
    $titre = $_POST['titre'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $prix = $_POST['prix'];
    $developpeur = $_POST['developpeur'];


  if(empty($titre) OR empty($genre) OR empty($description) OR empty($date) OR empty($prix) OR empty ($developpeur))
  {
    echo"<font color='red'>'Ne peut rester vide !'</font>";
  }
  else{

    try{
      $stmt =$conn->prepare("INSERT INTO jeux_video (titre, genre, description, date, prix, developpeur, image) VALUES (:titre, :genre, :description, :date, :prix, :developpeur, :image)");

      $filename = $_FILES['image']['name'];
                  $target_files='img/' .$filename;
                  $file_extension = pathinfo($target_files, PATHINFO_EXTENSION);
                  $valid_extension = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');

                    if(in_array($file_extension,$valid_extension)) {
                      if (move_uploaded_file($_FILES['image']['tmp_name'],$target_files)) {}}


      $stmt->execute(array(
        ':titre' => $titre,
        ':genre' => $genre,
        ':description' => $description,
        ':date' => $date,
        ':prix' => $prix,
        ':developpeur' => $developpeur,
        ':image' => $target_files,
      ));
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

      echo "<font color='green'><br>Jeu ajouté avec succés !</font>";
    }
  }

  ?>
