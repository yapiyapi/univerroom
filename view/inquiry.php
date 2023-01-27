<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/inquiry.css">
        
        <!-- include libraries(jQuery, bootstrap) -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>                     
 

        <title> 글쓰기 </title>

    </head>
    <body>

        <div class="wrap">
            <div class="intro_bg">
                <div class="header">
                    <div class="logo">
                        <a href="#" onclick="location.href='main.php'"><img src="../image/Univerroom.png" width="200" height="70" ></a>
                    </div>
                    <ul class="nav">
                        <li><a href="#" onclick="location.href='maps.php'">지도</a></li>
                        <li><a href="#" onclick="location.href='room_list.php'">매물</a></li>
                        <li><a href="#" onclick="location.href='chat_list.php'">채팅목록</a></li>
                        <li><a href="#" onclick="location.href='inquiry_list.php'">게시판</a></li>
                        <li><a href="#" onclick="location.href='login.php'">login</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-title">
           <div class="title">
              <h3>글쓰기</h3>
           </div>
        </div>

        <main role="main" class="container">
            <form name="form" method="POST">
                <div class="pt-1">
                    <input type="text" name="title" id="title" placeholder="제목을 입력하세요" style="border-radius:5px; width:100%; padding:5px;">
                </div>
                <div class="pt-1">
                    <textarea id="summernote" name="contents"></textarea>
                </div>    
                <script>
                    $('#summernote').summernote({
                      placeholder: '내용을 입력해주세요',
                      tabsize: 2,
                      height: 300
                    });
                  </script>                     
                <div class="pt-1 text-right">
                    <button class="btn btn btn-success" type="submit" id="writing_btn" style="width:10%; padding:5px;" onclick="writing_check()">완료</button>
                </div>    
            </form>
        </main> 
        <script src="../js/inquiry.js"></script>       
    </body>
</html>