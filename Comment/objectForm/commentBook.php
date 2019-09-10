<?php
class commentBook{

    const filePath = 'commentBook.txt';

    public function getAllCommentList(){
        return unserialize(file_get_contents(self::filePath));
    }

    public function write($commentData){
        $commentList = $this -> getAllCommentList();
        
        if(is_array($commentList)){ //判断是不是数组
            array_unshift($commentList,$commentData); //是数组 从前插入
        }else{
            $commentList = [$commentData];   //否则包装成数组
        }
        $commenfile = fopen(self::filePath,'w');    //打开一个文件，写入方式打开
        fwrite($commenfile,serialize($commentList));    //serialize() 函数用于序列化对象或数组，并返回一个字符串
        fclose($commenfile);
    }

    public function view($page = 1 , $limit = 3,$link){
        $commentList = $this -> getAllCommentList();
        if(is_array($commentList)){
            $totalcount = count($commentList);  //总条数
            $page = isset($page) ? $page : 1;   //当前显示页数
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
                echo "<a href='$link?page=$i&&limit=3'>$i</a>   ";
            }
        }else{
           echo '还没有数据哦！';
        }
        
    }
}



?>