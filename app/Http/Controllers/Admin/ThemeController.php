<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function footer()
    {
        $pages=Page::Status()->latest()->paginate(20);
        return view('Admin.site.footerindex',compact('pages'));
    }

    public function footerStore(Request $request)
    {
        $attachToId=$request->attachTo;
        DB::table('pages')->update(['attachTo'=>null]);
        $pages=Page::findOrfail($attachToId);

        foreach ($pages as $page)
        {
                $page->update(['attachTo'=>'footer']);

        }
        return redirect(route('footer.index'));

    }
}
