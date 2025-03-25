<?php
namespace App\Http\Controllers;
use App\Models\Sign;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function convert(Request $req, $type ,$phone)
    {
       // dd($type, $phone);
        $sign = session('phone');

        if (!$sign) {
            return response()->json([
                "code"=> 0,
                "message"=> "登入已過期，請重新登入!",
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        }

        $sign->{"no$type"} = 1;
        $sign->save();

        session(['phone'=>$sign]);

        return response()->json([
            "code"=> 1,
            "message"=> "成功",
        ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }

    public function index(Request $req)
    {
        if ($req->openExternalBrowser == null) {
            return redirect(url("/index?openExternalBrowser=1"));
        }


        $sign = session('phone');

        if ($sign) {
            return redirect(url("/level?openExternalBrowser=1"));
        }

        return view("index");
    }

    public function toLevel(Request $req)
    {
        $sign = null;

        if ($req->phone) { //帶手機號碼進入
            $sign = Sign::where('phone' , $req->phone)->first();



            if (!$sign) {
                $sign =  new Sign();
                $sign->$req->phone;
                $sign->save();
            }

            session(['phone'=>$sign]);
        }

        return redirect(url("/level"));
    }

    public function level(Request $req)
    {
        $sign = session('phone');
        //dd("level",$sign);
        if (!$sign) {
            return redirect(url("/index?openExternalBrowser=1"));
        }

        return view("level" ,["sign" => $sign]);
    }

    public function programme(Request $req)
    {
        return view("programme");
    }

    public function map(Request $req)
    {
        return view("map");
    }
}
