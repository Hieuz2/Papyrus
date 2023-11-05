<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        // Logic để thêm sản phẩm vào giỏ hàng
        $cart = new Cart();
        $cart->user_id = auth()->user()->id; // Thay thế auth()->user()->id bằng user_id thực tế
        $cart->product_id = $request->product_id;
        $cart->quantity = 1;
        $cart->category_id = $request->category_id;
        $cart->save();

        return redirect()->route('show.cart')->with('thongbao', 'thêm sản phẩm thành công ');

        // Return view trả về thông báo thành công
    }

    public function removeFromCart(Request $request)
    {
        // Logic để xóa sản phẩm khỏi giỏ hàng
        $user_id = auth()->user()->id; // Thay thế auth()->user()->id bằng user_id thực tế
        $product_id = $request->product_id;

        Cart::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        // Return view trả về thông báo xóa thành công
        return view('carts', compact('cart'))->with('thongbao', 'xóa sản phẩm thành công ');
    }

    public function showCart()
    {
        $user_id = auth()->user()->id; // Lấy ID của người dùng hiện tại
        $cartItems = Cart::where('user_id', $user_id)->get(); // Lấy danh sách sản phẩm trong giỏ hàng của người dùng

        $total_amount = 0;
        $total_tong =0;

        foreach ($cartItems as $item) {
            $total_amount = $item->product->price * $item->quantity; // Tính tổng giá trị
            $total_tong += $total_amount;
        }

        return view('carts', [
            'cartItems' => $cartItems, // Truyền danh sách sản phẩm trong giỏ hàng đến view
            'total_amount' => $total_amount,
            'total_tong' => $total_tong
        ]);
    }
}
