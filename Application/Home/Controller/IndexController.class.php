<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
//    public function index(){
////        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
////        echo 'hello,world!';
//        $name = "TinkPHP";
//        $this -> assign('name',$name);
////        $this -> assign('path',__PUBLIC__);
//
////        $Model = M('Account','','DB_CONFIG');;
//
////        $Model.test();
//
//        $this -> display();
//    }
    public function index(){
        $user = D('Home/Index');
        $data = $user->queryByList();
        $this->assign('data',$data);

        getXml();

        $this->display("/index");
    }


    public function export(){
        $user = D('Home/Index');
        $data = $user->queryByList();
        $subject="Excel导出测试";
        $title=array("id","姓名","手机号码","性别","email");
        exportExcel($data,$title,$subject);
    }
}