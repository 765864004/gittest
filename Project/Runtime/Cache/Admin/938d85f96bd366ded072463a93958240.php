<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/dictionary_manage/toollist');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"    value="<?php echo ($pageSize); ?>"   />
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            工具名称：
            <input type="text" name="tipname" value="<?php echo ($tipname); ?>"/>&nbsp;
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
   <div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/dictionary_manage/tooladd');?>" target="dialog" width="510" height="230" mask=true title='添加工具'><span>添加</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin/dictionary_manage/tooledit');?>?id={sid}" target="dialog" width="510" height="230" mask=true warn="您没有选中" title='编辑工具'><span>修改</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/dictionary_manage/toolProcess');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	    </ul>
	</div>
   
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
           <thead>
                <tr>
                    <th align='center'>ID</th>
                    <th align='center'>工具名称</th>
					<th align='center'>图片名称</th>
                    <th align='center'>鼠标名称</th>
                    <th align='center'>检修类别</th>
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['id']); ?>">
                    <td align='center'><?php echo ($vo['id']); ?></td>
                    <td align='center'><?php echo ($vo['tipname']); ?></td>
					<td align='center'><?php echo ($vo['picname']); ?></td>
                    <td align='center'><?php echo ($vo['mousename']); ?></td>
                    <td align='center'>
                        <?php if(is_array($JXTypeArr)): $i = 0; $__LIST__ = $JXTypeArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Jxvo): $mod = ($i % 2 );++$i; if(($vo['uselev']& $key) == $key): echo ($Jxvo); ?>&nbsp;&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
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