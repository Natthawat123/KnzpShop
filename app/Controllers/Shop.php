<?php

namespace App\Controllers;

use App\Controllers\Template;
use App\Models\ProductModel;
use App\Models\CartModel;

class Shop extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        // คำนวณจำนวนสินค้าในตะกร้า
        $itemCount = $this->getCartItemCount();

        helper('number');
        $template = new Template();
        return $template->Render('Shop/Index', [
            'title' => 'สินค้า',
            'products' => $products,
            'itemCount' => $itemCount // ส่งจำนวนสินค้าไปยัง view
        ]);
    }

    public function addProduct($id)
    {
        $productId = $this->request->getPost('product_id');
        $userId = $this->request->getPost('user_id');

        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        if (!$userId) {
            return redirect()->back()->with('error', 'User not logged in!');
        }

        $cartModel = new CartModel();
        $existingItem = $cartModel->where([
            'user_id'    => $userId,
            'product_id' => $productId
        ])->first();

        if ($existingItem) {
            $newQuantity = $existingItem['quantity'] + 1;
            $updateSuccess = $cartModel->update($existingItem['cart_id'], ['quantity' => $newQuantity]);

            if (!$updateSuccess) {
                return redirect()->back()->with('error', 'Failed to update product quantity!');
            }
        } else {
            $data = [
                'user_id'    => $userId,
                'product_id' => $productId,
                'quantity'   => 1
            ];
            $saveSuccess = $cartModel->insert($data);

            if (!$saveSuccess) {
                return redirect()->back()->with('error', 'Failed to add product to cart!');
            }
        }

        return redirect()->to('/shop')->with('message', 'Product added to cart!');
    }


    public function SubmitCreate()
{
    if (!session()->get('logged_in')) {
        return $this->response->setJSON(['success' => false, 'message' => 'Please log in.']);
    }

    $user_id = $this->request->getPost('user_id');
    $productId = $this->request->getPost('product_id');
    $quantity = $this->request->getPost('quantity') ?: 1;

    $insertData = [
        'user_id'    => $user_id,
        'product_id' => $productId,
        'quantity'   => $quantity
    ];

    $cartModel = new CartModel();
    $insert = $cartModel->insert($insertData);

    if (!$insert) {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to add product to cart.']);
    }

    return $this->response->setJSON(['success' => true, 'message' => 'Product added to cart!']);
}


    public function addToCart()
    {
        // รับข้อมูลจากฟอร์ม
        $userId = $this->request->getPost('user_id');
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');

        // สร้าง instance ของ CartModel
        $cartModel = new CartModel();

        // เพิ่มสินค้าใหม่ในตะกร้า
        $data = [
            'user_id'    => $userId,
            'product_id' => $productId,
            'quantity'   => 1
        ];
        $cartModel->save($data);

        return redirect()->back()->with('message', 'สินค้าได้ถูกเพิ่มลงในตะกร้าเรียบร้อยแล้ว');
    }





    public function showCart()
    {
        $userId = session()->get('user_id');
        $cartModel = new CartModel();
        $cartItems = $cartModel->where('user_id', $userId)->findAll();
        $itemCount = count($cartItems);
    
        $productModel = new ProductModel();
        $totalPrice = 0; // ย้ายการคำนวณราคารวมมาไว้ในลูปเดียวกัน
        foreach ($cartItems as &$item) {
            $product = $productModel->find($item['product_id']);
            if ($product) {
                $item['image'] = $product['image']; // ตรวจสอบว่า 'image' มีอยู่ในฐานข้อมูล
                $item['name'] = $product['name'];
                $item['price'] = $product['price'];
                $totalPrice += $product['price'] * $item['quantity']; // คำนวณราคารวมในลูปเดียวกัน
            }
        }
    
        helper('number');
        $template = new Template();
        return $template->Render('shop/add', [
            'title' => 'ตะกร้า',
            'products' => $cartItems,
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice // ส่งราคารวมไปยัง view
        ]);
    }
    

    public function removeProduct($id)
    {
        $userId = session()->get('user_id');
        $cartModel = new CartModel();

        $cartItem = $cartModel->where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartModel->delete($cartItem['cart_id']);
            session()->setFlashdata('message', 'Product removed from cart!');
        } else {
            session()->setFlashdata('error', 'Product not found in cart!');
        }

        return redirect()->to('/shop/cart');
    }

    private function getCartItemCount()
    {
        $userId = session()->get('user_id');
        $cartModel = new CartModel();
        $cartItems = $cartModel->where('user_id', $userId)->findAll();
        return count($cartItems);
    }

    public function update($productId)
{
    $quantity = $this->request->getJSON()->quantity;
    $userId = session()->get('user_id');

    $cartModel = new CartModel();
    $cartItem = $cartModel->where(['user_id' => $userId, 'product_id' => $productId])->first();

    if ($cartItem) {
        $cartModel->update($cartItem['id'], ['quantity' => $quantity]);
        return $this->response->setJSON(['status' => 'success']);
    }

    return $this->response->setJSON(['status' => 'error']);
}

    public function remove($product_id) {
        $cartModel = new \App\Models\CartModel();
    
        // ลบรายการที่มี product_id ที่ตรงกัน
        $deleted = $cartModel->where('product_id', $product_id)->delete();
    
        // ส่ง JSON response กลับไปที่ AJAX
        if ($deleted) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }
    
}
