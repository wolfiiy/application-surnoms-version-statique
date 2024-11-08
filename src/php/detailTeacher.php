<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Detailed view of a given teacher.
 */

// Connection to the database
require('database.php');
$db = new Database();

// Get the requested teacher
if (isset($_GET['id'])) {
    $teacher = $db -> getOneTeacher($_GET['id']);
    $section = $db -> getSectionById($teacher['fkSection']);

    // Map gender to the correct image
    $genderImagePath = array(
        'M' => 'male.png',
        'F' => 'femelle.png',
        'A' => 'autre.png'
    );

    $genderImage = $genderImagePath[$teacher['teaGender']];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
    <title>Détails de <?=$teacher['teaNickname']?></title>
</head>

<body>
    <?php include('header.php')?>

    <div class="container">
        <div class="user-head">
            <h3>Détail : <?=$teacher['teaFirstname'] . " " . $teacher['teaName'];?>
                <img style="margin-left: 1vw;" height="20em" src="../img/<?=$genderImage?>" alt="male symbole">
            </h3>
            <p>
                <?=ucwords($section['secName']);?>
            </p>
            <div class="actions">
                <a href="editTeacher.php?id=<?=$teacher['idTeacher']?>">
                    <img height="20em" src="../img/edit.png" alt="edit icon">
                </a>
                <a href="javascript:confirmDelete()">
                    <img height="20em" src="../img/delete.png" alt="delete icon"> 
                </a>
            </div>
        </div>

        <div class="user-body">
            <div class="left">
                <p>
                    Surnom : <?=$teacher['teaNickname'];?>
                </p>
                <p>
                    <?=$teacher['teaOrigine'];?>
                </p>
            </div>
        </div>

        <div class="user-footer">
            <a href="index.html">Retour à la page d'accueil</a>
        </div>
    </div>

    <footer>
        <p>Copyright GCR - bulle web-db - 2022</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>