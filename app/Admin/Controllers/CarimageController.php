<?php

namespace App\Admin\Controllers;

use App\Carimage;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CarimageController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('车型图库');
            $content->description('车型图库页面');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('车型图库编辑');
            $content->description('车型图库编辑页面');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('车型图片添加');
            $content->description('车型图片添加页面');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Carimage::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '车型');
            $grid->column('exteriorimg', '外观图片');
            $grid->column('interiorimg', '内饰图片');

            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('更新时间')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Carimage::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '车型');
            $form->text('exteriorimg', '外观图片');
            $form->text('interiorimg', '内饰图片');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
