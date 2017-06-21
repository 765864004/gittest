<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent"  style="height:485px;overflow-y:auto;">
    <form  class="pageForm required-validate"  action="<?php echo U('admin/yks_manage/ytaskpagefpAddzx');?>" onsubmit="return validateCallback(this,dialogAjaxDone)" method="post" >
    <table id="UserListTable" class="list" style="width:100%;">
        <tbody>
            <tr>
                <td align="center" width='150'><label>选择试卷</label></td>
                <td align="left">
                    <select name="khid">
                        <?php if(is_array($shijuans)): $i = 0; $__LIST__ = $shijuans;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shijuan): $mod = ($i % 2 );++$i;?><option value="<?php echo ($shijuan['id']); ?>"><?php echo ($shijuan['unitname']); endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <!--  -->
            <tr>
                <td align="center" width='150'><label>选择部门</label></td>
                <td align="left">
                    <select name="departid" id="departid">
                        <option value="">全部
                            <?php if(is_array($departList)): $i = 0; $__LIST__ = $departList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$departPo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($departPo['id']); ?>"><?php echo ($departPo['name']); endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center" width='150'><label>选择学员</label></td>
                <td align="left">
                    <select name="userId[]" multiple="multiple" id="departUser" style="width:150px;" size="15">
                        <?php echo ($userOption); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan='2' align='right'><input type='submit' value='提交' /><input type='reset' value='重置' /></td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="submit" value="1"/>
    </form>
</div><!-- pageContent end -->
<script>
$(function(){

    $("#departid").die().live("change", function(){
    	$("#departUser").html('');
    	
    	var id = $(this).val(); //获取部门id
        
       	var url="<?php echo U('admin/yks_manage/ajaxGetUserByDepartId');?>";
           $.post(url,{'id':id},function(data){
               $("#departUser").html(data.data);
           },'json')
    });
    
})
 </script>