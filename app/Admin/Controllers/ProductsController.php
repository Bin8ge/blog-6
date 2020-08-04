<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';


    protected $id_key = '商品ID';
    protected $product_core_key = '商品编码';
    protected $title_key = '商品名称';
    protected $bar_code_key = '国条码';
    protected $category_id_key = '商品分类';
    protected $status_key = '上架';
    protected $audit_status_key = '审核状态';
    protected $shop_id_key = '所属店铺';
    protected $price_key = '价格';
    protected $rating_key = '评分';
    protected $sold_count_key = '销量';
    protected $review_count_key = '评论数';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());
        $shop_id = Shop::select('id')->where('admin_user_id',Auth::guard('admin')->user()->id)->get()->toArray();
        $grid->model()->whereIn('shop_id',$shop_id);
        $grid->column('id', $this->id_key)->sortable();
        $grid->column('product_core',$this->product_core_key );
        $grid->column('title', $this->title_key);
        $grid->column('bar_code',$this->bar_code_key );
        $grid->column('category_id', $this->category_id_key)->display(function ($category_id){
            return Category::where('id',$category_id)->first()->name;
        });
        $grid->column('status', $this->status_key)->display(function ($status){
            return $status ? '是' : '否';
        });
        $grid->column('audit_status',$this-> audit_status_key)->display(function ($audit_status){
            return $audit_status ? '是' : '否';
        });
        $grid->column('shop_id', $this->shop_id_key)->display(function ($shop_id){
            return Shop::where('id',$shop_id)->first()->name;
        });
        $grid->column('rating', $this->rating_key);
        $grid->column('sold_count', $this->sold_count_key);
        $grid->column('review_count',$this->review_count_key);
        $grid->column('price',$this->price_key);
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', $this->title_key)->rules('');
        $show->field('product_core', __('Product core'));
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

        $form->text('product_core', $this->product_core_key);
        $form->text('title', $this->title_key)->required();
        $form->text('bar_code', $this->bar_code_key)->required();
        $form->image('image','封面图片')->rules('required|image');
        $form->select('category_id', $this->category_id_key)->options(function ($category_id){
            $category = Category::find($category_id);
            if ($category) {
                return [$category->id => $category->full_name];
            }
        })->ajax('/admin/api/categories?is_directory=0');
        $form->radio('status',$this->status_key)->options(['1' => '是', '0'=> '否'])->default('0');
        $form->select('shop_id','所属店铺')->options(function (){
            $shop = Shop::select('id','name')->where('admin_user_id',Auth::guard('admin')->user()->id)->get();
            $array= [];
            if ($shop) {
                foreach ($shop as $key => $values) {
                    $array[$values->id] = $values->name;
                }
            }
            return $array;
        })->rules('required');

        //创建一个富文本编辑器
       $form->editor('productdescriptions.description','商品描述')->rules('required');

        // 直接添加一对多的关联模型
        $form->hasMany('sku', 'SKU 列表', function (Form\NestedForm $form) {
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('description', 'SKU 描述')->rules('required');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
        });
        // 定义事件回调，当模型即将保存时会触发这个回调
        $form->saving(function (Form $form) {
            $form->model()->price = collect($form->input('sku'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;

            $form->model()->product_core = strtotime(date('Y-m-d H:i:s',time()));
        });
        return $form;
    }
}
