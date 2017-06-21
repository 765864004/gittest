<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader">
    <form id="pagerForm" action="<?php echo U('admin/yks_manage/ytaskpagefpList');?>" method="post" onSubmit='return navTabSearch(this);' class="pageForm required-validate">
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
	        <li><a class="add" href="<?php echo U('admin/yks_manage/ytaskpagefpAdd');?>" target="dialog" width="510" height="370" mask=true title='分配试卷'><span>添加</span></a></li>
	        <li><a class="edit" href="<?php echo U('admin/yks_manage/ytaskpagefpEdit');?>?id={sid}" target="dialog" width="750" height="370" mask=true warn="您没有选中" title='重新分配试卷'><span>编辑</span></a></li>
	        <li class="line">line</li>
	        <li><a class="delete" href="<?php echo U('admin/yks_manage/ytaskpageFpDel');?>?id={sid}&actType=del" target="ajaxTodo" warn="您没有选中" title="确定要删除吗？"><span>删除</span></a></li>
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
                <?php if(is_array($fplists)): $i = 0; $__LIST__ = $fplists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fplist): $mod = ($i % 2 );++$i;?><tr target="sid" rel="<?php echo ($fplist['khid']); ?>"><!--试卷id-->
                    <td align='center'><?php echo ($fplist['shijuan']['unitname']); ?></td>
					<td align='center'><?php echo ($fplist['shijuan']['time']); ?></td>
					<td align='center'><?php echo (date("Y-m-d H:i:s",$fplist['starttime'])); ?>至<?php echo (date("Y-m-d H:i:s",$fplist['endtime'])); ?></td>
                    <td align='center'>
						<a href="<?php echo U('admin/yks_manage/ytaskpageFpuser', array('khid'=>$fplist['khid']));?>" width="200" height="320" target="dialog" title='考试学生'>查看</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
    </table>


</div><!-- pageContent end -->