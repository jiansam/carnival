<?php
namespace App\Http\Controllers;
use App\Models\Sign;
use Illuminate\Http\Request;


class PageController extends Controller
{
   const TYPES = [
       "12fbd294-cea7-7918-732c-331fef15e4b4"=>1,
       "251af113-5889-92d3-6680-70ae1d472344"=>2,
       "3774cf35-62ff-4b20-b950-756f51927aab"=>3,
       "4e8bc10a-f901-c352-4e70-097edfd34743"=>4,
       "56de0ac2-e64b-0aa0-e7de-df60a119f8aa"=>5,
       "639854b3-fe4f-799c-022e-a0032e1d2e90"=>6,
       "7c211bd1-00df-3ce3-7d3a-6678fc41ef59"=>7,
       "88be2eb2-bf1f-b7e8-9649-598563935d95"=>8,
       "927ddfee-9740-7d96-1878-2f0bdbe490a2"=>9,
   ];




   public function managerConvert(Request $req, $type ,$phone)
   {
       $sign =  Sign::where('phone' , $phone)->first();

       if (!$sign) {
           return response()->json([
               "code"=> 0,
               "message"=> "此手機號碼無登入資料!",
           ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

       }

       if (!isset(PageController::TYPES[$type])) {
           return response()->json([
               "code"=> 0,
               "message"=> "代碼類別錯誤!",
           ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

       }

       $tindex =PageController::TYPES[$type];


        /*
       if ($sign->{"no$tindex"} ==1) {
           return response()->json([
               "code"=> 0,
               "message"=> "重複掃碼!",
           ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
       }*/

       $sign->{"no$tindex"} = 1;

       $sign->save();

       // session(['phone'=>$sign]);

       return response()->json([
           "code"=> 1,
           "message"=> "掃碼成功",
       ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

   }

    public function convert(Request $req, $type ,$phone)
    {

        $sign =  Sign::where('phone' , $phone)->first();

        if (!$sign) {
            return response()->json([
                "code"=> 0,
                "message"=> "此手機號碼無登入資料!",
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        }

        if (!isset(PageController::TYPES[$type])) {
            return response()->json([
                "code"=> 0,
                "message"=> "代碼類別錯誤!",
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        }

        $tindex =PageController::TYPES[$type];

        //dd(PageController::TYPES[$type] , $tindex);

        if ($sign->{"no$tindex"} ==1) {
            return response()->json([
                "code"=> 0,
                "message"=> "重複掃碼!",
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $sign->{"no$tindex"} = 1;

        $sign->save();

        $status = $this->getStatus($sign);

       // session(['phone'=>$sign]);

        return response()->json([
            "code"=> 1,
            "status"=>$status,
            "message"=> "掃碼成功",
        ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }


    public function getStatus($sign){
        if ($sign->no9 ==1) {
            return "disabled";
        }

        $count =0;
        for ($i = 1; $i <= 8; $i++) {
            $count += $sign->{"no$i"};
        }

        if ($count >=6) {
            return "default";
        } else {
            return "";
        }
    }

    public function index(Request $req)
    {
        if ($req->openExternalBrowser == null) {
            return redirect(url("/index?openExternalBrowser=1"));
        }

        /*
        $phone = session('phone');

        if ($phone) {
            return redirect(url("/level?openExternalBrowser=1"));
        }*/

        return view("index");
    }

    public function toLevel(Request $req)
    {
        $sign = null;

        if ($req->phone) { //帶手機號碼進入
            $sign = Sign::where('phone' , $req->phone)->first();

            if (!$sign) {
                $sign =  new Sign();
                $sign->phone = $req->phone;
                $sign->save();
            }

            session(['phone'=>$req->phone]);
            return redirect(url("/level"));
        }
        return redirect(url("/index?openExternalBrowser=1"));
    }

    public function level(Request $req)
    {
        $phone = session('phone');

        $sign =  Sign::where('phone' , $phone)->first();

        if (!$sign) {
            return redirect(url("/index?openExternalBrowser=1"));
        }


        $status = $this->getStatus($sign);

        return view("level" ,["sign" => $sign , "status" =>$status]);
    }

    public function programme(Request $req)
    {
        return view("programme");
    }

    public function map(Request $req)
    {
        return view("map");
    }

    public function manager(Request $req)
    {
        return view("manager");
    }
    public function manager9(Request $req)
    {
        return view("manager9");
    }
}
