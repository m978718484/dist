<?php
/**
 * 统一访问入口
 */

require_once dirname(__FILE__) . '/init.php';

$pai = new \PhalApi\PhalApi();
$pai->response()->output();

// \PhalApi\DI()->redis = function () {
//     return new \PhalApi\Redis\Lite(\PhalApi\DI()->config->get("app.redis.servers"));
// };

// \PhalApi\DI()->redis->set_forever('mykey',"myvalue",'developers');