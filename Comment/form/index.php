<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="" method="POST" action="./book.php" report-submit="false" bindsubmit="" bindreset="">
          用户名：<input type="text" name="user"><br>
         <textarea name="content" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="提交">
    </form>
      <?php 
        $commentList = unserialize(file_get_contents("a.txt"));
        $totalcount = count($commentList);  //总条数
        echo '总条数:'.$totalcount.'<br>';
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;   //当前显示页数
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 3;    //显示个数
        $totalpage = ceil($totalcount / $limit);        //总页数

        if( $page < 1){     // 未到范围时
            $page = 1;
        }
        if($page > $totalpage){ //超出页数范围，时
            $page = $totalpage;
        }
        $form = ($page-1)*$limit; //从那个开始显示
        for($i=$form;$i<$form + $limit ; $i++){
            if( isset($commentList[$i])){
                echo '用户名：'.$commentList[$i]["userName"] .'</br>评论内容 : <span>'. $commentList[$i]["content"] .' </span><hr>';
            }else{
                break;
            }
        }
        for($i=1; $i<= $totalpage ;$i++ ){
            echo "<a href='index.php?page=$i&&limit=3'>$i</a>   ";
        }
      ?>
</body>
</html>