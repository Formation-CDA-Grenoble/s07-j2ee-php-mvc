<?php

class ProductController extends AbstractController {
    public function show() {
        $product = Product::find(4);

        parent::showTemplate('product', [
            'product' => $product
        ]);
    }
}
