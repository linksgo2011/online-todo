<div id="view_info">
<p>旺旺:<?php echo $task['Task']['wangwang']; ?><a data="<?php echo $task['Task']['wangwang']; ?>" href="javascrip:void(0)">复制</a></p>
<p>QQ:<?php echo $task['Task']['qq']; ?><a data="<?php echo $task['Task']['wangwang']; ?>" href="javascrip:void(0)">复制</a></p>
<p>电话:<?php echo $task['Task']['tel']; ?> <a data="<?php echo $task['Task']['wangwang']; ?>" href="javascrip:void(0)">复制</a></p>
</div>  
<script type="text/javascript" src="./js/jquery.zclip.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#view_info a").zclip({
        path: "/ZeroClipboard.swf",
        copy: function(){
            return $(this).attr("data");
        },
        beforeCopy:function(){/* 按住鼠标时的操作 */
        },
        afterCopy:function(){/* 复制成功后的操作 */
            alert("复制成功!");
        }
    });
});
</script>