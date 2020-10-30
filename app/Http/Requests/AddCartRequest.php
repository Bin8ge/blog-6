<?php
namespace App\Http\Requests;

use App\Models\ProductSku;
use Illuminate\Foundation\Http\FormRequest;

class AddCartRequest extends FormRequest
{
    public function rules()
    {
        return [
            'sku_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!$sku = ProductSku::find($value)) {
                        return $fail('该商品不存在');
                    }
                    if (!$sku->product->status) {
                        return $fail('该商品未上架');
                    }
                    if ($sku->stock === 0) {
                        return $fail('该商品已售完');
                    }
                    if ($this->input('num') > 0 && $sku->stock < $this->input('num')) {
                        return $fail('该商品库存不足');
                    }
                    if (!$sku->product->audit_status) {
                        return $fail('该商品未通过审核');
                    }
                },
            ],
            'num' => ['required', 'integer', 'min:1'],
        ];
    }

    public function attributes()
    {
        return [
            'num' => '商品数量'
        ];
    }

    public function messages()
    {
        return [
            'sku_id.required' => '请选择商品'
        ];
    }
}
