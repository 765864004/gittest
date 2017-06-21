<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/task_manage/educationList');?>" method="post" onSubmit='return navTabSearch(this);'>
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"    value="<?php echo ($pageSize); ?>"   />
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            任务名称：
            <input type="text" name="taskname" value="<?php echo ($taskname); ?>"/>&nbsp;
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
    
	<div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/task_manage/educationadd');?>" target="dialog" width="500" height="160" mask=true title='添加检修答案'><span>添加</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin/task_manage/educationedit');?>?id={sid}" target="dialog" width="500" height="160" mask=true warn="您没有选中" title='编辑检修答案'><span>修改</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/task_manage/educationProcess');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	    </ul>
	</div>
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
        <thead>
                <tr>
                    <th align='center'>任务名称</th>
					<th align='center'>题型</th>
					<th align='center'>答案</th>
					<th align='center'>问题提示框上文字</th>
					<!--
                    <th align='center'>车型</th>
                    <th align='center'>检修级别</th>
                    <th align='center'>热点</th>
                    <th align='center'>部位</th>
                    <th align='center'>部件</th>
                    <th align='center'>工具</th>
                    <th align='center'>工具得分</th>
                    <th align='center'>操作得分</th>
                    <th align='center'>答题得分</th>
					-->
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['mid']); ?>">
                    <td align='center'><?php echo ($vo['taskname']); ?></td>
					<td align='center'><?php if($vo['opttype'] == 1):?>选择<?php elseif($vo['opttype'] == 2):?>填空<?php elseif($vo['opttype'] == 3):?>操作<?php endif;?></td>
					<td align='center'><?php if($vo['opttype'] == 1): echo ($chageType[$vo['tret']]); else: echo ($vo['trettxt']); endif;?></td>
					<td align='center'><?php echo ($vo['ttooltip']); ?></td>
					<!--
                    <td align='center'><?php echo $crh[$vo['CRH']];?></td>
                    <td align='center'>
                        <?php if(is_array($JXTypeArr)): $i = 0; $__LIST__ = $JXTypeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Jxvo): $mod = ($i % 2 );++$i; if(($vo['level']& $key) == $key): echo ($Jxvo); ?>&nbsp;&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                    <td align='center'><?php echo ($vo['name3']); ?></td>
                    <td align='center'>
                        <?php if(is_array($BWTypeArr)): $i = 0; $__LIST__ = $BWTypeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bwvo): $mod = ($i % 2 );++$i; if(($vo['area']& $key) == $key): echo ($Bwvo); ?>&nbsp;&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                    <td align='center'><?php echo ($vo['name2']); ?></td>
                    <td align='center'><?php echo ($vo['name1']); ?></td>
                    <td align='center'><?php echo ($vo['hold2']); ?></td>
                    <td align='center'><?php echo ($vo['hold1']); ?></td>
                    <td align='center'><?php echo ($vo['pow']); ?></td>
					-->
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