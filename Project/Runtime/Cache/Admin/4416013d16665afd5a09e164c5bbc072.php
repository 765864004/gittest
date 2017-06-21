<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent" style="height:500px;overflow-y:auto;">
    <form  class="pageForm required-validate"  action="<?php echo U('admin/admin_manage/editRole');?>" onsubmit="return validateCallback(this,dialogAjaxDone)" method="post" >
    <table id="UserListTable" class="list" width="100%"  >
        <tbody>
            <tr>
                <td align="center" width='200'><label>角色名</label></td>
                <td align="left"><input type='text' name='name'  value="<?php echo ($rolePo['name']); ?>"   class="required"/></td>
            </tr>
            <tr>
                <td align="center"><label>是否启用</label></td>
                <td align="left">
                    <input type="radio" name="status" value="Y" <?php if(($rolePo['status']) == "Y"): ?>checked<?php endif; ?>/>是
                    <input type="radio" name="status" value="N" <?php if(($rolePo['status']) == "N"): ?>checked<?php endif; ?>/>否
                </td>
            </tr>
            <tr>
                <td align="center" colspan='2'><label>权限配置</label></td>
            </tr>
            <?php if(is_array($moduleList)): $k = 0; $__LIST__ = $moduleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                    <td><?php echo ($vo['title']); ?></td>
                    <td><input type="checkbox" class="selectSub" value="<?php echo ($k); ?>"/>全选</td>
                </tr>
                <tr>
                    <td colspan='2' class="action<?php echo ($k); ?>">
                        <?php if(is_array($vo['actionList'])): $i = 0; $__LIST__ = $vo['actionList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$actionVo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="nodeId[]" class="perAction" value="<?php echo ($actionVo['id']); ?>" <?php if(in_array($actionVo['id'], $roleNodeIdArr)){echo "checked";}?>/><?php echo ($actionVo['title']); ?>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td align="center" width='200'><label>角色描述</label></td>
                <td align="left"><textarea name="description" rows="1" cols="80"><?php echo ($rolePo['description']); ?></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan='2' align='right'><input type='submit' value='提交' /><input type='reset' value='重置' /></td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="id" value="<?php echo ($rolePo['id']); ?>"/>
    </form>
</div><!-- pageContent end -->
<script>
$(function(){
	$(".selectSub").click(function(){
		var obj = $(this);
		var value = obj.val();
		if(obj.attr('checked') == 'checked'){
			$(".action"+value).children("input[type='checkbox']").attr("checked", "checked");
		}else{
			$(".action"+value).children("input[type='checkbox']").removeAttr("checked");
		}
	})
	$(".perAction").click(function(){
		if($(this).attr('checked') == undefined){
			$(this).parents('tr').prev().find("input[type='checkbox']").removeAttr("checked");
		}else{
			var flag = 1;
			$(this).parents('td').find("input[type='checkbox']").each(function(){
				if($(this).attr("checked") == undefined){
					flag = 0;
					return;
				}
			})
			if(flag == 1){
				$(this).parents('tr').prev().find("input[type='checkbox']").attr("checked", "checked");
			}
		}
	})
})
</script>