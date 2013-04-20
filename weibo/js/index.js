var stuff = new Stuff();

$(document).ready(function() {
});

function getItems() {
    $.post('', {}, function(data) {
        data = $.parseJSON(data);
        if(data.status) {
            stuff.add(data);
        } else {
        }
    });
}

var data = [{
    img: '',
    title: '测试',
    content: '测试啊测试'
    },{
    img: '1.jpg',
    title: 'nkweibo',
    content: '好开心啊，南开要有自己的微博啦，哈哈～'
}];
stuff.add(data);
