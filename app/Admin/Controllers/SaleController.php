<?php

namespace App\Admin\Controllers;

use App\Sale;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SaleController extends Controller
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

            $content->header('车抢购管理');
            $content->description('车抢购管理页面');

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

            $content->header('车抢购编辑');
            $content->description('车抢购编辑页面');

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

            $content->header('车抢购添加');
            $content->description('车抢购添加页面');

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
        return Admin::grid(Sale::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '车辆名字');
            $grid->column('deposit', '定金');
            $grid->column('originalprice', '原价');
            $grid->column('price', '抢购价');
            $grid->column('timeleft', '剩余时间');
            $grid->column('img', '缩略图');
            $grid->column('content', '内容');
            $grid->column('details', '详情');
            $grid->column('comments', '评论');
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
        return Admin::form(Sale::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '车辆名字');
            $form->text('deposit', '定金');
            $form->text('originalprice', '原价');
            $form->text('price', '抢购价');
            $form->text('timeleft', '剩余时间');
            $form->text('img', '缩略图');
            $form->text('content', '内容');
            $form->text('details', '详情');
            $form->text('comments', '评论');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
