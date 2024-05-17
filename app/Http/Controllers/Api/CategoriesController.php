<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function createCategory(Request $request)
    {
        $image = $this->uploadFile($request->image, 'category/');
        Categories::create([
            'title' => $request->title,
            'image' => $image,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'created_at' => Carbon::now()
        ]);
        return $this->sendResponse(null, true, "Created successfully!");
    }
    public function getCategories()
    {
        $categories = Categories::get();
        return $this->sendResponse($categories, true, "");
    }
    public function categoryDetail($id)
    {
        $category = Categories::where('id', $id)->first();
        if ($category) {
            return $this->sendResponse($category, true, "");
        } else {
            return $this->sendResponse(null, false, "Category is undefined!");
        }
    }
    public function updateCategory(Request $request, $id)
    {
        $category = Categories::where('id', $id)->first();
        if ($category) {
            $image = $this->uploadFile($request->image, 'category/', 'unlink', $category->image);
            $category->update([
                'title' => $request->title,
                'image' => $image,
                'short_content' => $request->short_content,
                'content' => $request->content,
            ]);
            return $this->sendResponse(null, true, "Updated successfully!");
        } else {
            return $this->sendResponse(null, false, "Category is undefined!");
        }
    }
    public function deleteCategory($id)
    {
        $category = Categories::where('id', $id)->first();
        if ($category) {
            $this->uploadFile(null, 'category/', 'delete', $category->image);
            $category->delete();
            return $this->sendResponse(null, true, "Deleted successfully!");
        } else {
            return $this->sendResponse(null, false, "Category is undefined!");
        }
    }
}
