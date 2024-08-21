<?php
//抓取html中dom的数据
// 示例HTML
$html = <<<HTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN">
<html>
<head>
    <title>这是标题</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="https://saas.zowoyoo.com/css/global.css">
	<script type="text/javascript" language="JavaScript" src="https://saas.zowoyoo.com/js/currency/currency_utils.js"></script>
</head>
<body>
<table width="960" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td width="60%" height="18">当前位置：<a href="list.jsp">订单管理</a> > 查看订单信息</td>
    </tr>
    <tr>
        <td height="2" bgcolor="#003333"></td>
    </tr>
</table>
<br>
HTML
;

// 创建DOMDocument对象
$dom = new DOMDocument('1.0', 'UTF-8');
// 禁用libxml错误处理以避免警告
libxml_use_internal_errors(true);
// 加载HTML内容，注意此处我们设置了编码为UTF-8
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
// 启用libxml错误处理
libxml_clear_errors();
// 创建DOMXPath对象
$xpath = new DOMXPath($dom);

//子节点数量从1开始
//$nodes = $xpath->query("//form[1]/table[1]/tr[1]/td[1]/table[1]/tr[1]/td[1]");
$nodes = $xpath->query("//table[1]/tr[1]/td[1]/a[1]");

// 提取并输出文本内容
if ($nodes->length > 0) {
    // 获取第一个匹配的节点
    $node = $nodes->item(0);
    // 获取节点内的文本
    echo $node->textContent;
} else {
    echo "未找到指定节点。";
}