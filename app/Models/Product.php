<?php

namespace App\Models;

use Hamcrest\Core\DescribedAs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    #链接数据库
    protected $connection = 'mysql_products';

    #字段白名单
    protected $fillable =[
        'product_core',
        'title',
        'bar_code',
        'category_id',
        'status',
        'audit_status',
        'shop_id',
        'description_id',
        'rating',
        'sold_count',
        'review_count',
        'price',
        'image',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];


    /**
     * Notes: 商品sku  一对多
     * User: bingo
     * Date: 2020/8/18
     * Time: 10:44
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skus()
    {
        return $this->hasMany(ProductSku::class);

    }

    /**
     * Notes: 商品分类  一对一
     * User: bingo
     * Date: 2020/8/18
     * Time: 10:44
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);

    }


    /**
     * Notes:商店表 一对一
     * User: bingo
     * Date: 2020/8/18
     * Time: 10:43
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Notes:商品描述 一对一
     * User: bingo
     * Date: 2020/8/18
     * Time: 10:44
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productdescriptions()
    {
        return $this->hasOne(ProductDescription::class);
    }


    /**
     * Notes:商品属性  一对多
     * User: bingo
     * Date: 2020/8/18
     * Time: 10:48
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany(ProductProperties::class);
    }

    /**
     * Notes:
     * User: bingo
     * Date: 2020/10/15
     * Time: 18:08
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function toESArray()
    {
        // 只取出需要的字段
        $arr = Arr::only($this->toArray(), [
            'id',
            'product_core',
            'title',
            'long_title',
            'bar_code',
            'status',
            'audit_status',
            'rating',
            'sold_count',
            'review_count',
            'price',
            'image'
        ]);

        // 如果商品有类目，则 category 字段为类目名数组，否则为空字符串
        $arr['category'] = $this->category ? explode(' - ', $this->category->full_name) : '';
        // 类目的 path 字段
        $arr['category_path'] = $this->category ? $this->category->path : '';
        // strip_tags 函数可以将 html 标签去除
        $arr['description'] = strip_tags($this->productdescriptions["description"]);
        // 只取出需要的 SKU 字段
        $arr['skus'] = $this->skus->map(function (ProductSku $sku) {
            return Arr::only($sku->toArray(), ['title', 'description', 'price']);
        });
        $arr['shop_name'] = $this->shop->name;
        // 只取出需要的商品属性字段
        $arr['properties'] = $this->properties->map(function (ProductProperties $property) {
            return Arr::only($property->toArray(), ['name', 'value']);
        });

        $arr['images'] = $this->images->map(function (ProductImage $productimage){
            return Arr::only($productimage->toArray(),['image_url']);
        });

        return $arr;
    }



}
