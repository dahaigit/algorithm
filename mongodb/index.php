<?php

/**
 * 这里测试链接mongodb
 */

$tabe = 'app_wechat.users';

$manager = new \MongoDB\Driver\Manager("mongodb://localhost:30000");

// 插入数据
$bulk = new \MongoDB\Driver\BulkWrite();
$bulk->insert(['user_id'=>401, "name" => 'mhl']);
$manager->executeBulkWrite($tabe, $bulk);
dd($manager);


// 查询数据
$filter = ["user_id" => ['$gt' => 380]];
$options = [];
$query = new \MongoDB\Driver\Query($filter, $options);
$res = $manager->executeQuery($tabe, $query);
foreach ($res as $re)
{
    dd($re);
}

// 修改数据
$bulk = new \MongoDB\Driver\BulkWrite();
$bulk->update(
    ['user_id' => 401],
    ['$set' => ['name' => 'xph', "desc" => "描述"]],
    ['multi' => false, 'upsert' => false]
);
$res = $manager->executeBulkWrite($tabe, $bulk);
dd($res);

// 删除数据
$bulk = new \MongoDB\Driver\BulkWrite();
$bulk->delete(["user_id" => 401], ["limit" => 1]); // limit1表示只删除一条
$res = $manager->executeBulkWrite($tabe, $bulk);
dd($res);

function dd($res) {
    var_dump($res);
}