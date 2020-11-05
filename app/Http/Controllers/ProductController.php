<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\SearchBuilders\ProductSearchBuilder;
use App\Exceptions\InvalidRequestException;

class ProductController extends Controller
{
    /**
     * Notes:商品列表页面
     * User: bingo
     * Date: 2020/10/15
     * Time: 15:44
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 16;

        #构建查询
        $builder = (new ProductSearchBuilder)->onSale()->paginate($perPage,$page);



        #是否有搜索
        if ($search = $request->input('search', '')) {
            # 将搜索词根据空格拆分成数组，并且过滤空项
            $keywords = array_filter(explode(' ', $search ));
            $builder->keyWords($keywords);
        }

        # 接收排序字段order 判断是都有值
        # order  控制商品的排序规则
        if ($order = $request->input('order', '')) {
            #是否以_asc 或 _desc 排序
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    $builder->orderBy($m[1],$m[2]);
                }
            }
        }

        $result = app('es')->search($builder->getParams());


        # 获取每页的id
        $productIds = collect($result['hits']['hits'])->pluck('_id')->all();

        $products = Product::query()
            ->whereIn('id', $productIds)
            ->orderByRaw(sprintf("FIND_IN_SET(id,'%s')", implode(',', $productIds)))
            ->get();

        $pager = new LengthAwarePaginator($products, $result['hits']['total']['value'], $perPage, $page, [
            'path' => route('products.index', false), // 手动构建分页的 url
        ]);


        return view('products.index', [
            'products' => $pager,
            'filters' => [
                'search' => $search,
                'order' => $order,
            ]
        ]);

    }


    public function show(Product $product,Request $request)
    {
        if (!$product->status){
            throw new InvalidRequestException('商品未上架');
        }

        if (!$product->audit_status){
            throw new InvalidRequestException('请等待商品审核');
        }

        $product = $product->where('id',$product->id)->with([
            'skus',
            'properties',
            'images',
            'productdescriptions'
            ])->first();

        $images = [];
        foreach ($product->images as $val){
            foreach ($val->image_url as $value){
                $images[] = \Storage::disk('public')->url($value);
            }
        }



        return view('products.productdetail',[
            'product' => $product, //商品
            'skus' => $product->skus, //商品sku
            'properties' => $product->properties,//商品属性
            'images' => $images,//商品详情页图片
            'productdescriptions' => $product->productdescriptions,//商品详情
        ]);

    }
}
