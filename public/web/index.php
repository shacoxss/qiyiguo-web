<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>逻辑判断</title>
</head>

<body>
  <h2>
  这个页面没有UI，是一个逻辑判断的页面，根据用户的权限选择加载的页面<br>
  一般用户加载<a href="userIndex.php">userIndex.php</a><br>
  网站管理员加载<a href="masterIndex.php">masterIndex.php</a><br>
  以上两个页面都要做验证，防止不同权限的用户根据网址做渗透<br><br>
  注：文件名称命名规则：<br>
  1.所有文件采用驼峰法+英文命名，即首单词小写，之后每个单词第一个字母大写，如：userIndex.php loginSuccess.php禁止使用汉语拼音、下划线、破折号等方式命名<br>
  2.user开头的文件是普通用户专用的<br>
  3.master是管理员专用的<br>
  4.没有user或者master开头的文件是通用的，通用文件需要根据权限判断左边栏加载不同文件<br>
  </h2>
</body>
</html>
