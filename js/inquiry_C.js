var title = $('#title');
var contents = $('#summernote');
var writing_btn = $('#writing_btn');

var theForm = document.form;
// 회원가입　유효성　검사
function writing_check_1(){
    if(!title.val()) alert("제목이 비었습니다."); 
    else if(!contents.val()) alert("내용이 비었습니다.");
    else theForm.action = "../back/InsertInquiry.php"; 
}
function writing_check_2(){
    if(!title.val()) alert("제목이 비었습니다."); 
    else if(!contents.val()) alert("내용이 비었습니다.");
    else theForm.action = "../back/UpdInquiry.php"; 
}