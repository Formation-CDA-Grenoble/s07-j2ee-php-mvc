<?php

class ContactController extends AbstractController {
    public function sendMessage() {
        echo 'Message envoyé';
    }

    public function show() {
        parent::showTemplate('contact_form');
    }
}
