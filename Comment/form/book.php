<?php 

$userName = $_POST['user'];
$content = $_POST['content'];

// var_dump($userName,$content);
if( $userName == '' || $content == ""){
    echo "评论不能为空 <a href='index.html'>  返回</a> ";
}else{
    $commit = array( 'userName' => $userName,'content' => $content);
     $a = 'a.txt';
     $commentList = unserialize(file_get_contents($a)); //获取一个文件内容并转成数组形式
    if(is_array($commentList)){ //判断是不是数组
        array_unshift($commentList,$commit); //是数组 从前插入
    }else{
        $commentList = [$commit];   //否则包装成数组
    }
    $commenfile = fopen($a,'w');    //打开一个文件，写入方式打开
    fwrite($commenfile,serialize($commentList));    //serialize() 函数用于序列化对象或数组，并返回一个字符串
    /**定义和用法
fwrite() 函数将内容写入一个打开的文件中。
函数会在到达指定长度或读到文件末尾（EOF）时（以先到者为准），停止运行。
如果函数成功执行，则返回写入的字节数。如果失败，则返回 FALSE。
语法
fwrite(file,string,length)
参数	描述
file	必需。规定要写入的打开文件。
string	必需。规定要写入打开文件的字符串。
length	可选。规定要写入的最大字节数。 */
    fclose($commenfile);    //关闭打开的文件
    echo "评论成功 <a href='index.php'>  返回</a>";
}

?>