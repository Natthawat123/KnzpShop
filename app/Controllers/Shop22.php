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

        // $userModel = new UserModel();
        // $user = $userModel->findAll();

        // คำนวณจำนวนสินค้าในตะกร้า
        $itemCount = $this->getCartItemCount();

        helper('number');
        $template = new Template();
        return $template->Render(
            'Shop/Index',
            array(
                'title' => 'สินค้า',
                'products' => $products,
                'itemCount' => $itemCount // ส่งจำนวนสินค้าไปยัง view
            )
        );
    }

    public function addProduct($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return "Product not found!";
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        // เพิ่มผลิตภัณฑ์ลงในตะกร้า
        $cart[] = $product;
        $session->set('cart', $cart);
        $session->setFlashdata('message', 'Product added to cart!');

        return redirect()->to('/shop/add'); // เปลี่ยนเส้นทางไปยังหน้าตะกร้า
    }

    public function showCart()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $itemCount = count($cart);

        $cartModel = new CartModel();

        // คำนวณราคารวม
        $totalPrice = 0;
        foreach ($cart as $product) {
            $totalPrice += $product['price'] * ($product['quantity'] ?? 1); // ใช้ quantity ถ้ามี
        }

        helper('number');
        $template = new Template();
        return $template->Render('shop/add', [
            'title' => 'ตะกร้า',
            'products' => $cart,
            'itemCount' => $itemCount,
            'totalPrice' => $totalPrice // ส่งราคารวมไปยัง view
        ]);
    }

    public function removeProduct($index)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $session->set('cart', array_values($cart)); // Reindex the array
            $session->setFlashdata('message', 'Product removed from cart!');
        }

        return redirect()->to('/shop/add'); // เปลี่ยนเส้นทางไปยังหน้าตะกร้า
    }

    private function getCartItemCount()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        return count($cart);
    }

    public function update($index)
    {
        $quantity = $this->request->getPost('quantity');
        // ตรวจสอบว่าค่าที่ได้มานั้นมีอยู่จริง
        if ($quantity === null) {
            // จัดการกับข้อผิดพลาดเมื่อไม่พบค่า
            return redirect()->back()->with('error', 'จำนวนสินค้าถูกต้องไม่ได้');
        }

        $cart = session()->get('cart');
        if (isset($cart[$index])) {
            $cart[$index]['quantity'] = $quantity;
            session()->set('cart', $cart);
        }

        return redirect()->back()->with('message', 'จำนวนสินค้าถูกปรับปรุงเรียบร้อยแล้ว');
    }

    public function remove($index)
    {
        $cart = session()->get('cart');

        // ตรวจสอบว่า $index อยู่ในช่วงของรายการสินค้าในตะกร้าหรือไม่
        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // รีเซ็ตคีย์ของ array
            session()->set('cart', $cart);
        }

        return redirect()->back()->with('message', 'สินค้าถูกลบออกจากตะกร้าเรียบร้อยแล้ว');
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
            'quantity'   => $quantity
        ];
        $cartModel->save($data);

        return redirect()->back()->with('message', 'สินค้าได้ถูกเพิ่มลงในตะกร้าเรียบร้อยแล้ว');
    }

    public function SubmitCreate()
    {


        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $user_id = $this->request->getPost('user_id');
        $productId = $this->request->getPost('product_id');
        $quantity = 1;


        $insertData = array(
            'user_id' => $user_id,
            'product_id' => $productId,
            'quantity' => $quantity
        );


        $productModel = new CartModel();
        $insert = $productModel->insert($insertData);

        // if ($insert)
        // {
        //     return (new Template())->Render('shop/add',
        //         array(
        //             'title' => 'เพิ่มสินค้า',
        //             'error' => false,
        //             'message' => 'เพิ่มสินค้าเรียบร้อยแล้ว'
        //         )
        //     );
        // }

        // return (new Template())->Render('shop/add',
        //     array(
        //         'title' => 'เพิ่มสินค้า',
        //         'error' => true,
        //         'message' => 'เพิ่มสินค้าไม่สำเร็จ'
        //     )
        // );
        return redirect()->to('shop');
    }

    // public function remove($product_id) {
    //     $cartModel = new \App\Models\CartModel();
    
    //     // ตรวจสอบว่ามีข้อมูลอยู่ในตะกร้าหรือไม่
    //     $cartItem = $cartModel->where('product_id', $product_id)->first();
    
    //     if ($cartItem) {
    //         // ลบรายการที่มี product_id ที่ตรงกัน
    //         $cartModel->where('product_id', $product_id)->delete();
    
    //         // ส่ง JSON response กลับไปที่ AJAX
    //         return $this->response->setJSON(['status' => 'success']);
    //     } else {
    //         // ส่ง JSON response กลับไปที่ AJAX ถ้าไม่พบ product_id
    //         return $this->response->setJSON(['status' => 'error']);
    //     }
    // }
}
