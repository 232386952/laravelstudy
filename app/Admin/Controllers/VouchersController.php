<?php

namespace App\Admin\Controllers;

use App\Vouchers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class VouchersController extends Controller
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

            $content->header('代金券管理');
            $content->description('代金券管理页面');

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

            $content->header('代金券编辑');
            $content->description('代金券编辑页面');

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

            $content->header('代金券添加');
            $content->description('代金券添加页面');

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
        return Admin::grid(Vouchers::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户名');
            $grid->column('name', '代金券名称');
            $grid->column('content', '代金券内容');
            $grid->column('amount', '代金券金额');
            $grid->column('time', '有效时间');
            $grid->column('type', '代金券类型');
            $grid->column('status', '代金券状态');
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
        return Admin::form(Vouchers::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户名');
            $form->text('name', '代金券名称');
            $form->text('content', '代金券内容');
            $form->text('amount', '代金券金额');
            $form->text('time', '有效时间');
            $form->text('type', '代金券类型');
            $form->text('status', '代金券状态');


            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}