<?php

class ErrorController extends AbstractController {
    public function notFound() {
        http_response_code(404);
        parent::showTemplate('not_found');
    }
}
