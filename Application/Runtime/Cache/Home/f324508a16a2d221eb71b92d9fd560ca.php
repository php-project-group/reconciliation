<?php if (!defined('THINK_PATH')) exit();?><!--->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/reconciliation/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        * {padding: 10px}
    </style>
</head>
<!--<body>-->
<!--Hello,<?php echo ($name); ?>!-->

<!--&lt;!&ndash;<?php echo (session('user_id')); ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php echo ($_SERVER['SCRIPT_NAME']); ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php echo ($_GET['pageNumber']); ?>&ndash;&gt;-->

<!--&lt;!&ndash;<?php echo (L("page_error")); ?>&ndash;&gt;-->

<!--<?php echo ($path); ?> /reconciliation/Public-->

<!--&lt;!&ndash;<?php echo (L("_MODULE_NOT_EXIST_")); ?>&ndash;&gt;-->
<!--&lt;!&ndash;<?php if(($status) == "1"): ?>&ndash;&gt;-->
<!--&lt;!&ndash;正常&ndash;&gt;-->
<!--&lt;!&ndash;<?php endif; ?>&ndash;&gt;-->

<!--</body>-->

<body>
<h2>Excel导出</h2>
<div class='wst-tbar' style="height:50px">
    <form method="post" action="<?php echo U('Home/Index/export','','');?>" enctype="multipart/form-data">
        <button type="submit" class="btn btn-success glyphicon glyphicon-plus">导出</button>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr> <th>姓名</th><th>手机号码</th> <th>性别</th><th>email</th></tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr><td><?php echo ($vo['user_name']); ?></td><td><?php echo ($vo['user_phone']); ?></td><td><?php echo ($vo['user_sex']); ?></td><td><?php echo ($vo['user_email']); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>

</html>