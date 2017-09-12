<?php
namespace App\Api\Srs;

use PhalApi\Api;
use App\Domain\Srs\CONTENTS as DomainCONTENTS;

/**
 * 公告获取
 * @author dogstar 20170612
 */

class CONTENTS extends Api {

    public function getRules() {
        return array(
            'getContentsDetail' => array(
                'detailId' => array('name' => 'detail_id', 'type' => 'int', 'min' => 1, 'require' => true, 'desc' => '公告详情ID'),
            ),
        );
    }

    /**
     * 获取公告列表
     * @desc 用于获取所有公告列表
     * @return int code 操作码，0表示成功， 1表示列表不存在数据
     * @return string msg 提示信息
     */
    public function getContentsList() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $domain = new DomainCONTENTS();
        $info = $domain->getContentsList();

        if (empty($info)) {
            DI()->logger->debug('list not found');

            $rs['code'] = 1;
            $rs['msg'] = T('list not exists');
            return $rs;
        }

        $rs['info'] = $info;

        return $rs;
    }

     /**
     * 获取公告详情
     * @desc 用于获取公告详情
     * @return int code 操作码，0表示成功， 1表示公告详情不存在
     * @return string msg 提示信息
     */
    public function getContentsDetail() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $domain = new DomainCONTENTS();
        $info = $domain->getContentsDetail($this->detailId);

        if (empty($info)) {
            DI()->logger->debug('detail not found');

            $rs['code'] = 1;
            $rs['msg'] = T('detail not exists');
            return $rs;
        }

        $rs['info'] = $info;

        return $rs;
    }
}
