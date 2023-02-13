<?php

namespace App\Http\Controllers;
// namespace App\Models\Category;

use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    public function view_category(){
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data = new category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message','category added successfully');

    }

    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message','category deleted successfully');

    }

    public function view_product(){
        $data = category::all();
        return view('admin.product', compact('data'));
    }

    public function add_product(Request $request){
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->descount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message','Product added successfully');

    }

        public function show_product(){
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id){
        $data = product::find($id);
        if($data->image){
            $img = "product/".$data->image;
            File::delete($img);
        }
        $data->delete();
        return redirect()->back()->with('message','product deleted successfully');

    }

   public function update_product($id){
    $product = product::find($id);
    $category = category::all();
    return view('admin.update_product', compact('product','category'));
   }

       public function update_product_submission(Request $request,$id){
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->descount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if($request->image)
        {
            $img = "product/".$product->image;
            File::delete($img);
            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);

            $product->image = $imagename;
        }
        

        $product->save();

        return redirect()->back()->with('message','Product updated successfully');

    }

}
