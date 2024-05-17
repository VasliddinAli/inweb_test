<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getPages()
    {
        $pages = Pages::get();
        return view('pages.view', compact('pages'));
    }
    public function addPage()
    {
        return view('pages.add');
    }

    public function createPage(Request $request)
    {
        Pages::create([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'created_at' => Carbon::now()
        ]);
            $notification = array(
                'message' => 'Added successfully!',
                'alert-type' => 'success'
            );
        return redirect()->route('pages')->with($notification);
    }

    public function editPage($id)
    {
        $page = Pages::where('id', $id)->first();
        return view('pages.edit', compact('page'));
    }

    public function updatePage(Request $request, $id)
    {
        $page = Pages::where('id', $id)->first();
        if ($page) {
            $page->update([
                'title' => $request->title,
                'short_content' => $request->short_content,
                'content' => $request->content,
            ]);
            $notification = array(
                'message' => 'Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('pages')->with($notification);
        }
    }

    public function deletePage($id)
    {
        $page = Pages::where('id', $id)->first();
        $page->delete();
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('pages')->with($notification);
    }
}
