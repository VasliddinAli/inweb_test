<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $items = Categories::get();
        return view('category.view', compact('items'));
    }
    public function addCategory()
    {
        return view('category.add');
    }

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
        $notification = array(
            'message' => 'Added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('categories')->with($notification);
    }

    public function editCategory($id)
    {
        $item = Categories::where('id', $id)->first();
        return view('category.edit', compact('item'));
    }

    public function updateCategory(Request $request, $id)
    {
        $item = Categories::where('id', $id)->first();
        if ($item) {
            $image = $this->uploadFile($request->image, 'category/', 'unlink', $item->image);
            $item->update([
                'title' => $request->title,
                'image' => $image,
                'short_content' => $request->short_content,
                'content' => $request->content,
            ]);
            $notification = array(
                'message' => 'Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('categories')->with($notification);
        }
    }

    public function deleteCategory($id)
    {
        $item = Categories::where('id', $id)->first();
        $this->uploadFile(null, 'category/', 'delete', $item->image);
        $item->delete();
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('categories')->with($notification);
    }
}
