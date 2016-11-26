/**
 * Created by st0001 on 2016/11/25.
 */
var editor = new wangEditor('editor');
editor.config.uploadImgUrl = '/editComment/upload';
editor.config.uploadParams = {
    '_token': $('meta[name="csrf-token"]').attr('content')
};
editor.config.uploadImgFileName = 'photo';
// editor.config.uploadHeaders = {
//     'Accept' : $('meta[name="_token"]').attr('content')
// };

editor.create();

function submitComment() {
    var html = editor.$txt.html();
    $.ajax({
        type: 'POST',
        url: 'editComment/publish',
        data: {
            'content':html,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('commentPage');
        }
    });

}
