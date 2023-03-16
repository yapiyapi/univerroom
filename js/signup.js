
var Id = $('#userId');
var Name = $('#userName');
var Email = $('#userEmail');
var Pw = $('#userPassword');
var PwCf = $('#userPasswordConfirm');
var signup_btn = $('#signup_btn');

var fail_m = $('.failure-message');
var success_m = $('.success-message');
var pwCf_m = $('.mismatch-message');
var pwCfSc_m = $('.mismatchSc-message');
var check_id = false;
var check_pw = false;

signup_btn.attr("disabled", true);

//아이디 입력창에 글자를 키보드로 입력할 때, 성공메시지와 실패메시지를 보여주는 함수
Id.keyup(function(){
    if (isMoreThan4Length(Id.val())) { //성공
        success_m.removeClass('hide');
        fail_m.addClass('hide');
        check_id = true;
        signup_check();
    }
    else { //실패
        success_m.addClass('hide');
        fail_m.removeClass('hide');
        check_id = false;
        signup_check();
    }
})

//비밀번호 입력창에 값을 입력하면, 비밀번호 값과 비밀번호 확인값이 일치하지 않으면 불일치 메시지를 표시하는 함수
PwCf.keyup(function(){
    if ( isMatch(Pw.val(), PwCf.val()) ) { //성공
        pwCfSc_m.removeClass('hide');
        pwCf_m.addClass('hide');
        check_pw = true;
        signup_check();
    }
    else { //실패
        pwCfSc_m.addClass('hide');
        pwCf_m.removeClass('hide');
        check_pw = false;
        signup_check();
    }
})

//글자수가 4개이상이면
function isMoreThan4Length(value) {
    return value.length >= 4
}

//비밀번호 값과 비밀번호 확인값이 일치하는지 판별하는 함수
function isMatch (password1, password2) {
    if ( password1 === password2 ) return true;
    else return false;
}
// 회원가입　유효성　검사
function signup_check(){
    if(check_id && check_pw && Id.val() && Name.val() && Email.val() && Pw.val() ) signup_btn.attr("disabled", false);
    else signup_btn.attr("disabled", true);
}

//snackbar
function Snackbar_error_same() {
    $( document ).ready(function() {
        var snk = $('#snackbar');
        $(snk).addClass("show");
        setTimeout(function(){ $(snk).removeClass("show");}, 3000);
    });
}