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

    <form class="" method="POST" action="disposeFrom.php" report-submit="false" bindsubmit="" bindreset="">
          用户名：<input type="text" name="user"><br>
         <textarea name="content" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="提交">
    </form>
    <br>
    <?php
    include 'commentBook.php';
    $commentBook = new commentBook();
    $page = isset($_GET['page']) ? $_GET['page']:1;
    $limit = isset($_GET['limit']) ? $_GET['limit']:3;
    $commentBook -> view($page,$limit,'index.php');
    ?>

      
</body>
</html>