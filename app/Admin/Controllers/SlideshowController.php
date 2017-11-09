<?php

namespace App\Admin\Controllers;

use App\Slideshow;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SlideshowController extends Controller
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

            $content->header('幻灯片管理');
            $content->description('幻灯片管理页面');

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

            $content->header('幻灯片编辑');
            $content->description('幻灯片编辑页面');

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

            $content->header('幻灯片添加');
            $content->description('幻灯片添加页面');

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
        return Admin::grid(Slideshow::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('url', '幻灯片链接');
            $grid->column('conent', '幻灯片内容');
            $grid->column('titile', '幻灯片标题');

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
        return Admin::form(Slideshow::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('url', '幻灯片链接');
            $form->text('conent', '幻灯片内容');
            $form->text('titile', '幻灯片标题');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
