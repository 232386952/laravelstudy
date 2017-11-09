<?php

namespace App\Admin\Controllers;

use App\Usercenter;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UsercenterController extends Controller
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

            $content->header('个人中心');
            $content->description('个人中心页面');

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

            $content->header('个人中心信息编辑');
            $content->description('个人中心信息编辑页面');

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

            $content->header('个人中心信息添加');
            $content->description('个人中心信息添加页面');

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
        return Admin::grid(Usercenter::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户ID');
            $grid->column('order', '我的订单');
            $grid->column('coupon', '我的优惠券');
            $grid->column('integral', '我的积分');
            $grid->column('collection', '我的收藏');
            $grid->column('reservation', '我的预约');
            $grid->column('message', '我的消息');

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
        return Admin::form(Usercenter::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户ID');
            $form->text('order', '我的订单');
            $form->text('coupon', '我的优惠券');
            $form->text('integral', '我的积分');
            $form->text('collection', '我的收藏');
            $form->text('reservation', '我的预约');
            $form->text('message', '我的消息');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
