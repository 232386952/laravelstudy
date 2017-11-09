<?php

namespace App\Admin\Controllers;

use App\Knowledge;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class KnowledgeController extends Controller
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

            $content->header('养车知识管理');
            $content->description('养车知识管理页面');

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

            $content->header('养车知识编辑');
            $content->description('养车知识编辑页面');

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

            $content->header('养车知识添加');
            $content->description('养车知识添加页面');

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
        return Admin::grid(Knowledge::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户ID');
            $grid->column('img', '缩略图');
            $grid->column('title', '标题');
            $grid->column('reads', '阅读数');
            $grid->column('likes', '点赞数');
            $grid->column('comments', '评论数');
            $grid->column('time', '发布时间');
            $grid->column('content', '文章内容');

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
        return Admin::form(Knowledge::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户ID');
            $form->text('img', '缩略图');
            $form->text('title', '标题');
            $form->text('reads', '阅读数');
            $form->text('likes', '点赞数');
            $form->text('comments', '评论数');
            $form->text('time', '发布时间');
            $form->text('content', '文章内容');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
