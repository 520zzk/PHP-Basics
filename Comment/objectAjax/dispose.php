<?php 
    $userName = $_POST['user'];
    $content = $_POST['content'];
    include 'commentBook.php';

if( $userName == '' || $content == ""){

    echo json_encode( array('code'=>1 , 'msg'=>'评论不能为空！！'));
}else{
    $commit = array( 'userName' => $userName,'content' => $content);
     
    $commentBook = new commentBook();
    $commentBook -> write($commit);

    echo json_encode( array('code' => 0,'msg'=>'评论成功'));
}

?>