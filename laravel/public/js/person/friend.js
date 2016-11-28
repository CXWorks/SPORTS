/**
 * Created by cxworks on 16-11-27.
 */
function addNewFriend () {
    var id=$('#newFriend').val();
    $.ajax({
        type: 'POST',
        url: 'basic/add',
        data: {
            'content':id,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            window.location.replace('/self/basic');
        }
    });
}


