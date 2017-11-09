<?php

namespace App\Admin\Controllers;

use App\Coupon;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CouponController extends Controller
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

            $content->header('优惠券管理');
            $content->description('优惠券管理页面');

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

            $content->header('优惠券编辑');
            $content->description('优惠券编辑页面');

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

            $content->header('优惠券添加');
            $content->description('优惠券添加页面');

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
        return Admin::grid(Coupon::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户ID');
            $grid->column('name', '优惠券名称');
            $grid->column('content', '优惠券内容');
            $grid->column('amount', '优惠券金额');
            $grid->column('time', '优惠券有效时间');
            $grid->column('type', '优惠券类型');
            $grid->column('status', '优惠券状态');
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
        return Admin::form(Coupon::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户ID');
            $form->text('name', '优惠券名称');
            $form->text('content', '优惠券内容');
            $form->text('amount', '优惠券金额');
            $form->text('time', '优惠券有效时间');
            $form->text('type', '优惠券类型');
            $form->text('status', '优惠券状态');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
