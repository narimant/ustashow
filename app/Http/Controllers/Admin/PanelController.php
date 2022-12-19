<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function CkUploadImage()
    {
        $this->validate(request(),[
            'upload'=>'required|mimes:jpg,png,bmp',
        ]);
        $year=Carbon::now()->year;
        $uploadurl="/upload/images/{$year}/";
        $file=request()->file('upload');
        $filename=$file->getClientOriginalName();

        if(file_exists(public_path($uploadurl).$filename))
        {
            $filename=Carbon::now()->timestamp.$filename;
        }

        $file->move(public_path($uploadurl),$filename);
        $url=$uploadurl.$filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
    }
}
