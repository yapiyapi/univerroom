var cell = $('.cell');

cell.mouseover(function () {
    $(this).css("backgroundColor","rgb(244, 244, 244)");
});

cell.mouseout(function () {
    $(this).css("backgroundColor","#fff");
});

function ToPost(id){
    location.href = `../view/room_R.php?page_id=${id}`;
}

// map
var map = new kakao.maps.Map(document.getElementById('map'), { // 지도를 표시할 div
    center: new kakao.maps.LatLng(36.2683, 127.6358), // 지도의 중심좌표
    level: 12 // 지도의 확대 레벨
});

// 마커 클러스터러를 생성합니다 
var clusterer = new kakao.maps.MarkerClusterer({
    map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체 
    averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정 
    minLevel: 8, // 클러스터 할 최소 지도 레벨 
    disableClickZoom: true
});

$(document).ready(function() {
    $.get("../back/DataPos.php", function(positions) {
        var pos_arr = [];
        
        var markers = $(positions).map(function(i, position) {
            pos_arr.push({
                    content: `<div>${position.title}</div>`, 
                    latlng: new kakao.maps.LatLng(position.lat, position.lng)
                });
            var infowindow = new kakao.maps.InfoWindow({
                content: pos_arr[i].content // 인포윈도우에 표시할 내용
            });
        
            var marker = new kakao.maps.Marker({
                position: new kakao.maps.LatLng(position.lat, position.lng),
                clickable: true
            });
            kakao.maps.event.addListener(marker, 'mouseover', makeOverListener(map, marker, infowindow));
            kakao.maps.event.addListener(marker, 'mouseout', makeOutListener(infowindow));
            kakao.maps.event.addListener(marker, 'click', function(){
                ToPost(i+1);
            });
          
            var cell_num = $(`#cell_${i+1}`);

            cell_num.mouseover(function () {
                displayInfowindow(marker, pos_arr[i].content,infowindow);
            });
            cell_num.mouseout(function () {
                infowindow.close();
            });
            
            return marker;
        });
        // 클러스터러에 마커들을 추가합니다
        clusterer.addMarkers(markers);


    });
})

// 인포윈도우를 표시하는 클로저를 만드는 함수입니다 
function makeOverListener(map, marker, infowindow) {
    return function() {
        infowindow.open(map, marker);
    };
}
// 인포윈도우를 닫는 클로저를 만드는 함수입니다 
function makeOutListener(infowindow) {
    return function() {
        infowindow.close();
    };
}
function displayInfowindow(marker, content,infowindow) {
    infowindow.setContent(content);
    infowindow.open(map, marker);
}
// ----------------------------------------------------
// 클러스터 클릭 시 화면 확대
kakao.maps.event.addListener(clusterer, 'clusterclick', function(cluster) {

    // 현재 지도 레벨에서 1레벨 확대한 레벨
    var level = map.getLevel()-1;

    // 지도를 클릭된 클러스터의 마커의 위치를 기준으로 확대합니다
    map.setLevel(level, {anchor: cluster.getCenter()});
});