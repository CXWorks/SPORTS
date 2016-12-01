/**
 * Created by cxworks on 16-11-26.
 */
wangEditor.config.mapAk = 'EQRCjCyVfZ2rzY9CeM8GqVZe1cR1c2bv';
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
function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


