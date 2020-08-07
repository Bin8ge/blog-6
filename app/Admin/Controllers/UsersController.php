<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());
        $grid->id('ID');
        $grid->username('用户名称');
        $grid->column('role_id','用户等级')->display( function ($role_id){
            return UserRole::find($role_id)->role_name;
        });
        $grid->vender_type('登录类型')->display( function ($vender_type) {
            return $vender_type ? 'QQ' : '微信';
        });
        $grid->status('用户状态')->display( function($status) {
            return $status ? '是' : '否';
        });

        $grid->mobile('手机号码')->display( function ($mobile) {
            return $mobile ?: '未绑定';
        });

        $grid->login_ip('最后一次登录ip');

        $grid->created_at('注册时间');

        $grid->updated_at('最后一次修改时间');

        $grid->disableCreateButton();
        $grid->actions(function ($actions) {

            // 去掉删除
            $actions->disableDelete();
            $actions->disableView();

        });

        //$grid->disableActions();


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('username', __('用户名称'));
        $show->field('role_id', __('用户等级'));
        $show->field('vender_type', __('登录类型'))->using([1 => '', 2 => '微信']);
        $show->field('status', __('用户状态'))->using([0 => '否', 1 => '是']);
        $show->field('mobile', __('手机号码'));
        $show->field('login_ip', __('最后一次登录ip'));
        $show->field('created_at', __('注册时间'));
        $show->field('updated_at', __('最后一次修改时间'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());
        $form->display('id', 'ID');
        $form->text('username','用户名称');
        $form->number('role_id','用户等级');
        $vender_type = [
            1 => 'QQ',
            2 => '微信',
        ];
        $form->select('vender_type', '登录类型')->options($vender_type);
        $form->select('status', '用户状态')->options([0=>'否',1=>'是']);
        $form->mobile('mobile', __('手机号码'));
        $form->text('login_ip', __('最后一次登录ip'));
        $form->display('created_at', '注册时间');
        $form->display('updated_at', '最后一次修改时间');

        $form->footer(function ($footer) {

            // 去掉`重置`按钮
            $footer->disableReset();

            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        });

        $form->tools(function (Form\Tools $tools) {

            // 去掉`删除`按钮
            $tools->disableDelete();

        });

        return $form;
    }
}
