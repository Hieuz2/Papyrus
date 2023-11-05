<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    
    public function purchasePage()
    {
        return view('homeUser');
    }

    public function purchaseItem(Request $request)
    {
        // Xử lý khi người dùng mua hàng
    }
}
