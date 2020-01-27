<?php

class MainController extends AbstractController {
    public function show() {
        parent::showTemplate('hello');
    }
}
