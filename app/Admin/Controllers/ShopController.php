<?php

namespace App\Admin\Controllers;

use App\Models\Shop;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;

class ShopController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '店铺';

    protected $id_key         = '店铺ID';
    protected $name_key       = '店铺名称';
    protected $created_at_key = '添加时间';
    protected $admin_user_id  = '管理员ID';
    protected $updated_at_key = '最后一次更新时间';
    protected $deleted_at_key = '删除时间';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Shop());

        $grid->column('id',$this->id_key);
        $grid->column('name', $this->name_key);
        $grid->column('created_at', $this->created_at_key);
        $grid->column('admin_user_id', $this->admin_user_id);
        $grid->column('updated_at', $this->updated_at_key);
        $grid->column('deleted_at', $this->deleted_at_key);

        $grid->actions(function ($action){
            $action->disableView();
        });

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
        $show = new Show(Shop::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Shop());

        $form->text('name',$this->name_key);

        # 添加前先更新 管理员ID
        $form->saving(function (Form $form) {
           $form->model()->admin_user_id = Auth::guard('admin')->user()->id;
        });

        return $form;
    }
}
