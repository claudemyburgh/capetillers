<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateFormrequest;
use App\Product;
use Illuminate\Http\Request;
use Plank\Mediable\MediaUploader;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }


    public function list()
    {
        $products = Product::paginate(20);

        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        if (!$product->exists) {
             $product = $this->createAndReturnSkeletonProduct();

             return redirect()->route('admin.product.create', [$product]);       
        }
        $categories = Category::get();
        return view('admin.products.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateFormrequest $request, Product $product)
    {

        $request->validate([
            'sku' => 'required|string|unique:products,sku,' .$product->id,
            'name' => 'required|string|unique:products,name,' . $product->id
        ]);

 
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->excerpt = $request->excerpt;
        $product->content = $request->content;
        $product->availability = $request->availability;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->salesprice = $request->salesprice;
        $product->live = ($request->live == 'on') ? true : false;
        $product->onsale = ($request->onsale == 'on') ? true : false;
        $product->save();
        
        return redirect()->route('admin.product.create', $product)->withSuccess('Updated successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function createAndReturnSkeletonProduct()
    {
        return Product::create([
            'sku' => uniqid(true),
            'name' => 'Untitiled' . ' ' . uniqid(true),
            'excerpt' => '',
            'description' => '',
            'availability' => 'instock',
            'category_id' => '1',
            'live' => false,
            'onsale' => false,
        ]);
    }



}
