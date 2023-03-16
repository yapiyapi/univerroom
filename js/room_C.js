
var sub = $('#room_submit');
var imgs_wrap = $('.imgs_wrap');
var img_exist = $('#input_imgs_exist');

$(document).ready(function () {
    $("#input_imgs").on("change", handleImgsFilesSelect);
});
function handleImgsFilesSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    img_exist.empty();
    imgs_wrap.empty();
    for (let i = 0; i < files.length; i++) {
      
        if (!files[i].type.match("image.*")) {
            alert("확장자는 이미지 확장자만 가능합니다.");
            return;
        }

        if (filesArr.length > 3) alert("업로드 최대 3개까지 입니다.");
        else {
            // filelist(file)로 return
            var reader = new FileReader();
            //비동기
            reader.readAsDataURL(files[i]);
            reader.onload = function (e) {
                var img_html = "<img src=\"" + e.target.result + "\" style='margin-right: 10px;' />";
                $(".imgs_wrap").append(img_html);
            }
        }        
    };
    console.log(filesArr);
}

function fileUploadAction() {
    $("#input_imgs").trigger('click');
}

$(document).ready(function(){
    $("#room_form").submit(function(){
        var rv = true;
        // 유효성 검사
        if(!imgs_wrap[0].childElementCount) {
            alert("이미지를 추가해주세요.");
            return rv = false;
        }
        return rv;
    });
});
// 주소 찾기
function goPopup(){
	var pop = window.open("../view/jusoPopup_utf8.php","pop","width=570,height=420, scrollbars=yes, resizable=yes"); 
}

function jusoCallBack(roadFullAddr,roadAddrPart1,addrDetail,roadAddrPart2,engAddr,jibunAddr,zipNo,admCd,rnMgtSn,bdMgtSn,detBdNmList,bdNm,bdKdcd,siNm,sggNm,emdNm,liNm,rn,udrtYn,buldMnnm,buldSlno,mtYn,lnbrMnnm,lnbrSlno,emdNo){
	document.getElementById('roadAddrPart1').value = roadAddrPart1;
	document.getElementById('addrDetail').value = addrDetail;
}

// 주소　->  좌표 변환
function coordinate(loc){
    fetch(`https://dapi.kakao.com/v2/local/search/address.json?query=${loc}`, {
        method: "GET",
        headers: {
            "Authorization": "KakaoAK 6960c58161a8763a7e05d71eda200b14",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById('lat').value = data.documents[0].y;
            document.getElementById('lng').value = data.documents[0].x;
        });
}
