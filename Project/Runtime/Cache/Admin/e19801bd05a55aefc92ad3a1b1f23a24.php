<?php if (!defined('THINK_PATH')) exit();?>
<!--试卷信息管理-->
<div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/yks_manage/ytaskPageList');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"    value="<?php echo ($pageSize); ?>"   />
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            试卷名称：
            <input type="text" name="unitname" value="<?php echo ($unitname); ?>"/>&nbsp;
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
   <div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/yks_manage/ytaskpageAdd');?>" target="dialog" width="510" height="400" mask=true title='添加试卷'><span>添加</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/yks_manage/ytaskpageDel');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	    </ul>
	</div>
   
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
           <thead>
                <tr>
                    <th align='center'>试卷名称</th>
					<th align='center'>总分</th>
					<th align='center'>考试时长</th>
                    <th align='center'>任务名称</th>
                    <th align='center'>试卷步骤</th>
                    <th align='center'>任务编号</th>
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($taskpages)): $i = 0; $__LIST__ = $taskpages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$taskpage): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($taskpage['id']); ?>"> <!--删除 id-->
                    <td align='center'><?php echo ($taskpage['unitname']); ?></td>
					<td align='center'><?php echo ($taskpage['score']); ?></td>
					<td align='center'><?php echo ($taskpage['time']); ?></td>
                    <td align='center'><?php echo ($taskpage['uname']); ?></td>
                    <td align='center'>
                        <a href="<?php echo U('admin/yks_manage/ytaskpageStep', array('errornum'=>$taskpage['errornum']));?>" width="350" height="320" target="dialog" title='试卷步骤'>查看</a>
                    </td>
                    <td align='center'><?php echo ($taskpage['errornum']); ?></td>
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