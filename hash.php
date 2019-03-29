<?php


function dd($str)
{
    var_dump($str);
    exit;
}

function dump($str)
{
    var_dump($str);
}

interface Hash
{
    /*
     * 获取字符串对应的数值
     */
    public function getNumerical($str);
}

/*
 * 一致性hash算法
 * 实现memcached分布式算法
 */
class Consistent implements Hash
{
    /*
     * 所有节点存储位置
     */
    protected $_nodes;

    public function getNumerical($str) {
        return sprintf("%u", crc32($str));
    }

    /*
     * 获取指定key的值
     */
    public function get($cacheKey)
    {
        $numerical = $this->getNumerical($cacheKey);

        $checkNode = current($this->_nodes);
        foreach ($this->_nodes as $key => $node) {
            if ($numerical <= $key) {
                $checkNode = $node;
                break;
            }
        }
        return $checkNode;
    }

    /*
     * 添加节点
     */
    public function addNode($nodeName)
    {
        $this->_nodes[$this->getNumerical($nodeName)] = $nodeName;
        ksort($this->_nodes);
    }

}

// 先添加3个服务器
$consistent = new Consistent();
$consistent->addNode('a');
$consistent->addNode('b');
$consistent->addNode('c');

// 查询一下mhl这个key在哪个服务器
dump($consistent);
dd($consistent->get('mhl'));











































