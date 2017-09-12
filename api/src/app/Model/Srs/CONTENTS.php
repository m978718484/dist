<?php
namespace App\Model\Srs;

use PhalApi\Model\NotORMModel as NotORM;

class CONTENTS extends NotORM {
    public function getContentsList() {
        // return $this->getORM()
        //     ->select('*')
        //     ->fetchall();

        // $contents = "cms_contents";
        // return DI()->notorm->$contents
        //     ->select('*')
        //     ->fetchall();
        $sql = "SELECT  a.id ,a.title AS 'Title',DATE_FORMAT(a.publish_date,'%Y-%m-%d') AS 'PublishDate' FROM cms_contents AS a WHERE a.deleted = 0 and a.status = 1 and   (expired_date is null or  expired_date > now() ) ORDER BY a.publish_date DESC";
        return $this->getORM()->queryAll($sql,array());
    }

    public function getContentsDetail($detailId) {
        $sql = "SELECT  a.title AS 'Title', a.author AS 'From', replace(b.content,'/EbidBms/upload/','http://www.srmmx.com/EbidBms/upload/')  AS 'Content', a.publish_date AS 'PublishDate' FROM cms_contents AS a LEFT JOIN cms_clob_data AS b ON a.clob_id = b.id  LEFT JOIN cms_columns AS c ON a.column_id = c.id WHERE a.deleted = 0 and a.status = 1 and   (expired_date is null or  expired_date > now() ) and a.id = ".$detailId;
        return $this->getORM()->queryAll($sql,array());
    }
}
