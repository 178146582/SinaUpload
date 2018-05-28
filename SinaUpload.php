<?php
/*
Plugin Name: 新浪图床
Version: 1.1
Description: 把图片上传到新浪云存储
Author: 阿珏
Author URL: http://www.52ecy.cn
*/
if(!defined('EMLOG_ROOT')){die('error');}
function sina_head(){require 'SinaUpload_output.php';echo '<span onclick="sina_show(this);" class="show_advset">新浪图床</span>';}
function sina_menu(){echo '<div class="sidebarsubmenu"><a href="./plugin.php?plugin=SinaUpload">新浪图床</a></div>';}
addAction('adm_writelog_head', 'sina_head');
addAction('adm_sidebar_ext', 'sina_menu');