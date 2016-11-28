/**
 * Created by cxworks on 16-11-28.
 */
var editor = new wangEditor('editor');
editor.config.uploadImgUrl = '/editComment/upload';
editor.config.uploadParams = {
    '_token': $('meta[name="csrf-token"]').attr('content')
};
editor.config.uploadImgFileName = 'photo';
editor.config.menuFixed = false;
editor.create();

function submitContest() {
    var html = editor.$txt.html();
    $.ajax({
        type: 'POST',
        url: '/contest/create',
        data: {
            'date':$("#datetimepicker12").data("datetimepicker").getDate(),
            'content':html,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('showContest');
        }
    });

}