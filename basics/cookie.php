<?php
/**
* 7个参数，分别是
* name名称，
* value值，
* expire有效期，如果是0则是在会话结束后情况（关闭浏览器），单位秒
* path 有效的服务器路径，设置成/时，cookie对整个域名都有效，默认当前目录
* domain 有效域名，
* secure 是否仅仅通过安全的https连接传给客户
* httponly cookie仅可以通过http协议访问，不能通过js脚本获取，减少xss攻击
*/
// 设置 Cookie
setcookie("cookie[three]", "cookiethree");
setcookie("cookie[two]", "cookietwo");
setcookie("cookie[one]", "cookieone");

// 网页刷新后，打印出以下内容
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";
    }
}
