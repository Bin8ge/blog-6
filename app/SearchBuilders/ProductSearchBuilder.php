<?php
namespace App\SearchBuilders;

class ProductSearchBuilder
{

    protected $params = [
        'index' => 'products',
        'type' => '_doc',
        'body' => [
            'query' => [
                'bool' =>  [
                    'filter' => [],
                    'must' => [],
                ],
            ],
        ],
    ];



    /**
     * Notes: es 分页处理
     * User: bingo
     * Date: 2020/10/13
     * Time: 17:25
     * @param $size
     * @param $page
     * @return ProductSearchBuilder
     */
    public function paginate($size,$page)
    {
        $params['body']['from'] =  ($page - 1) * $size;
        $params['body']['size'] =  $size;

        return $this;
    }


    /**
     * Notes: es 查询的必要条件
     * User: bingo
     * Date: 2020/10/13
     * Time: 17:28
     * @return $this
     */
    public function onSale()
    {
        $this->params['body']['query']['bool']['filter'] = [
            [
                "term" => [
                    "status" => true,
                ]
            ],
            [
                "term" => [
                    "audit_status" => 1
                ],
            ]
        ];

        return $this;
    }


    /**
     * Notes: es 首页搜索框
     * User: bingo
     * Date: 2020/10/13
     * Time: 17:30
     * @param $keywords
     * @return $this
     */
    public function keywords($keywords)
    {
        $keywords = is_array($keywords) ? $keywords : [$keywords];

        foreach ($keywords as $keyword) {
            $this->params['body']['query']['bool']['must'][] = [
                'multi_match' => [
                    'query' => $keyword,
                    'fields' => [
                        'title',
                        'long_title'
                    ],
                ],
            ];
        }
        return $this;
    }




    /**
     * Notes: es 排序
     * User: bingo
     * Date: 2020/10/13
     * Time: 17:35
     * @param $field
     * @param $direction
     * @return $this
     */
    public function orderBy($field,$direction): self
    {
        if (!isset($this->params['body']['sort'])) {
            $this->params['body']['sort'] = [];
        }
        $this->params['body']['sort'][] = [ $field => $direction ];
        return $this;
    }



    public function getParams(): array
    {
        return $this->params;
    }





}
