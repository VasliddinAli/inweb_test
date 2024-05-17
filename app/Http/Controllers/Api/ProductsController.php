<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
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
        return $this->sendResponse(null, true, "Created successfully!");
    }
    public function getProducts()
    {
        $products = Products::get();
        return $this->sendResponse($products, true, "");
    }
    public function productDetail($id)
    {
        $product = Products::where('id', $id)->first();
        if ($product) {
            return $this->sendResponse($product, true, "");
        } else {
            return $this->sendResponse(null, false, "Product is undefined!");
        }
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        if ($product) {
            $image = $this->uploadFile($request->image, 'product/', 'unlink', $product->image);
            $product->update([
                'name' => $request->name,
                'image' => $image,
                'short_content' => $request->short_content,
                'content' => $request->content,
                'category_id' => $request->category_id,
            ]);
            return $this->sendResponse(null, true, "Updated successfully!");
        } else {
            return $this->sendResponse(null, false, "Product is undefined!");
        }
    }
    public function deleteProduct($id)
    {
        $product = Products::where('id', $id)->first();
        if ($product) {
            $this->uploadFile(null, 'product/', 'delete', $product->image);
            $product->delete();
            return $this->sendResponse(null, true, "Deleted successfully!");
        } else {
            return $this->sendResponse(null, false, "Product is undefined!");
        }
    }
}
