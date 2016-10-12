<div class="navbar-default sidebar">
	<div class="navbar-header">
      <button type="button" class="navbar-toggle" title="伸缩导航" > <span class="sr-only">伸缩导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="http://www.qiyiguo.tv" target="_blank">奇异果聚合</a> </div>
    <div class="clearfix"></div>
    <div class="sidebar-nav navbar-collapse"> 
      
      <!-- user profile pic -->
      <div class="userprofile text-center">
        <div class="userpic">
          <img src="img/100100.png" alt="" class="userpicimg">
          <!-- 判断是否有后台权限，有后台权限显示此按钮后可互相切换 -->
          <a href="masterIndex.php" title="切换至后台用户" class="btn btn-primary settingbtn"><i class="fa fa-random"></i></a>
          <!-- 判断是否有后台权限，有后台权限显示此按钮后可互相切换 -->
        </div>
        <h3 class="username">登录帐号</h3>
        <p>用户组</p>
      </div>
      <div class="clearfix"></div>
      <!-- user profile pic -->
      
	   <ul class="nav" id="side-menu">
        <li> <a href="userindex.php"><i class="fa fa-dashboard fa-fw"></i> 用户中心</a> </li>
        <li> <a href="userFansList.php"><i class="fa fa-users fa-fw"></i> 我的粉丝</a> </li> 
        <li> <a href="userFollowList.php"><i class="fa fa-heart fa-fw"></i> 我的关注</a></li>
        <li> <a href="userCollectList.php"><i class="fa fa-star fa-fw"></i> 我的收藏</a></li>       
        <li>
          <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-save"></i> 内容管理 <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li><a href="userAddIndex.php">发布</a></li>
            <li><a href="userArchivesList.php">列表</a></li>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li> <a href="userProfile.php"><i class="fa fa-gear fa-fw"></i> 个人设置</a> </li>   
        <li> <a href="#"><i class="fa fa-sign-out fa-fw"></i> 注销</a> </li>    
      </ul>
    </div>
</div>