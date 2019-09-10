<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./js/jquery-3.3.1.js"></script>
    <title>Document</title>
</head>
<body>
          用户名：<input type="text" id='user'><br>
         <textarea  cols="30" rows="10" id="centent"></textarea>
         <input type="submit" value="提交" id="subBtn">
         <br>
      <?php 
      include 'commentBook.php';

      $page = isset($_GET['page']) ? intval($_GET['page']) : 1;   //当前显示页数
      $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 3;    //显示个数

        $commentBook = new commentBook();
        $commentBook -> view($page , $limit ,'index.php');
      ?>

      <script src="./js/jquery-3.3.1.js"></script>
      <script>
      $("#subBtn").on('click',function(){
          console.log('xxx')
          $.ajax({
              type:'POST',
              url:"dispose.php",
              dataType:'json',
              data:{ 'user':$('#user').val() , 'content': $('#centent').val()},
              success:function(data){
                console.log(data)
                alert(data.msg);
                if(!data.code){
                    window.location.reload();
                }
              }
          })
      })
      </script>
</body>
</html>