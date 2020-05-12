<?php
/**
 * 树遍历-递归遍历
 */
$data = [
    [
        'name' => '电子产品',
        'children' => [
            [
                'name' => '手机',
                'children' => [
                    [
                        'name' => '安卓',
                        'children' => []
                    ],
                    [
                        'name' => '苹果',
                        'children' => []
                    ]
                ]
            ],
            [
                'name' => '笔记本',
                'children' => []
            ]
        ]
    ],
    [
        "name" => '服装',
        'children' => [
            [
                'name' => '上衣',
                'children' => []
            ]
        ]
    ]
];
function eachTree(array $arrs, $level = 0)
{
    foreach ($arrs as $arr) {
        if (isset($arr['name'])) {
            $appendStr = str_repeat("\x20\x20\x20", $level) . $arr['name'] . PHP_EOL;
            file_put_contents('tree.tx', $appendStr, FILE_APPEND);
            if ($arr['children']) {
                $rl = $level+1;
                eachTree($arr['children'], $rl);
            }
        }
    }
}
eachTree($data);
/**
 *  电子产品
 *      手机
 *          安卓
 *          苹果
 *      笔记本
 *  服装
 *      上衣
 */