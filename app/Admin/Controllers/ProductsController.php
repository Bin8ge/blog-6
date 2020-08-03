<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('product_core', __('Product core'));
        $grid->column('title', __('Title'));
        $grid->column('bar_code', __('Bar code'));
        $grid->column('category_id', __('Category id'));
        $grid->column('status', __('Status'));
        $grid->column('audit_status', __('Audit status'));
        $grid->column('shop_id', __('Shop id'));
        $grid->column('description_id', __('Description id'));
        $grid->column('rating', __('Rating'));
        $grid->column('sold_count', __('Sold count'));
        $grid->column('review_count', __('Review count'));
        $grid->column('price', __('Price'));
        $grid->column('image', __('Image'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_core', __('Product core'));
        $show->field('title', __('Title'));
        $show->field('bar_code', __('Bar code'));
        $show->field('category_id', __('Category id'));
        $show->field('status', __('Status'));
        $show->field('audit_status', __('Audit status'));
        $show->field('shop_id', __('Shop id'));
        $show->field('description_id', __('Description id'));
        $show->field('rating', __('Rating'));
        $show->field('sold_count', __('Sold count'));
        $show->field('review_count', __('Review count'));
        $show->field('price', __('Price'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('product_core', __('Product core'));
        $form->text('title', __('Title'));
        $form->text('bar_code', __('Bar code'));
        $form->number('category_id', __('Category id'));
        $form->switch('status', __('Status'));
        $form->switch('audit_status', __('Audit status'));
        $form->number('shop_id', __('Shop id'));
        $form->number('description_id', __('Description id'));
        $form->decimal('rating', __('Rating'));
        $form->number('sold_count', __('Sold count'));
        $form->number('review_count', __('Review count'));
        $form->decimal('price', __('Price'));
        $form->image('image', __('Image'));

        return $form;
    }
}
