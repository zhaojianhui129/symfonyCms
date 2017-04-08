symfonyCms
==========

A Symfony project created on April 8, 2017, 3:22 pm.

###中文文档地址
http://www.symfonychina.com/doc/current/index.html

###安装Symfony Installer
```sh
sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
sudo chmod a+x /usr/local/bin/symfony
#1、创建Symfony程序
symfony new my_project_name
#令你的程序运行在特定Symfony版本
symfony new my_project_name 3.0
#安装器还支持一个特殊版本lts，即最新的长期维护版本
symfony new my_project_name lts

```
###不使用安装器来创建Symfony程序
```sh
#用Composer创建Symfony程序
composer create-project symfony/framework-standard-edition my_project_name
#若需指定版本，提供版本号作为create-project的第二个参数
composer create-project symfony/framework-standard-edition my_project_name "3.0.*"

```

###运行Symfony
在开发时，Symfony利用了PHP内置的web服务器。因此，运行Symfony程序关乎项目所在目录并执行如下命令：
```sh
cd my_project_name/
php bin/console server:run
```

#安装推荐扩展
###intl
首先安装ICU，安装方法：http://www.linuxeye.com/Linux/2374.html
```sh
wget http://download.icu-project.org/files/icu4c/59rc/icu4c-59rc-src.tgz
tar xf icu4c-59rc-src.tgz
cd icu/source
./configure --prefix=/usr/local/icu
sudo make && sudo make install
```
安装intl
```sh
wget http://pecl.php.net/get/intl-3.0.0.tgz
tar -xzf intl-3.0.0.tgz 
cd intl-3.0.0/
/usr/local/php/bin/phpize
./configure --enable-intl --with-icu-dir=/usr/local/icu/ --with-php-config=/usr/local/php/bin/php-config
sudo make && sudo make install
```
