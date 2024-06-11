<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Webcontent;


class WebContentController extends Controller
{
    public function index()
    {
        $content = Webcontent::first();
        return view('backend.page.webcontent.index', ['content' => $content]);
    }

    public function storeOrUpdate(Request $request)
    {
        $content = Webcontent::first();
        // dd($request->all());

        if ($content) {
            // If the record exists, update it
            $content->scrolling = $request->input('scrolling');
            $content->text = $request->input('text');
            $content->footer = $request->input('footer');
            $content->cardup = $request->input('cardup');
            $content->bangla_scrolling = $request->input('bangla_scrolling');
            $content->bangla_text = $request->input('bangla_text');
            $content->bangla_footer = $request->input('bangla_footer');
            $content->bangla_cardup = $request->input('bangla_cardup');
            $content->save();
            $message = 'Content data updated successfully!';
        } else {

            $content = new Webcontent();
            $content->scrolling = $request->input('scrolling');
            $content->text = $request->input('text');
            $content->footer = $request->input('footer');
            $content->cardup = $request->input('cardup');
            $content->bangla_scrolling = $request->input('bangla_scrolling');
            $content->bangla_text = $request->input('bangla_text');
            $content->bangla_footer = $request->input('bangla_footer');
            $content->bangla_cardup = $request->input('bangla_cardup');
            $content->save();
            $message = 'Content data saved successfully!';
        }

        return redirect()->route('webcontent.index')->with('success', $message);
    }
// 
    public function webcontentApi()
    {
        try {
            $content = Webcontent::first();
            if (!$content) {
                return response()->json(['message' => 'Web content not found'], 404);
            }
            return response()->json(['message' => 'Web content retrieved successfully', 'content' => $content], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve web content', 'error' => $e->getMessage()], 500);
        }
    }
}
