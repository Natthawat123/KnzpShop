<!-- <?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;

class CartController extends BaseController
{
    public function index()
    {
        $cartModel = new CartModel();
        $productModel = new ProductModel();

        $cartItems = $cartModel->getCartItems(session()->get('user_id'));
        $totalPrice = 0;

        foreach ($cartItems as &$item) {
            $product = $productModel->find($item['product_id']);
            $item['name'] = $product['name'];
            $item['price'] = $product['price'];
            $item['image'] = $product['image'];
            $totalPrice += $product['price'] * $item['quantity'];
        }

        return view('cart', ['products' => $cartItems, 'totalPrice' => $totalPrice]);
    }

    public function add($productId)
    {
        $cartModel = new CartModel();
        $userId = session()->get('user_id');
        $cartModel->addProduct($userId, $productId);
        return redirect()->to('/cart');
    }

    public function remove($index)
    {
        $cartModel = new CartModel();
        $cartItems = $cartModel->getCartItems(session()->get('user_id'));
        if (isset($cartItems[$index])) {
            $cartModel->removeProduct($cartItems[$index]['cart_id']);
        }
        return redirect()->to('/cart');
    }

    public function SubmitCreate()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $user_id = $this->request->getPost('user_id');
        $product_id = $this->request->getPost('product_id');
        $quantity = 1;


        $insertData = array(
            'user_id' => $user_id,
            'product_id' => $product_id,
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
}
