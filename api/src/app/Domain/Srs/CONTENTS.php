<?php
namespace App\Domain\Srs;

use App\Model\Srs\CONTENTS as ModelCONTENTS;

class CONTENTS {

    public function getContentsList() {
        $rs = array();
        $model = new ModelCONTENTS();
        $rs = $model->getContentsList();
        return $rs;
    }

    public function getContentsDetail($detailId) {
        $rs = array();

        $detailId = intval($detailId);
        if ($detailId <= 0) {
            return $rs;
        }

        $model = new ModelCONTENTS();
        $rs = $model->getContentsDetail($detailId);
        return $rs;
    }
}

