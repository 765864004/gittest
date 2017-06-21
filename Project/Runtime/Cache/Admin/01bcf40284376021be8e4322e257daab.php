<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/ks_manage/taskpagefpList');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
        <!--  
        <input type="hidden" name="currentPage" value="<?php echo ($currentPage); ?>"/>
        <input type="hidden" name="pageSize"    value="<?php echo ($pageSize); ?>"   />
        -->
        <input type="hidden" name="_order" value="<?php echo $_REQUEST['_order']?>"/>
        <input type="hidden" name="_sort" value="<?php echo $_REQUEST['_sort']?>"/>
        <div id='search'>
            试卷名称：
            <input type="text" name="name" value="<?php echo ($name); ?>"/>&nbsp;
            <!--  
            学生用户名：
            <input type="text" name="uname" value="<?php echo ($uname); ?>"/>&nbsp;
            学生真实姓名：
            <input type="text" name="truename" value="<?php echo ($truename); ?>"/>&nbsp;
            -->
            <input type='submit' value='查询'/>
            <input type="hidden" name="submit" value='1'/>
        </div>
   </form>
</div><!-- pageHeader end -->


<div class="pageContent">
   <div class="panelBar">
	    <ul class="toolBar">
	        <li><a class="add" href="<?php echo U('admin/ks_manage/taskpagefpAdd');?>" target="dialog" width="510" height="370" mask=true title='分配试卷'><span>添加</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin/ks_manage/taskpagefpEdit');?>?id={sid}" target="dialog" width="750" height="370" mask=true warn="您没有选中" title='重新分配试卷'><span>编辑</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/ks_manage/taskpageFpDel');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
	        <li class="line">line</li>
	    </ul>
	</div>
   
    <table class="table" width="99%" layoutH="117" targetType="navTab" asc="asc" desc="desc">
           <thead>
                <tr>
                    <th align='center'>试卷名称</th>
					<th align='center'>考试时长(分钟)</th>
					<th align='center'>考试有效期</th>
                    <th align='center'>查看考试人员</th>
                </tr>
         </thead>
         <tbody>
                <?php if(is_array($kaoshiList)): $i = 0; $__LIST__ = $kaoshiList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($vo['autoid']); ?>">
                    <td align='center'><?php echo ($vo['name']); ?></td>
					<td align='center'><?php echo ($vo['kstime0']/60); ?></td>
					<td align='center'><?php echo (date("Y-m-d H:i:s",$vo['kstime1'])); ?>&nbsp;&nbsp;至&nbsp;&nbsp;<?php echo (date("Y-m-d H:i:s",$vo['kstime2'])); ?></td>
                    <td align='center'>
						<a href="<?php echo U('admin/ks_manage/taskpageFpuser', array('id'=>$vo['autoid']));?>" width="200" height="320" target="dialog" title='考试学生'>查看</a>
						<!--
						<div class="ksUser" style="width:50px;height:200px;overflow:scroll;line-height:15px;font-size:12px;display:none;">
                        <?php if(is_array($userKaoshiArr[$vo[autoid]])): $i = 0; $__LIST__ = $userKaoshiArr[$vo[autoid]];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$userpo): $mod = ($i % 2 );++$i; echo ($userpo); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						-->
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
    </table>
	<!--
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
        </div>
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($pageSize); ?>" pageNumShown="5" currentPage="<?php echo ($currentPage); ?>"></div>
    </div>
	-->

</div><!-- pageContent end -->