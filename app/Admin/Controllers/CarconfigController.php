<?php

namespace App\Admin\Controllers;

use App\Carconfig;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CarconfigController extends Controller
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

            $content->header('车型配置管理');
            $content->description('车型配置管理页面');

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

            $content->header('车型配置编辑');
            $content->description('车型配置编辑页面');

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

            $content->header('车型配置添加');
            $content->description('车型配置添加页面');

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
        return Admin::grid(Carconfig::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('models', '车型');
            $grid->column('price', '官方指导价');
            $grid->column('size', '车辆尺寸');
            $grid->column('wheelbase', '轴距');
            $grid->column('hubs', '轮毂轮胎');
            $grid->column('sparetire', '备胎');
            $grid->column('tank', '邮箱容积');
            $grid->column('curbweight', '整备质量');
            $grid->column('engine', '发动机');
            $grid->column('power', '最高功率/转速');
            $grid->column('torque', '最大扭矩/转速');
            $grid->column('gearbox', '变速器型式');
            $grid->column('supension', '悬架系统');
            $grid->column('brake', '前后制动器');
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
        return Admin::form(Carconfig::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('models', '车型');
            $form->text('price', '官方指导价');
            $form->text('size', '车辆尺寸');
            $form->text('wheelbase', '轴距');
            $form->text('hubs', '轮毂轮胎');
            $form->text('sparetire', '备胎');
            $form->text('tank', '邮箱容积');
            $form->text('curbweight', '整备质量');
            $form->text('engine', '发动机');
            $form->text('power', '最高功率/转速');
            $form->text('torque', '最大扭矩/转速');
            $form->text('gearbox', '变速器型式');
            $form->text('supension', '悬架系统');
            $form->text('brake', '前后制动器');


            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
