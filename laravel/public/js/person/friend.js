/**
 * Created by cxworks on 16-11-27.
 */
function makeSizer(size) {
    return function() {
        return size+' '+'user';
    };
};
function addNewFriend () {
    var id=$('#newFriend').val();
    $.ajax({
        type: 'POST',
        url: 'basic/add',
        data: {
            'content':id,
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'user_name':makeSizer(id)
        },
        success:function () {
            window.location.replace('/self/basic');
        }
    });
};


