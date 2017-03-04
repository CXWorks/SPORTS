/**
 * Created by cxworks on 16-11-30.
 */
// 百度地图API功能
var map = new BMap.Map("allmap");
var point = new BMap.Point(118.853552,32.088996);
map.centerAndZoom(point,12);

var geolocation = new BMap.Geolocation();
geolocation.getCurrentPosition(function(r){
    if(this.getStatus() == BMAP_STATUS_SUCCESS){

        map.panTo(r.point);

    }
    else {
        alert('failed'+this.getStatus());
    }
},{enableHighAccuracy: true});
var mkrTool = new BMapLib.MarkerTool(map, {followText: "添加一个起点"});

mkrTool.open();

mkrTool.addEventListener("markend", function(e) {
    temp_p=e.marker.point;
    // lng->x
    // lat->y
    locationX=temp_p.lng;
    locationY=temp_p.lat;
});