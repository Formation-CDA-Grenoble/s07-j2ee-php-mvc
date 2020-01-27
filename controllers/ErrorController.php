<?php

class ErrorController extends AbstractController {
    public function notFound() {
        parent::showTemplate('not_found');
    }
}
