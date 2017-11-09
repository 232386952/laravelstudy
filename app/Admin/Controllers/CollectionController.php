<?php

namespace App\Admin\Controllers;

use App\Collection;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CollectionController extends Controller
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

            $content->header('收藏中心');
            $content->description('收藏中心页面');

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

            $content->header('编辑收藏');
            $content->description('编辑收藏页面');

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

            $content->header('添加收藏');
            $content->description('添加收藏页面');

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
        return Admin::grid(Collection::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户ID');
            $grid->column('content', '收藏内容');
            $grid->column('type', '收藏类型');

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
        return Admin::form(Collection::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户ID');
            $form->text('content', '收藏内容');
            $form->text('type', '收藏类型');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
