<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Brand;
use App\category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function addProduct(){
        $brands = Brand::where('publication_status',1)->get();
        $categories = category::where('publication_status',1)->get();
        return view('admin.Product.add-product',['categories' => $categories, 'brands' => $brands]);
    }
    public function productInfoValidate($request){
        $this->validate($request,[
            'product_name'      => 'required',
            'product_quantity'  => 'required',
            'product_price'     => 'required',
            'short_description' => 'required',
            'long_description'  => 'required'
        ]);
    }
    public function productImageUpload($request){
        $productImage = $request->file('product_image');
        $fillType     = $productImage->getClientOriginalExtension();
//        $imageName    = $productImage->getClientOriginalName();
        $imageName    = $request->product_name.".".$fillType;
        $directory     = 'product-image/';
        $imageUrl     = $directory.$imageName;
        Image::make($productImage)->resize(300, 200)->save($imageUrl,90);
        // $productage->move($directory,$imageName);
        return $imageUrl;
    }
    public function  saveProductInfo($request, $imageUrl){
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id    = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->quantity      = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image      = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }
    public function saveProduct(Request $request)
    {
        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductInfo($request, $imageUrl);
        return redirect('/add/product')->with('message','product add successfull');
    }
    public function manageProduct(){
        $products = DB::table('products')
                            ->join('categories','products.category_id',"=",'categories.id')
                            ->join('brands','products.brand_id',"=",'brands.id')
                            ->select('products.*','categories.category_name','brands.brand_name')
                            ->get();
        return view('admin.Product.manage-product',['products' => $products]);
    }
    public function Unpublic($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('manage/product')->with('message','products unpublished');
    }
    public function Public($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('manage/product')->with('message','products published');
    }

}
