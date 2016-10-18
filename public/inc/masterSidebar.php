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
          <a href="userIndex.php" title="切换至普通用户" class="btn btn-primary settingbtn"><i class="fa fa-random"></i></a>
          <!-- 判断是否有后台权限，有后台权限显示此按钮后可互相切换 -->
        </div>
        <h3 class="username">登录帐号</h3>
        <p>用户组</p>
      </div>
      <div class="clearfix"></div>
      <!-- user profile pic -->
      
	    <ul class="nav" id="side-menu">
        <li> <a href="masterIndex.php"><i class="fa fa-dashboard fa-fw"></i> 控制中心</a> </li>
        <li> <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-users"></i> 用户管理 <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
				    <li><a href="masterMemberList.php">用户列表</a></li>
            <li><a href="#">编辑绩效</a></li>
			    </ul>
        <!-- /.nav-second-level --> 
        </li>
        <li>
          <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-save"></i> 内容管理 <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li><a href="masterArchivesReviewList.php">待审核内容</a></li>
    				<li><a href="masterArchivesList.php">所有内容</a></li>
			    </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li>
          <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-tag"></i> 标签管理 <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li><a href="masterTagAdd.php">新增</a></li>
            <li><a href="masterTagsList.php">列表</a></li>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li> <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-file"></i> 栏目管理 <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
        <li><a href="masterCategoryAdd.php">新建栏目</a></li>
        <li><a href="masterCategoryList.php">栏目列表</a></li>
      </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li> <a href="masterPowers.php"><i class="fa fa-user fa-fw"></i> 权限管理</a> </li>
        <li> <a href="masterGlobal.php"><i class="fa fa-gear fa-fw"></i> 全局变量</a> </li>   
        <li> <a href="#"><i class="fa fa-sign-out fa-fw"></i> 注销</a> </li>    
      </ul>
    </div>
</div>