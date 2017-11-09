<?php

namespace App\Admin\Controllers;

use App\Mycar;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MycarController extends Controller
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

            $content->header('我的爱车');
            $content->description('我的爱车页面');

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

            $content->header('编辑我的爱车');
            $content->description('编辑我的爱车页面');

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

            $content->header('添加我的爱车');
            $content->description('添加我的爱车页面');

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
        return Admin::grid(Mycar::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('num', '车牌号');
            $grid->column('literyear', '排量-年份');
            $grid->column('saleyear', '销售年款');
            $grid->column('enginenum', '发动机型号');
            $grid->column('registration', '注册日期');
            $grid->column('mails', '车辆里程');
            $grid->column('brand', '车辆品牌');
            $grid->column('framenum', '车架号');
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
        return Admin::form(Mycar::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('num', '车牌号');
            $form->text('literyear', '排量-年份');
            $form->text('saleyear', '销售年款');
            $form->text('enginenum', '发动机型号');
            $form->text('registration', '注册日期');
            $form->text('mails', '车辆里程');
            $form->text('brand', '车辆品牌');
            $form->text('framenum', '车架号');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
