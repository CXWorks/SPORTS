/**
 * Created by cxworks on 16-11-26.
 */
var editor = new wangEditor('editor');
editor.config.uploadImgUrl = '/editComment/upload';
editor.config.uploadParams = {
    '_token': $('meta[name="csrf-token"]').attr('content')
};
editor.config.uploadImgFileName = 'photo';

editor.create();

function submitinfo() {
    var html = editor.$txt.html();
    $.ajax({
        type: 'POST',
        url: '',
        data: {
            'type':'info',
            'content':html,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('/self/basic');
        }
    });

}
function submitbody() {
    var html = editor.$txt.html();
    $.ajax({
        type: 'POST',
        url: '',
        data: {
            'type':'body',
            'content':html,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('/self/basic');
        }
    });

}

