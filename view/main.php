<!DOCTYPE html>
<html lang="ko">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title>Univerroom</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <style>
        #WiseSaying{
            font-family: 'Noto Sans KR', sans-serif;
            margin-top: 13%;
            margin-bottom: 3%;
            width: 100%;
            font-size: 30px;
            text-align: center;
            color: gray;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <?php
    include('titleBar.php');
    ?>
</head>

<body>
    <div class="intro_bg">
        <?php titleBar(); ?>
        <!-- <form method="get" action="main.html">
            <label class="styled__InputWindow-sc-126ee4m-3 uWfbQ">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M0 0H24V24H0z"></path>
                        <g stroke="#222" stroke-width="2" transform="translate(2 2)">
                            <circle cx="8" cy="8" r="8"></circle>
                            <path stroke-linecap="round" d="M15 14L19.95 18.95"></path>
                        </g>
                    </g>
                </svg>
                <input placeholder="지역 또는 단지명을 입력하세요." value="">
            </label>
        </form> -->
        <div id="WiseSaying"></div>
    </div>
    <script>
        $.ajax({
				type:"get",
				url:"https://api.adviceslip.com/advice",				
				success:function(msg){	
                    var ws = JSON.parse(msg)['slip']['advice'];
                    console.log(ws);
					$("#WiseSaying").text(`${ws}`);
				}
			});//ajax
    </script>
</body>

</html>