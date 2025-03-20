<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function convert(Request $req, $type ,$phone)
    {
        dd($type, $phone);
    }

    public function index(Request $req)
    {
        if ($req->openExternalBrowser == null) {
            return redirect(url("/index?openExternalBrowser=1"));
        }

        return view("index");
    }
}
