<?php 
    $userName = $_POST['user'];
    $content = $_POST['content'];
    include 'commentBook.php';
    $commentBook = new commentBook();
    if( $userName == '' || $content == ""){
        echo "评论不能为空 <a href='index.php'>  返回</a> ";
    }else{
        $commentBook -> write(array('userName'=> $userName,'content' => $content));
        echo "评论成功 <a href='index.php'>  返回</a>";
    }

?>