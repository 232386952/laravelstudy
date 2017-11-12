<?php

namespace App\Admin\Controllers;

use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
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

            $content->header('用户管理');
            $content->description('这里是用户管理界面');

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

            $content->header('header');
            $content->description('description');

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

            $content->header('创建用户');
            $content->description('这里是创建用户的地方');

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
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '用户名')->style('color:green');
            $grid->column('email','邮箱')->link('mailto:{$value}');
            $grid->type('用户类型')->select([
                1 => '普通会员',
                2 => 'VIP会员',
                3 => '至尊会员',
                4 => '内部贵宾',
            ]);

            $grid->column('grade','用户会员等级');

            $grid->column('nickname','昵称');

            $grid->sex('性别')->select([
                1 => '男性',
                2 => '女性',
            ]);

            $grid->column('idcard','身份证');
            $grid->column('add','地址');
            $grid->column('phone','电话');
            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('更新时间')->sortable();
            $grid->disableRowSelector();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '用户名');
            $form->email('email', '邮箱');
            $form->password('password','密码');
            $form->password('password','确认密码');
            $form->select('type','用户类型')->options([1 => '普通会员', 2 => 'VIP会员', 3 => '至尊会员', 4 => '内部贵宾','val' => '用户类型']);

            $form->text('grade','用户会员等级');

            $form->image('avatar', '头像')
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->insert('/storage/images/test1.jpg', 'bottom-right', 10, 10);


            $form->text('nickname','昵称');
            $form->radio('sex','性别')->values(['0' => '女', '1'=> '男']);
            $form->text('idcard','身份证');
            $form->text('add','地址');
            $form->mobile('phone','电话');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}