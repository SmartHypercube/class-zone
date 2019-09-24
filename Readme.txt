1.lib.php里有环境变量，依次是标题，bbs网址，qq群网址，管理员，管理老师，mySQL主机地址，mySQL登录名，密码，database的名字，管理密码（由管理员持有，在发布信息或删除信息时需要）。
2.在一个新的php系统中安装的步骤如下：进入php后台（默认用户名root密码空），新建一个database（或执行SQL语句：create database 数据库名），在lib.php中设置数据库名等环境变量，从浏览器中打开install.php，只要最后出来“结果”就说明成功，如果不成功，去后台drop掉（删除）database再重建，重安装。现在就可以浏览index.php了，缩小浏览器窗口将依次呈现平板版和手机版。
3.未尽事宜及版权声明见about.php。
