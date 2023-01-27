<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> Inquiry </title>
    <link rel="stylesheet" type="text/css" href="../css/inquiry_list.css">

    <?php
        include("../server/db_univerroom.php");

        $sql = "SELECT * FROM `board` ORDER BY seq DESC";
        $ret = mysqli_query($mysqli , $sql);
    ?>
</head>
<body> 

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


    
    <section class="notice">
        <div class="page-title">
            <div class="container">
                <h3>게시판</h3>
            </div>
        </div>
    
        <!-- board seach area -->
        <div id="board-search">
            <div class="container">
                <div class="search-window">
                    <form action="">
                        <div class="search-wrap">
                            <label for="search" class="blind">내용 검색</label>
                            <input id="search" type="search" name="search" placeholder="검색어를 입력해주세요." value="">
                            <button type="submit" class="btn btn-dark">검색</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- board list area -->
        <div id="board-list">
            <div class="container">
                <table class="board-table">
                    <thead>
                    <tr>
                        <th scope="col" class="th-num">번호</th>
                        <th scope="col" class="th-title">제목</th>
                        <th scope="col" class="th-date">등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($ret)){
                                echo "<tr>
                                    <td>".$row['seq']."</td>
                                    <th><a href=\"inquiry_post.php?".$row['seq']."\">".$row['title']."</a></th>
                                    <td>".$row['add_date']."</td>
                                    </tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <div class="toWrite"><a href="#" onclick="location.href='inquiry.php'">글쓰기</a></div>  



</body>
</html>