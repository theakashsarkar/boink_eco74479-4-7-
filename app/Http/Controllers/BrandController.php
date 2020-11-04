<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
  public function addBrand()
  {
      return view('admin/Brand/add-brand');
  }
  public function manageBrand()
  {
     $brand = Brand::all();
     return view('admin.Brand.manage-brand', ["brands" => $brand]);
  }
  public function brandSave(Request $request)
  {
    $brand = new Brand();
    $brand->brand_name = $request->brand_name;
    $brand->brand_description = $request->brand_description;
    $brand->publication_status = $request->publication_status;
    $brand->save();
    return redirect('/add/brand')->with('message','brand save');
  }
  public function unpublic($id)
  {
     $brand = Brand::find($id);
     $brand->publication_status = 0;
     $brand->save();
     return redirect('manage/brand')->with('message','unpublic');
  }
  public function public($id)
  {
    $brand = Brand::find($id);
    $brand->publication_status = 1;
    $brand->save();
    return redirect('manage/brand')->with('message','public');
  }
  public function editBrand($id)
  {
    $brand = Brand::find($id);
    return view('admin.Brand.edit-brand',['brand' => $brand]);
  }
  public function deleteBrand($id)
  {
      $brand = Brand::find($id);
      $brand->delete();
      return redirect('/manage/brand')->with('message','Brand Delate');
  }
  public function updateBrand($request)
  {
    $brand                     =  Brand::find($request->brand_id);
    $brand->brand_name         = $request->brand_name;
    $brand->brand_description  = $request->brand_description;
    $brand->publication_status = $request->publication_status;
    $brand->save();
    return redirect('/manage/brand')->with('message','update brand info');
  }
  public function saveUpdateBrand(Request $request)
  {
    $this->updateBrand($request);
  }
}