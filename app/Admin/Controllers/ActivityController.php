<?php

namespace App\Admin\Controllers;

use App\Activity;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ActivityController extends Controller
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

            $content->header('平台活动');
            $content->description('平台活动页面');

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

            $content->header('平台活动编辑');
            $content->description('平台活动编辑页面');

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

            $content->header('平台活动添加');
            $content->description('平台活动添加页面');

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
        return Admin::grid(Activity::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('uid', '用户ID');
            $grid->column('cid', '文章ID');
            $grid->column('title', '标题');
            $grid->column('imgurl', '缩略图');
            $grid->column('viows', '阅读数量');
            $grid->column('content', '活动详情');
            $grid->column('bmtime', '报名时间');
            $grid->column('add', '活动地址');
            $grid->column('bmnums', '报名数量');
            $grid->column('collection', '收藏数量');
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
        return Admin::form(Activity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('uid', '用户ID');
            $form->text('cid', '文章ID');
            $form->text('title', '标题');
            $form->text('imgurl', '缩略图');
            $form->text('viows', '阅读数量');
            $form->text('content', '活动详情');
            $form->text('bmtime', 'ID');
            $form->text('add', '报名时间');
            $form->text('add', '活动地址');
            $form->text('bmnums', '报名数量');
            $form->text('collection', '收藏数量');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
