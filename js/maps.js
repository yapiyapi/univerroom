var cell = $('.cell');

cell.mouseover(function () {
    $(this).css("backgroundColor","rgb(244, 244, 244)");
});

cell.mouseout(function () {
    $(this).css("backgroundColor","#fff");
});


var container = document.getElementById('map');
var options = {
    center: new kakao.maps.LatLng(35.204056, 129.119529),
    level: 8
};

var map = new kakao.maps.Map(container, options);