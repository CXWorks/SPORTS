/**
 * Created by cxworks on 16-11-28.
 */

function finsihContest(id) {
    $.ajax({
        type: 'POST',
        url: '/contest/finish',
        data: {
            'id':id,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('showContest');
        }
    });
}
function deleteContest(id) {
  var res=confirm("确定删除？？");
  if(res==true){
    $.ajax({
        type: 'POST',
        url: '/contest/delete',
        data: {
            'id':id,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('showContest');
        }
    });
  }

}
function joinContest(id) {
    $.ajax({
        type: 'POST',
        url: '/contest/join',
        data: {
            'id':id,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('showContest');
        }
    });
}
