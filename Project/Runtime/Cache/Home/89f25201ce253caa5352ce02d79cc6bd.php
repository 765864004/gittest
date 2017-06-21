<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>成绩查询结果</title>
</head>
<body>
<h1>成绩查询结果</h1><br/><br/>
<table style="width:800px;">
    <tr>
        <th>学生姓名</th>
        <th>登陆名</th>
        <th>考核时间</th>
        <th>总分</th>
    </tr>
    <tr>
        <td><?php echo ($userInfo["truename"]); ?></td>
        <td><?php echo ($userInfo["uname"]); ?></td>
        <td><?php echo ($kaohegroup['time']); ?>分钟</td>
        <td><?php echo ($kaoshiResult['score']); ?></td>
    </tr>
</table>
<br/>

<table style="width:800px;">
    <tr>
        <th style="width:30%;">任务名称</th>
        <th style="width:42%;">步骤名称</th>
        <th style="width:14%;">标准得分</th>
        <th style="width:14%;">答题得分</th>
    </tr>
    <?php if(is_array($taskResultPo)): $i = 0; $__LIST__ = $taskResultPo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i;?><tr>
        <td class="lft"><?php echo ($key); ?></td>
        <td colspan='3'>
            <table>
                <?php if(is_array($po)): $i = 0; $__LIST__ = $po;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="lft" style="width:60%;"><?php echo ($vo['tipinfor']); ?></td>
                    <!--<td style="width:20%;"><?php if(($vo['roleid']) == "1"): ?>0 <?php else: ?> <?php echo ($vo['score']); endif; ?> </td>-->
                    <td style="width:20%;"><?php echo ($vo['score']); ?></td>
                    <td style="width:20%;">
                        <?php if(!isset($vo['dfscore'])):?>
                            未操作
                        <?php else: ?>
                            <?php echo ($vo['dfscore']); ?>
                        <?php endif;?>　
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>

<style>
    * {
        text-align: center;
        margin: 0 auto;
        padding: 0 auto;
    }

    body {
        padding-top: 100px;
    }

    table {
        width: 100%;
        font-size: 15px;
        border-collapse: collapse;
    }

    table tr, table th, table td {
        height: 30px;
        border: 1px gray solid;
    }

    table .lft {
        text-align: left;
        text-indent: 10px;
    }
</style>