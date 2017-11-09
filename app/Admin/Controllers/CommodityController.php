<?php

namespace App\Admin\Controllers;

use App\Commodity;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommodityController extends Controller
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

            $content->header('汽车商品');
            $content->description('汽车商品页面');

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

            $content->header('汽车商品编辑');
            $content->description('汽车商品编辑页面');

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

            $content->header('汽车商品添加');
            $content->description('汽车商品添加页面');

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
        return Admin::grid(Commodity::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('class', '商品分类');
            $grid->column('name', '商品名称');
            $grid->column('img', '商品图片');
            $grid->column('price', '商品价格');
            $grid->column('details', '商品详情');

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
        return Admin::form(Commodity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('class', '商品分类');
            $form->text('name', '商品名称');
            $form->text('img', '商品图片');
            $form->text('price', '商品价格');
            $form->text('details', '商品详情');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
