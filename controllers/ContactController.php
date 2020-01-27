<?php

class ContactController {
    public function sendMessage() {
        echo 'Message envoyé';
    }

    public function show() {
        include('./views/head.php');
        include('./views/navbar.php');
        include('./views/contact_form.php');
        include('./views/footer.php');
        include('./views/foot.php');
    }
}
