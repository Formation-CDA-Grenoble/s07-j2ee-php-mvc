<?php

abstract class AbstractController {
    public function showTemplate($templateName, $data = []) {
        foreach ($data as $key => $value) {
            // Transforme ['machin' => 'truc'] en $machin = 'truc'
            $$key = $value;
        }

        include('./views/head.php');
        include('./views/navbar.php');
        include('./views/' . $templateName . '.php');
        include('./views/footer.php');
        include('./views/foot.php');
    }
}
