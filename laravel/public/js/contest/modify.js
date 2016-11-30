/**
 * Created by st0001 on 2016/11/30.
 */
/**
 * Created by cxworks on 16-11-28.
 */
wangEditor.config.mapAk = 'EQRCjCyVfZ2rzY9CeM8GqVZe1cR1c2bv';
var editor = new wangEditor('editor');
editor.config.uploadImgUrl = '/editComment/upload';
editor.config.uploadParams = {
    '_token': $('meta[name="csrf-token"]').attr('content')
};
editor.config.uploadImgFileName = 'photo';
editor.config.menuFixed = false;
editor.create();
locationX=0;
locationY=0;

function submitContest() {
    var html = editor.$txt.html();
    $.ajax({
        type: 'post',
        url: '/contest/modify',
        data: {
            'id':id,
            'date':$("#datetimepicker12").data("datetimepicker").getDate(),
            'content':html,
            'locationX':locationX,
            'locationY':locationY,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('showContest');
        }
    });

}