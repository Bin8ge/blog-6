<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadsController extends Controller
{
    public function uploadImg(Request $request)
    {
        $file = $request->file('mypic');


        if (!empty($file)){

            $len = count($file);
            if ($len>25) {
                return response()->json(['ResultData' => 6, 'info' => '最多可以上传25张图片']);
            }

            $m = 0;
            $k = 0;

            foreach ($file as $i => $iValue) {
                $n = $i+1;
                if ($iValue->isValid()) {
                    if (in_array(strtolower($iValue->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $picname = $iValue->getClientOriginalName();//获取上传原文件名
                        $ext = $iValue->getClientOriginalExtension();//获取上传文件的后缀名
                        // 重命名
                        $filename = time() . Str::random(6) . "." . $ext;
                        if ($iValue->move("uploads/images", $filename)) {
                            $newFileName = '/' . 'uploads/images' . '/' . $filename;//图片上传的路径设置
                            ++$m;
                            // return response()->json(['ResultData' => 0, 'info' => '上传成功', 'newFileName' => $newFileName ]);
                        } else {
                            ++$k;
                            // return response()->json(['ResultData' => 4, 'info' => '上传失败']);
                        }
                        $msg = $m . '张图片上传成功 ' . $k . '张图片上传失败<br>';
                        $return[] = ['ResultData' => 0, 'info' => $msg, 'newFileName' => $newFileName];
                    }else{
                        return response()->json(['ResultData' => 3, 'info' => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式']);
                    }
                } else {
                    return response()->json(['ResultData' => 1, 'info' => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持2M']);
                }
            }
        } else {
            return response()->json(['ResultData' => 5, 'info' => '请选择文件']);
        }

        return $return;
    }
}
