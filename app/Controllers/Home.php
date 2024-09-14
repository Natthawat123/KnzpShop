<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        $itemCount = $this->getCartItemCount();

        helper('number');
        $template = new \App\Controllers\Template();
        return $template->Render('Home/Index',
            array(
                'title' => 'สินค้า',
                'products' => $products,
                'itemCount' => $itemCount
            )
        );
    }
    
    private function getCartItemCount()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        return count($cart);
    }
}
