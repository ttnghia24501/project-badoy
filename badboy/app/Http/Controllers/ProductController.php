<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use File;

class ProductController extends Controller
{
    public function listProduct(){
        $products = Products::paginate(10);
        return view("backend.product.list",compact('products'));
    }

    public function newProduct(){
        return view("backend.product.new");
    }


    public function saveProduct(Request $request){
//        dd($request->all());
        $request->validate([

            "product_name"=>"required|string",
            "product_description"=>"required|string",
            "price"=>"required|numeric",
            "sale_price"=>"required",
            "new"=>"required",
            "status"=>"required",
            "ingredient"=>"required|string"
            ],[
            "product_name.required"=>"Tên sản phẩm không được để trống..",
            "product_name.string"=>"Tên sản phẩm phải là kiểu chuỗi",
            "product_description.required"=>"mô tả sản phảm không được để trống.. ",
            "product_description.string"=>"Mô tả phải là kiểu chuỗi",
            "price.required"=>"Giá tiền không được để trống",
            "price.number"=>"Giá tiền phải là kiểu số",
            "sale_price.required"=>"Khuyến mãi đấy mấy ông mãnh bà cô",
            "new.required"=>"Sẩn phẩm mơi",
            "status.required"=>"Cho cửa hàng biết của bánh",
            "ingredient"=>"thành phần không được để trống...",
            "ingredient.string"=>"thành phần phải là kiểu chuỗi",

        ]);
        $image = "";
        if ($request->hasFile("product_avatar")){
            $file = $request->__get("product_avatar");
            $image = $file->getClientOriginalName();
            $file->move(public_path("upload"),$image);
        }
//        dd($image);
        Products::create([

            "product_name"=>$request->get("product_name"),
            "product_avatar"=>$image,
            "product_description"=>$request->get("product_description"),
            "price"=>$request->get("price"),
            "sale_price"=>$request->get("sale_price"),
            "new"=>$request->get("new"),
            "status"=>$request->get("status"),
            "ingredient"=>$request->get("ingredient"),
            "id_type"=>$request->get("id_type")
        ]);

        try {
            if($request->hasFile('image')){
                $file = $request->file('image');
                $allow = ['png','jpg','jpeg','gif'];
                $extName = $file->getClientOriginalExtension();
                if(in_array($extName,$allow)){
                    $file_name = time().$file->getClientOriginalName();
                    $file->move(public_path('upload'),$file_name);
                    $image = 'upload/'.$file_name;
                }
            }


        }catch (\Exception $exception){
            return redirect()->back("admin/product/newProduct");
        }
        return  redirect()->route("listPro")->with("thongbao","Thêm sản phẩm thành công");
    }
    public function check($id)
    {
        $product = Products::findOrFail($id);
        return view('backend.product.check',compact('product'));
    }
    //edit
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view("backend.product.edit",compact('product'));
    }
    //update
    public function update($id,Request $request)
    {
        $random = Str::random(4);
        $product = Products::findOrFail($id);

        $request->validate([

            "product_name"=>"required|string",
            "product_description"=>"required|string",
            "price"=>"required|numeric",
            "sale_price"=>"required",
            "new"=>"required",
            "status"=>"required",
            "ingredient"=>"required|string"
        ],[
            "product_name.required"=>"Tên sản phẩm không được để trống..",
            "product_name.string"=>"Tên sản phẩm phải là kiểu chuỗi",
            "product_description.required"=>"mô tả sản phảm không được để trống.. ",
            "product_description.string"=>"Mô tả phải là kiểu chuỗi",
            "price.required"=>"Giá tiền không được để trống",
            "price.number"=>"Giá tiền phải là kiểu số",
            "sale_price.required"=>"Khuyến mãi đấy mấy ông mãnh bà cô",
            "new.required"=>"Sẩn phẩm mơi",
            "status.required"=>"Cho cửa hàng biết của bánh",
            "ingredient"=>"thành phần không được để trống...",
            "ingredient.string"=>"thành phần phải là kiểu chuỗi",

        ]);
        if ($request->hasFile('image')){
            $file = $request->image;
            $image = $file->getClientOriginalName();
            if (!is_null("upload/product/".$product->__get("image"))){
                unlink("upload/product/".$product->__get("image"));
            }
            $anh = $random."_".$image;
            while (file_exists("upload".$anh)){
                $anh = $random."_".$image;
            }
            $file->move(base_path("public/upload"),$anh);
            $image = 'upload/'.$anh;
        }else{
            $image = $product->__get('product_avatar');
        }
        try {
            $product->product_name = $request->get("product_name");
            $product->product_avatar = $image;
            $product->product_description = $request->get("product_description");
            $product->price = $request->get("price");
            $product->sale_price = $request->get("sale_price");
            $product->new = $request->get("new");
            $product->status = $request->get("status");
            $product->ingredient = $request->get("ingredient");
            $product->save();
        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->route('listPro')->with("thong_bao","Cập nhật thành công....");

    }
    //delete
    public function delete($id)
    {
        $product =  Products::findOrFail($id);


        try {
            $product->delete();
            if (is_null("upload/product/".$product->__get("image"))){
            }else{
                unlink("upload/product/".$product->__get("image"));
            }
        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->route("product")->with("thong_bao","Xóa Product thành công.....");
    }

}
