<?php if (!defined('THINK_PATH')) exit();?><!--成绩信息管理-->
<div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/yks_manage/ytaskResultList');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"     value="<?php echo ($pageSize); ?>"   />
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            试卷名称：
            <select  name="khid">
                <option value="">全部
                <?php if(is_array($pageList)): $i = 0; $__LIST__ = $pageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pagePo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pagePo['id']); ?>" <?php if($khid == $pagePo['id']):?>selected<?php endif;?>><?php echo ($pagePo['unitname']); endforeach; endif; else: echo "" ;endif; ?>
            </select>&nbsp;
            部门：
            <select  name="departid">
                <option value="">全部
                <?php if(is_array($bumenList)): $i = 0; $__LIST__ = $bumenList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$departPo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($departPo['id']); ?>" <?php if($departRid == $departPo['id']):?>selected<?php endif;?>><?php echo ($departPo['name']); endforeach; endif; else: echo "" ;endif; ?>
            </select>&nbsp;
            学生真实姓名：
            <input type="text" name="truename" value="<?php echo ($truename); ?>"/>&nbsp;
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
    </form>
</div><!-- pageHeader end -->


<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="edit" href="<?php echo U('admin/yks_manage/yreks');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中"><span>设置重考</span></a></li>
            <li class="line">line</li>
            <li><a title="导出成绩到execl文本"  target="dialog" href="<?php echo U('admin/yks_manage/ytoexcel');?>" class="icon" width="510" height="140"><span>导出EXCEL</span></a></li>
        </ul>
    </div>

    <table class="list result" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
        <thead>
        <tr>
            <th align='center'>学生姓名</th>
            <th align='center'>性别</th>
            <th align='center'>部门</th>
            <th align='center'>试卷名称</th>
            <th align='center'>任务名称</th>
            <th align='center'>开始时间</th>
            <th align='center'>结束时间</th>
            <th align='center'>考试得分</th>
            <th align='center'>考试状态</th>
            <th align='center'>查看成绩</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($khbases)): $i = 0; $__LIST__ = $khbases;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$khbase): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($khbase['id']); ?>">
            <td align='center'>
                <?php echo ($khbase['truename']); ?>
                <input type="hidden" class="id" value=<?php echo ($khbase['id']); ?> />
                <input type="hidden" class="userid" value=<?php echo ($khbase['userid']); ?> />
            </td>
            <td align='center'><?php if(($khbase['usex']) == "0"): ?>男<?php else: ?>女<?php endif; ?></td>
            <td align='center'><?php echo ($khbase['departname']); ?></td>
            <td align='center'><?php echo ($khbase['unitname']); ?></td>
            <td align='center'><?php echo ($khbase['uname']); ?></td>
            <td align='center'><?php if(!empty($khbase['starttime'])): echo (date("Y-m-d H:i:s",$khbase['starttime'])); endif; ?></td>
            <td align='center'><?php if(!empty($khbase['endtime'])): echo (date("Y-m-d H:i:s",$khbase['endtime'])); endif; ?></td>
            <td align='center' class="score"><?php echo ($khbase['score']); ?></td>
            <td align='center'>
                <?php
 switch($khbase['status']){ case "0": echo "未开始";break; case "1": echo "考试开始";break; case "2": echo "考试结束";break; case "10": echo "未补考";break; case "11": echo "补考开始";break; case "12": echo "补考结束";break; default: break; } ?>
            </td>
            <td align='center'>
                <?php if( ($khbase['status'] == 2 || $khbase['status'] == 12) && !isset($khbase['score']) ):?>
                    <!--<a href="#" class="dafen" onclick="score(this)">评分|</a>-->
                    <!--<button class="dafen">评分</button>-->
                    <a href="#" class="dafen">评分</a>
                <?php endif;?>

                <?php if( ($khbase['status'] == 2 || $khbase['status'] == 12) && isset($khbase['score']) ):?>
                    <a href="<?php echo U('Home/Indexy/yresult', array('userid'=>$khbase['userid'], 'userscoreid'=>$khbase['id']));?>" target="_blank">查看</a>
                    <!--<a href="<?php echo U('Home/Indexy/echart', array('userid'=>$khbase['userid'], 'userscoreid'=>$khbase['id']));?>" target="_blank">曲线图</a>-->
                <?php endif;?>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="25" <?php if(($pageSize) == "25"): ?>selected<?php endif; ?>>25</option>
                <option value="50" <?php if(($pageSize) == "50"): ?>selected<?php endif; ?>>50</option>
                <option value="100" <?php if(($pageSize) == "100"): ?>selected<?php endif; ?>>100</option>
                <option value="200" <?php if(($pageSize) == "200"): ?>selected<?php endif; ?>>200</option>
            </select>
            <span>条，共<?php echo ($totalCount); ?>条</span>
        </div><!--pages end -->
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($pageSize); ?>" pageNumShown="5" currentPage="<?php echo ($currentPage); ?>"></div>
    </div><!-- panelBar end -->

</div><!-- pageContent end -->
<!--<script src="__PUBLIC__/jquery-1.12.0.min.js"></script>-->
<!--<script src="__PUBLIC__/dwz/js/jquery-1.7.1.min.js" type="text/javascript"></script>-->
<style>
    .result th, .result td{ text-align: center;}
</style>
<script>

    //    function score(_this){
    //
    //        var info = {
    //            //id:$(this).parents("tr").data("id"); //获取id
    //            khid:$(_this).parents('tr').find('.khid').val(),
    //            userid:$(_this).parents('tr').find('.userid').val()
    //        }
    //
    //        //console.log();
    //        var url="<?php echo U('home/indexy/score');?>";
    //        $.ajax({
    //            type : 'post' ,
    //            url : url ,
    //            data : info ,
    //            success : function(data){
    //                console.log(data);
    //                if(data==1){
    //                    alert("评分成功");
    //                }else{
    //                    alert("评分失败");
    //                }
    //            }
    //        })
    //    }

    $(function(){
        $(".dafen").click(function(){
            var _this = $(this);

            var info = {
                //id:$(this).parents("tr").data("id"); //获取id
                id:_this.parents('tr').find('.id').val(),
                userid:_this.parents('tr').find('.userid').val()
            }
            console.log(info);

            //console.log(info);
            var url="<?php echo U('home/indexy/score');?>";
            $.getJSON(url,info,function(data){ //
//                var array = eval("("+data+")"); //json转换为数组
//                console.log(array);

                console.log(data);
                if(data.data==1){
                    _this.parents('tr').find(".score").text(data.score);
                    alert("评分成功");
                }else{
                    alert("评分失败");
                }
            })
        })
    })

</script>