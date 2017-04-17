<?php
/**
 * Created by PhpStorm.
 * User: 11561
 * Date: 2017/4/16
 * Time: 23:58
 */

namespace Home\Model;


class IndexModel
{
    public function queryByList(){
        $m = M('excel');
        $sql = "select * from __PREFIX__excel order by user_id asc";
        return $m->query($sql);
    }
}

