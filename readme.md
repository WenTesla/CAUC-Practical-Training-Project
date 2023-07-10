# CAUC 暑假实训项目

## 综合项目简介

北京XX科技股份有限公司是一家技术型初创公司，为了方便公司内部交流，公司计划搭建一个内部交流论坛，由于预算有限，再加上项目模块简单，公司决定将此项目交由安全部门开发完成。  
一、论坛功能  
1、 论坛要有完整的注册、登录模块。   ✔️  
2、 在用户登录后，每个页面头部要能显示用户的身份信息，包括用户名、用户头像，以及用户角色。  ✔️  
3、 用户登录后，可自由发帖，发帖后，确保所有的帖子列表，所有人可见。  ✔️    
4、 对帖子的管理包括可以增加、查看详情、删除帖子，但要求只有管理员才能删除帖子，普通用户仅可以增加和查看详情，不能删除帖子。✔   ️  
5、 所有关于帖子的操作都必须是用户登录以后才能操作，如果未登录则不能操作。  ✔️  

二、安全测试  
在实现上述功能后，为了确保web程序的安全，还需要安全部门对此程序进行安全测试，测试范围包含论坛所有模块，要求充分对其进行测试，发现所有可能漏洞（至少3种）。  
三、安全加固    
在安全测试完成后，需要对所有已发现漏洞进行安全加固，并且在安全加固完成后，进行测试验证，确保已经完整地修复了相应的安全漏洞
  
## 项目结构
```
├─bootstrap-3.4.1-dist
│  ├─css
│  ├─fonts
│  ├─js
│  └─picture
└─project
    ├─backend
    │  └─uploads
    │      └─2023
    │          └─07
    │              ├─05
    │              └─06
    ├─common
    └─front

```
## 依赖
* apache ?  
* php 7.x  
* mysql 5.x  

不保证其他版本兼容

## 启动
mysql 表在project下，直接导入即可    
其中配置文件在common上的config上，修改即可  
**由于使用phpstudy_pro   
故笔者不知道如何使用命令行运行**
也懒得学习了php的启动了，
> 最好的语言(doge)

## 功能测试

### 注册

![image-20230705091937765](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705091937765.png)

![image-20230705092012413](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705092012413.png)

### 登录

![image-20230705172957038](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705172957038.png)

成功，可以看到头像也显示正常

### 查看帖子

![image-20230705173019602](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705173019602.png)

### 添加帖子

![image-20230705105054844](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705105054844.png)

### 删除帖子

点击删除按钮

![image-20230705105132302](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705105132302.png)

删除成功

![image-20230705105146059](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705105146059.png)

**如果使用非管理员登录并添加留言**

**没有删除按钮，后端也做了简单的校验**

![image-20230705105304441](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705105304441.png)



## 漏洞测试

### sql漏洞

```
admin ' or 1=1 -- aaa
```

![image-20230705194043861](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705194043861.png)



![image-20230705194103251](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705194103251.png)

成功登录

### cookie漏洞

修改cookie为管理员的uid-16

![image-20230705104310177](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705104310177.png)

修改cookie为管理员的名称-admin

![image-20230705104442131](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705104442131.png)

可以看到用户名称已经改变

按钮已经显示

![image-20230705104534197](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705104534197.png)

点击删除

![image-20230705104552527](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705104552527.png)

![image-20230705104601106](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705104601106.png)

![image-20230705104607004](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705104607004.png)

删除成功

**垂直越权**



### 文件上传

选中php上传

![image-20230705220843748](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705220843748.png)

![image-20230705221127800](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705221127800.png)



```
http://localhost:63342/php_project/project/backend/uploads/2023/07/05/168856606278084.php/?cmd=phpinfo();
```

注入

![image-20230705221154628](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705221154628.png)

有回显，说明有文件上传漏洞

## 防范

### SQL

首先考虑sql预编译语句，但是通过上网查询得知，php使用预编译语句非常麻烦，需要开启拓展。

然后想到了过滤非法语句，能一定程度下防范注入

```php
function filterSql(...$paras)
{
    foreach ($paras as $para) {
        if (preg_match('/union|and|or|order|select|delete|update/i', $para)) {
            die('参数异常，请重新输入');
        }
    }
}
```

测试

![image-20230705215656914](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705215656914.png)

![image-20230705215706780](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705215706780.png)

暂且防住

![image-20230705163400454](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705163400454.png)

### 文件上传

```php
// 检查用户上传的漏洞
    $allow_type = array('image/jpeg','image/png','image/gif');
//    var_dump($img['type']);
//    die();
    if(!in_array($img['type'],$allow_type)){
        alertMsg('禁止上传该文件类型','../front/register.php');
        return;
    }
    $file = $img['name'];
    if (!is_array($file)) {
        $file = explode('.', strtolower($file));
    }
    $ext = end($file);
    $allow_suffix = array('jpg', 'png', 'gif');
    if (!in_array($ext, $allow_suffix)) {
        alertMsg('禁止上传该文件类型', '../front/register.php');
        return;
    }
```

![image-20230705222443272](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705222443272.png)

![image-20230705222600822](https://image-bed-1313520634.cos.ap-beijing.myqcloud.com/image-20230705222600822.png)


时间：2023/7/10  
作者：Bowen  
