<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/inquiry_U.css">

    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <title> 글수정 </title>
    <?php
    session_start();
    if ($_SESSION['user_id'] == null){
        echo '<script>alert("로그인 후 이용바랍니다.");location.href="../view/main.php"</script>';
    }
    include('titleBar.php');
    include("../back/db_univerroom.php");

    $referer = $_SERVER['HTTP_REFERER'];
    $page_id = explode("page_id=", $referer)[1];

    $sql = "SELECT * FROM `board` WHERE seq = $page_id";
    $ret = mysqli_query($mysqli, $sql);

    $row = mysqli_fetch_array($ret);
    ?>

</head>

<body>

        <div class="intro_bg"><?php titleBar(); ?></div>

    <div class="page-title">
        <div class="title">
            <h3>글수정</h3>
        </div>
    </div>

    <main role="main" class="container">
        <form name="form" method="POST">
            <!-- 제목 -->
            <div class="pt-1">
                <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" placeholder="제목을 입력하세요" style="border-radius:5px; width:100%; padding:5px;">
            </div>
            <!-- 내용 -->
            <div class="pt-1">
                <textarea id="summernote" name="content"><?php echo $row['content']; ?></textarea>
            </div>
            <script>
                $('#summernote').summernote({
                    placeholder: '내용을 입력해주세요',
                    tabsize: 2,
                    height: 300
                });
            </script>
            <div class="pt-1 text-right">
                <button class="btn btn btn-success" type="submit" id="writing_btn" style="width:10%; padding:5px;" onclick="writing_check_2()">수정</button>
            </div>
            <input type="hidden" name="inquiry-seq" value="<?php echo $page_id; ?>">
        </form>
    </main>
    <script src="../js/inquiry_C.js"></script>
</body>

</html>