<?php

namespace App\Admin\Controllers;

use App\News;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsController extends Controller
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

            $content->header('新闻管理');
            $content->description('这里是新闻页面管理');

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

            $content->header('新闻编辑');
            $content->description('新闻编辑页面');

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

            $content->header('新闻添加');
            $content->description('新闻添加页面');

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
        return Admin::grid(News::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid','用户账号');
            $grid->column('cid','文章ID');
            $grid->column('title','标题');
            $grid->column('img','缩略图');
            $grid->column('description','描述简介');
            $grid->column('content','文章内容');
            $grid->column('time','发布时间');
            $grid->column('reads','阅读数');
            $grid->column('likes','点赞数');
            $grid->column('comments','评论数量');

            $grid->创建时间_at();
            $grid->更新时间_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(News::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid','用户账号');
            $form->text('cid','文章ID');
            $form->text('title','标题');
            $form->text('img','缩略图');
            $form->text('description','描述简介');
            $form->text('content','文章内容');
            $form->text('time','发布时间');
            $form->text('reads','阅读数');
            $form->text('likes','点赞数');
            $form->text('comments','评论数量');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
