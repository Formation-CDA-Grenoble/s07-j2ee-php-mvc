<?php 
// Définir une variable
$city = 'Montpellier'
?>

<?php include('./views/head.php') ?>

<?php include('./views/navbar.php') ?>

    <div>
        Bonjour <?php 
            // Envoyer le contenu d'une variable dans le HTML
            echo $city 
        ?>!
    </div>

<?php include('./views/footer.php') ?>

<?php include('./views/foot.php') ?>
