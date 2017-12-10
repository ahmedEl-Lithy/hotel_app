<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContentsController extends Controller
{
    //
    public function home(Request $request)
    {
        return view('index');
    }

    public function upload(Request $request)
    {
        $data = [];
        if( $request->isMethod('post') )
        {
            $this->validate(
                $request,
                [
                    'image_upload' => 'mimes:jpeg,bmp,png'
                ]
            );
            Input::file('image_upload')->move('images', 'attractions.jpg');
            return redirect('/');
        }
        return view('contents/upload', $data);
    }
}
