一个 2013 年 9 月做的项目的存档

```bash
docker run --rm --name classzone -p 8080:80 -v <path>:/var/www/html fauria/lamp
docker exec -it classzone bash
mysql <<<EOF
create database zonetest;
grant all privileges on *.* to 'username'@'localhost' identified by 'password';
EOF
/etc/init.d/mysql restart
```
