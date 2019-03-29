<?php
/*
 *  1、首先求出memcached服务器节点的哈希值，并将其配置到0-2的32次方的圆上
 *  2、然后蚕蛹同样的方法求出存储数据的键的哈希值，并映射到相同的圆上。
 *  3、然后从数据映射到的位置开始顺时针查找，将数据保存到找到的第一个服务器上。如果超过2的32次方仍找不到服务器，就会保存到第一台memcached服务器上。
 *  4、为了解决一台服务器挂掉的时候出现某个服务器任务过多的问题，我们升级一下，每台服务器分成64个虚拟节点
 *
 * */

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

    protected $_dummy_number=16;

    /*
     * 虚拟节点
     */
    protected $_dummy_nodes;

    public function getNumerical($str) {
        return sprintf("%u", crc32($str));
    }

    /*
     * 获取指定key对应的服务器
     */
    public function getNode($cacheKey)
    {
        $numerical = $this->getNumerical($cacheKey);

        $checkNode = current($this->_dummy_nodes);
        foreach ($this->_dummy_nodes as $key => $node) {
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
        for($i=0; $i< $this->_dummy_number; $i++) {
            $this->_dummy_nodes[$this->getNumerical($nodeName . $i)] = $nodeName;
        }
        ksort($this->_dummy_nodes);
    }

    /*
     * 删除节点
     */
    public function deleteNode($nodeName)
    {
        foreach ($this->_dummy_nodes as $key => $dummy_node)
        {
            if ($nodeName == $dummy_node) {
                unset($this->_dummy_nodes[$key]);
            }
        }
    }

}

// 先添加3个服务器
$consistent = new Consistent();
$consistent->addNode('a');
$consistent->addNode('b');
$consistent->addNode('c');

// 查询一下mhl这个key在哪个服务器
dump($consistent);
dump($consistent->getNumerical('menghailong'));
$consistent->deleteNode('a');
dump($consistent);
dd($consistent->getNode('menghailong'));











































