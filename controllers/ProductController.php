<?php

class ProductController extends AbstractController {
    public function show($parameters) {
        $id = $parameters[1];
        $product = Product::find($id);

        if (is_null($product)) {
            $errorController = new ErrorController;
            return $errorController->notFound();
        }

        parent::showTemplate('product', [
            'product' => $product
        ]);
    }

    public function list() {
        $products = Product::findAll();
        
        parent::showTemplate('product_list', [
            'products' => $products
        ]);
    }
}
