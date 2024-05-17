<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts()
    {
        $items = Products::get();
        return view('product.view', compact('items'));
    }
    public function addProduct()
    {
        $categories = Categories::get();
        return view('product.add', compact('categories'));
    }

    public function createProduct(Request $request)
    {
        $image = $this->uploadFile($request->image, 'product/');
        Products::create([
            'name' => $request->name,
            'image' => $image,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('products')->with($notification);
    }

    public function editProduct($id)
    {
        $categories = Categories::get();
        $item = Products::where('id', $id)->first();
        return view('product.edit', compact('item', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $item = Products::where('id', $id)->first();
        if ($item) {
            $image = $this->uploadFile($request->image, 'product/', 'unlink', $item->image);
            $item->update([
                'name' => $request->name,
                'image' => $image,
                'short_content' => $request->short_content,
                'content' => $request->content,
                'category_id' => $request->category_id,
            ]);
            $notification = array(
                'message' => 'Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('products')->with($notification);
        }
    }

    public function deleteProduct($id)
    {
        $item = Products::where('id', $id)->first();
        $this->uploadFile(null, 'product/', 'delete', $item->image);
        $item->delete();
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('products')->with($notification);
    }
}
