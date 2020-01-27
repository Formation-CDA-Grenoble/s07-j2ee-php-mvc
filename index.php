<?php

var_dump($_GET);
var_dump($_POST);
echo(empty($_POST));

require_once('./controllers/MainController.php');
require_once('./controllers/ContactController.php');

if (!isset($_GET['_url'])) {
    $controller = new MainController;
    $controller->show();
} else if ($_GET['_url'] === '/contact') {
    if (empty($_POST)) {
        $controller = new ContactController;
        $controller->show();
    } else {
        $controller = new ContactController;
        $controller->sendMessage();
    }
} else {
    echo 'Cette page n\'existe pas (encore)';
}
