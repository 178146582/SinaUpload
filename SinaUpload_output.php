<?php
if(!defined('EMLOG_ROOT')){die('error');}
$sina_set = unserialize(ltrim(file_get_contents(dirname(__FILE__).'/config.php'),'<?php die; ?>'));
echo '
<style>
#sina_pick{max-width:35%;}
#sina_list{margin:2px 0;font-size:12px;}
.sina_pic{margin:2px;width:160px;height:120px;display:inline-block;}
.sina_act{padding-top:50px;width:160px;height:70px;background:rgba(0,0,0,0.2);text-align:center;}
.sina_act a{color:#FFF;font-weight:bold;text-shadow:1px 1px 3px #000;}
</style>
<script>
var sina_user="'.$sina_set['user'].'"; 
var sina_pass="'.$sina_set['pass'].'"; 
var sina_upurl="'.$sina_set['up'].'"; 
var sina_thumb="'.$sina_set['th'].'";
var sina_size=["large", "mw1024", "mw690", "bmiddle", "small", "thumb180", "thumbnail", "square"];
function sina_cpone(numb){
'.$sina_set['callback'].'
}
function sina_cpall(){
if(!sina_skep.length){alert("队列为空");}
for(var numb=0;numb<sina_skep.length;numb++){sina_cpone(numb);}
}
function sina_show(node){
var item=document.createElement("div");
item.setAttribute("id","sina_body");
item.innerHTML="<input type=\"file\" onchange=\"sina_cpick()\" id=\"sina_pick\" multiple=\"multiple\" accept=\"image/jpeg,image/jpg,image/png,image/gif\" /><input type=\"button\" onclick=\"sina_cpush()\" id=\"sina_push\" value=\"开始\" style=\"margin-top: 10px;margin-right: 10px\" /><input type=\"button\" onclick=\"sina_cpall()\" value=\"插入\" /><div id=\"sina_list\"></div>";
if(document.getElementById("sina_body")){node.parentNode.removeChild(document.getElementById("sina_body"));}
else{node.parentNode.appendChild(item);}
}
</script>
<script src="'.BLOG_URL.'content/plugins/SinaUpload/sina.js"></script>
';
?>