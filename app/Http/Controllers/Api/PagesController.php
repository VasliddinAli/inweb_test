<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function createPage(Request $request)
    {
        Pages::create([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'created_at' => Carbon::now()
        ]);
        return $this->sendResponse(null, true, "Created successfully!");
    }
    public function getPages()
    {
        $pages = Pages::get();
        return $this->sendResponse($pages, true, "");
    }
    public function pageDetail($id)
    {
        $page = Pages::where('id', $id)->first();
        if ($page) {
            return $this->sendResponse($page, true, "");
        } else {
            return $this->sendResponse(null, false, "Page is undefined!");
        }
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
            return $this->sendResponse(null, true, "Updated successfully!");
        } else {
            return $this->sendResponse(null, false, "Page is undefined!");
        }
    }
    public function deletePage($id)
    {
        $page = Pages::where('id', $id)->first();
        if ($page) {
            $page->delete();
            return $this->sendResponse(null, true, "Deleted successfully!");
        } else {
            return $this->sendResponse(null, false, "Page is undefined!");
        }
    }
}
