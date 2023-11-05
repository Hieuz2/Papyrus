<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::paginate(8);
        return view('login',compact('products'))->with('i', (request()->input('page',1)-1)*8);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.AddProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Products::create($request->all());
        return redirect()->route('products.adminIndex')->with('thongbao','thêm sản phẩm thành công ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('admin.EditProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $product->update($request->all());
        return redirect()->route('products.adminIndex')->with('thongbao','sửa sản phẩm thành công ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.adminIndex')->with('thongbao','xóa sản phẩm thành công ');
    }

    public function adminIndex() {
        $Products = Products::paginate(5);
        return view('admin.ProductsManagement',compact('Products'))->with('i', (request()->input('page',1)-1)*5);
    }

    public function apiGetMoreProducts(Request $request)
    {
        $perPage = 4;
        $products = Products::paginate($perPage);
    
        return response()->json($products);
    }

    public function indexHome()
    {
        $products = Products::paginate(9);
        return view('home',compact('products'))->with('i', (request()->input('page',1)-1)*9);
    }

    public function indexHomeUser()
    {
        $products = Products::paginate(9);
        return view('homeUser',compact('products'))->with('i', (request()->input('page',1)-1)*9);
    }

    public function indexHomeAdmin()
    {
        $products = Products::paginate(9);
        return view('homeAdmin',compact('products'))->with('i', (request()->input('page',1)-1)*9);
    }
}
