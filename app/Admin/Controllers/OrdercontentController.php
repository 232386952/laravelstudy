<?php

namespace App\Admin\Controllers;

use App\Ordercontent;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrdercontentController extends Controller
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

            $content->header('订单内容');
            $content->description('订单内容页面');

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

            $content->header('订单编辑');
            $content->description('订单编辑页面');

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

            $content->header('订单创建');
            $content->description('订单创建页面');

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
        return Admin::grid(Ordercontent::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户名');
            $grid->column('ordernum', '订单号');
            $grid->column('productid', '商品ID');
            $grid->column('productquantity', '商品数量');
            $grid->column('price', '商品价格');

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
        return Admin::form(Ordercontent::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户名');
            $form->text('ordernum', '订单号');
            $form->text('productid', '商品ID');
            $form->text('productquantity', '商品数量');
            $form->text('price', '商品价格');


            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
