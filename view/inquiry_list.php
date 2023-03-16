<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> Inquiry </title>
    <link rel="stylesheet" type="text/css" href="../css/inquiry_list.css">

    <?php
        session_start();
        include('titleBar.php');
        include("../back/db_univerroom.php");

        $sql = "SELECT * FROM `board` ORDER BY seq DESC";
        $ret = mysqli_query($mysqli , $sql);
    ?>
</head>
<body> 

    <div class="intro_bg"><?php titleBar(); ?></div>


    
    <section class="notice">
        <div class="page-title">
            <div class="container">
                <h3>게시판</h3>
            </div>
        </div>
    
        <!-- board seach area -->
        <!-- <div id="board-search">
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
        </div> -->
        
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
                            $a=mysqli_num_rows($ret);
                            while($row = mysqli_fetch_array($ret)){
                                echo "<tr>
                                    <td>".$a."</td>
                                    <th><a href=\"inquiry_R.php?page_id=".$row['seq']."\">".$row['title']."</a></th>
                                    <td>".$row['add_date']."</td>
                                    </tr>";
                                $a--;
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <?php if ($_SESSION['user_id'] != null) echo '<div class="toWrite"><a href="inquiry_C.php">글쓰기</a></div>'  ?>



</body>
</html>