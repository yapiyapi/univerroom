var Pw_exist = $('#Pw_exist');
var Pw_change = $('#Pw_change');
var Pw_change_R = $('#Pw_change_R');
var change_btn = $('#change_btn');

var pwCf_m = $('.mismatch-message');
var pwCfSc_m = $('.mismatchSc-message');

var check = false;

change_btn.attr("disabled", true);

//비밀번호 입력창에 값을 입력하면, 비밀번호 값과 비밀번호 확인값이 일치하지 않으면 불일치 메시지를 표시하는 함수
Pw_change_R.keyup(function(){
    if ( isMatch(Pw_change.val(), Pw_change_R.val()) ) { //성공
        pwCfSc_m.removeClass('hide');
        pwCf_m.addClass('hide');
        check = true;
        signup_check();
    }
    else { //실패
        pwCfSc_m.addClass('hide');
        pwCf_m.removeClass('hide');
        check = false;
        signup_check();
    }
})
//비밀번호 값과 비밀번호 확인값이 일치하는지 판별하는 함수
function isMatch (password1, password2) {
    if ( password1 === password2 ) return true;
    else return false;
}
// 회원가입　유효성　검사
function signup_check(){
    if(check && Pw_exist.val() && Pw_change.val() && Pw_change_R.val()) change_btn.attr("disabled", false);
    else change_btn.attr("disabled", true);
}
// snackbar
function snackbar(){
    $( document ).ready(function() {
        var snk = $('#snackbar');
        $(snk).addClass("show");
        setTimeout(function(){ $(snk).removeClass("show");}, 3000);
    });
}
