<?php

namespace App\Admin\Controllers;

use App\Cardatas;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CardatasController extends Controller
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

            $content->header('车型管理');
            $content->description('车型管理页面');

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

            $content->header('车型编辑');
            $content->description('车型编辑页面');

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

            $content->header('车型添加');
            $content->description('车型添加页面');

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
        return Admin::grid(Cardatas::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('class', '车型级别');
            $grid->column('price', '车型整体报价');
            $grid->column('name', '车名');
            $grid->column('brand', '品牌');
            $grid->column('color', '颜色');
            $grid->column('model', '型号');
            $grid->column('hot', '热门车型');
            $grid->column('config', '车辆配置');

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
        return Admin::form(Cardatas::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('class', '车型级别');
            $form->text('price', '车型整体报价');
            $form->text('name', '车名');
            $form->text('brand', '品牌');
            $form->text('color', '颜色');
            $form->text('model', '型号');
            $form->text('hot', '热门车型');
            $form->text('config', '车辆配置');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
