<?php
namespace App\Admin\Export;


use App\Models\Sign;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExpoter   implements FromArray,ShouldAutoSize,WithHeadings
{
    protected $fileName = '維修通知列表.xlsx';

    public function headings(): array
    {
        return [
            "帳號	","第一關","第二關","第三關","第四關","第五關","	第六關","第七關","第八關","大禮物(6關)"
        ];

    }

    public function __construct(){

    }


    public function array(): array
    {
         $signs = Sign::all();

         $rows =[];
         $datas =[];
         $datas ["no1"]=0;
         $datas ["no2"]=0;
         $datas ["no3"]=0;
         $datas ["no4"]=0;
         $datas ["no5"]=0;
         $datas ["no6"]=0;
         $datas ["no7"]=0;
         $datas ["no8"]=0;
         $datas ["no9"]=0;

         foreach ($signs as $sign) {

             $datas["no1"] += $sign->no1 ? 1: 0;
             $datas["no2"] += $sign->no2 ? 1: 0;
             $datas["no3"] += $sign->no3 ? 1: 0;
             $datas["no4"] += $sign->no4 ? 1: 0;
             $datas["no5"] += $sign->no5 ? 1: 0;
             $datas["no6"] += $sign->no6 ? 1: 0;
             $datas["no7"] += $sign->no7 ? 1: 0;
             $datas["no8"] += $sign->no8 ? 1: 0;
             $datas["no9"] += $sign->no9 ? 1: 0;

             $rows[] =[
                 "phone"=> $sign->phone,
                 "no1"=> $sign->no1 ? "過關": "未過關",
                 "no2"=> $sign->no2 ? "過關": "未過關",
                 "no3"=> $sign->no3 ? "過關": "未過關",
                 "no4"=> $sign->no4 ? "過關": "未過關",
                 "no5"=> $sign->no5 ? "過關": "未過關",
                 "no6"=> $sign->no6 ? "過關": "未過關",
                 "no7"=> $sign->no7 ? "過關": "未過關",
                 "no8"=> $sign->no8 ? "過關": "未過關",
                 "no9"=> $sign->no9 ? "已領取": "未領取",
             ];

         }

         //加入空白列
         $rows[]=[" "];
         $rows[]=[" "];
         $rows[]=[" "];

         //加入統計資料
         $rows[]=[
             "phone"=>"" ,
             "no1"=>"第一關過關人數" ,
             "no2"=>"第二關過關人數" ,
             "no3"=>"第三關過關人數" ,
             "no4"=>"第四關過關人數",
             "no5"=>"第五關過關人數",
             "no6"=>"第六關過關人數",
             "no7"=>"第七關過關人數",
             "no8"=>"第八關過關人數",
             "no9"=>"大禮物領取人數"
         ];

         $rows[]=[
             "phone"=>"" ,
             "no1"=> $datas['no1']."",
             "no2"=> $datas['no2']."",
             "no3"=> $datas['no3']."",
             "no4"=> $datas['no4']."",
             "no5"=> $datas['no5']."",
             "no6"=> $datas['no6']."",
             "no7"=> $datas['no7']."",
             "no8"=> $datas['no8']."",
             "no9"=> $datas['no9'].""

         ];

         return $rows;

    }



}

