<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品分类';

    protected $id_key = 'ID';
    protected $name_key = '名称';
    protected $level_key= '层级';
    protected $is_directory_key = '是否目录';
    protected $path_key = '类目路径';

    public function edit($id,Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form(true)->edit($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', $this->id_key)->sortable();
        $grid->column('name', $this->name_key);
        $grid->column('level', $this->level_key);
        $grid->column('is_directory', $this->is_directory_key)->display(function ($value){
            return $value ? '是' : '否';
        });
        $grid->column('path',$this->path_key);

        $grid->actions(function ($action) {
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', $this->id_key);
        $show->field('name',$this->name_key);
        $show->field('level', $this->level_key);
        $show->field('is_directory',$this->is_directory_key);
        $show->field('path', $this->path_key);

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($isEditing = false)
    {
        $form = new Form(new Category());
        $form->text('name',$this->name_key)->rules('required');

        if ($isEditing) {
            $form->display('is_directory',$this->is_directory_key)->with(function ($value) {
                return $value ? '是' : '否';
            });
            $form->display('parent.name','父类目录');
        } else {
            $form->radio('is_directory',$this->is_directory_key)
                ->options( ['1' => '是' , '0'=> '否'])
                ->default('0')
                ->rules('required');
            $form->select('parent_id','父类目录')->ajax('/admin/api/categories');
        }

        return $form;
    }


    public function apiIndex(Request $request)
    {

        $search = $request->input('q');


        $result = Category::where('is_directory', true)
            ->where('name', 'like', "%$search%")
            ->paginate(null,['id','name as text']);




      /* $result->setCollection($result->getCollection()->map(function (Category $category) {
            return ['id' => $category->id, 'text' => $category->name];
        }));*/


        // 把查询出来的结果重新组装成 Laravel-Admin 需要的格式
     /*   $result->setCollection($result->getCollection()->map(function (Category $category) {
            return ['id' => $category->id, 'text' => $category->full_name];
        }));*/



        return $result;
    }



}
