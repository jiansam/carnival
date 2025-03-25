<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\ToolLinkButton;
use App\Admin\Export\ExcelExpoter;
use App\Admin\Repositories\Sign;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Maatwebsite\Excel\Facades\Excel;

class SignController extends AdminController
{
    protected $title ="報名明細管理";

    public function export()
    {
        $date = date('YmdHis', time());
        return Excel::download(new ExcelExpoter,  "報名明細_$date.xlsx");
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Sign(), function (Grid $grid) {
            $grid->disableCreateButton();
            $grid->disableActions();

            $grid->column('phone');
            $grid->column('no1')->bool();
            $grid->column('no2')->bool();
            $grid->column('no3')->bool();
            $grid->column('no4')->bool();
            $grid->column('no5')->bool();
            $grid->column('no6')->bool();
            $grid->column('no7')->bool();
            $grid->column('no8')->bool();
            $grid->column('no9')->bool();

            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new ToolLinkButton("匯出" ,url("admin/sign/export"), true));
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('phone');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Sign(), function (Show $show) {
            $show->field('id');
            $show->field('phone');
            $show->field('no1');
            $show->field('no2');
            $show->field('no3');
            $show->field('no4');
            $show->field('no5');
            $show->field('no6');
            $show->field('no7');
            $show->field('no8');
            $show->field('no9');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Sign(), function (Form $form) {
            $form->display('id');
            $form->text('phone');
            $form->text('no1');
            $form->text('no2');
            $form->text('no3');
            $form->text('no4');
            $form->text('no5');
            $form->text('no6');
            $form->text('no7');
            $form->text('no8');
            $form->text('no9');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
