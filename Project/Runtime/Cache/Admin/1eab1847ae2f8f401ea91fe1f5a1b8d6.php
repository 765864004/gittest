<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/ks_manage/taskPageList');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"    value="<?php echo ($pageSize); ?>"   />
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            试卷名称：
            <input type="text" name="name" value="<?php echo ($name); ?>"/>&nbsp;
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
   <div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/ks_manage/taskpageAdd');?>" target="dialog" width="510" height="520" mask=true title='添加试卷'><span>添加</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/ks_manage/taskpageDel');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	    </ul>
	</div>
   
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
           <thead>
                <tr>
                    <th align='center'>试卷名称</th>
					<th align='center'>车型</th>
					<th align='center'>检修级别</th>
					<th align='center'>任务部位</th>
                    <th align='center'>出卷教师</th>
                    <th align='center'>考试时间</th>
                    <th align='center'>考试有效时间</th>
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['autoid']); ?>">
                    <td align='center'><?php echo ($vo['name']); ?></td>
					<td align='center'><?php echo ($crh[$araeArr[$vo['autoid']]['CRH']]); ?></td>
					<td align='center'><?php echo ($JXTypeArr[$araeArr[$vo['autoid']]['level']]); ?></td>
					<td align='center'><?php echo ($BWTypeArr[$araeArr[$vo['autoid']]['area']]); ?></td>
                    <td align='center'><?php echo ($adminArr[$vo['tid']]); ?></td>
                    <td align='center'><?php echo ($vo['kstime0']/60); ?>分钟</td>
                    <td align='center'><?php echo (date("Y-m-d H:i:s",$vo['kstime1'])); ?>&nbsp;&nbsp;至&nbsp;&nbsp;<?php echo (date("Y-m-d H:i:s",$vo['kstime2'])); ?></td>
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