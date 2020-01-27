<?php

abstract class AbstractController {
    public function showTemplate($templateName) {
        include('./views/head.php');
        include('./views/navbar.php');
        include('./views/' . $templateName . '.php');
        include('./views/footer.php');
        include('./views/foot.php');
    }
}
