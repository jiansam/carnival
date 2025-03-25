<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */


Admin::style('img { max-width: 100%; height: auto !important;}');

Form::resolving(function (Form $form) {

    $form->disableEditingCheck();

    $form->disableCreatingCheck();

    $form->disableViewCheck();

    $form->tools(function (Form\Tools $tools) {

        $tools->disableView();

    });
});



    Grid::resolving(function (Grid $grid) {

        //$grid->disableActions();

        // $grid->disablePagination();

        // $grid->disableCreateButton();

        // $grid->disableFilter();

        // $grid->disableRowSelector();

        // $grid->disableColumnSelector();

        // $grid->disableTools();

        //$grid->disableExport();

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
        });
    });