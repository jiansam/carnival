<?php
namespace App\Admin\Actions;

use Dcat\Admin\Grid\Tools\AbstractTool;
use Illuminate\Http\Request;

class ToolLinkButton extends AbstractTool
{
    protected $selector = '.import-post';

    protected $href;
    protected $text;
    protected  $is_blank;
    protected  $style;

    public function __construct($text ,  $href ,   $is_blank =false, $style='primary'){
        $this->href =$href;
        $this->text = $text;
        $this->is_blank = $is_blank;
        $this->style = $style;
    }


    public function handle(Request $request)
    {
        // $request ...

        return $this->response()->success('Excel export success');
    }

    public function html()
    {   $blank="";
        if($this->is_blank) {
         $blank = "target='_blank'";
        }


        return "<a href='$this->href' $blank  class='btn btn-$this->style'>$this->text</a>";
    }
}