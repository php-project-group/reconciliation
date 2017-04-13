<?php
/**
 * Created by PhpStorm.
 * User: Loki.Luo
 * Date: 2017/2/12
 * Time: 14:16
 */
//
require 'extends/base/base.smarty.class.php';
include './extends/phpExcel/PHPExcel/IOFactory.php';
//require_once 'extends/phpWord/PHPWord.php';
//require_once './extends/phpWord/PHPWord/Autoloader.php';
//require_once 'extends/phpWord/PHPWord/IOFactory.php';
//


class Start2Controller extends BaseSmartyClass{
    function __construct()
    {
        parent::__construct();
    }

    function index(){


//        $count = file("Text.docx");
//        foreach($count as $key=>$value){
//            echo iconv('utf-8','gb2312//IGNORE',$value);
//        }


//        $file = "C:/home/antiword/Docs/testdoc.doc";
//
//        $content = exec( "cmd" );

//$content = shell_exec("G:\php\antiword-$file");
//        echo $content;
//var_dump($content);
//        $word = new COM("word.application") or die("Can’t start Word!");
////        echo "Loading Word, v. {$word->Version}<br>";
//        $word->Documents->OPen("G:\Apache24\htdocs\guest\php+smarty-demo\Text.docx");
//        $test= $word->ActiveDocument->content->Text;
//        var_dump($test) ;

//        $myxml= simplexml_load_file('G:\Apache24\htdocs\guest\php+smarty-demo\22.xml');
//        $lists = simplexml_load_file('G:\Apache24\htdocs\guest\php+smarty-demo\document.xml');
//        var_dump($lists);

        $dom=new DOMDocument();
        $dom->load('G:\Apache24\htdocs\guest\php+smarty-demo\document.xml');
        $x = $dom->documentElement;
        $word = array(100);
        $tem = array();


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");


//        $objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A1', 'Hello')
//            ->setCellValue('B2', 'world!')
//            ->setCellValue('C1', 'Hello')
//            ->setCellValue('D2', 'world!');
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('test');
        $num = 65;
        $exc_k = 0;



        foreach ($x->childNodes AS $item)
        {
            if($item->nodeName == '#text'){
                continue;
            }
            foreach($item->childNodes as $key=>$value){
                if($value->nodeName == '#text'){
                    continue;
                }
                foreach($value->childNodes as $k=>$val){
                    if($val->nodeName == '#text' || $val->nodeName =="w:pPr" ){
                        continue;
                    };
//                    $tem.length = 0;
//                    unset($tem);
//                    $tem = array();
//                    w:br
                    foreach($val->childNodes as $y=>$v){
                        if($v->nodeName == '#text' || $v->nodeName == "w:fldChar" || $v->nodeName == "w:instrText" || $v->nodeName == "w:rPr"){
                            continue;
                        }
                        if($v->nodeName == 'w:br'){
                            array_push($word,$tem);

                            foreach($tem as $exc_key=>$exc_value){
                                $prefix = $num>90 ? $prefix = 'A'.chr(ceil(($num - 65)%26)+65) : chr($num);
//                                print $prefix.($exc_k+1);
//                                print "<br/>";
                                $objPHPExcel->getActiveSheet()->setCellValue($prefix.($exc_k+1), $exc_value);
                                $num ++;
                            }
                            $num = 65;
                            $exc_k ++;
                            $tem = array();
                        }
                        else{
                            array_push($tem,$v->nodeValue);
//                            var_dump($tem);
                        }
//                        print $v->nodeName . " = " . $v->nodeValue."<br />";
                    }
                }
            }
        }
//var_dump($word);
//        exit;


        foreach($word as $exc_k=>$exc_val){
//            print $exc_k;

        }
//        exit;

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

        $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
//        var_dump(iconv('utf-8','gb2312',$count));
        $this->smarty->display('templates/success.tpl');
    }
}



?>