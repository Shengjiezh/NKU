function Stuff() {
    this.items = [{height: 0, data: []}, {height: 0, data: []}, {height: 0, data: []}, {height: 0, data: []}];
}

Stuff.prototype = {
    constructor: Stuff,
    add: function(data) {
        var i = 0;
        for(;i<data.length;i++) {
            var x = this.getItem();
            var obj = '<li class="span3">' +
                        '<div class="thumbnail">' +
                            
                            '<img src="" alt="" />' +
                            '<div class="caption">' +
                                '<h4>' + data[i].title + '</h4>' +
                                    '<p>' + data[i].content + '</p>' +
                                    '<p class="text-right">' +
                                        '<a href="javascript:;" class="btn btn-mini item-btn">喜欢</a>' +
                                        '<a href="javascript:;" class="btn btn-mini item-btn">分享</a>' +
                                        '<a href="javascript:;" class="btn btn-mini btn-primary item-btn">回复</a>' +
                                    '</p>' +
                                '</div>' +
                            '</div>' +
                        '</li>';
            obj = $(obj);
            obj.hide().appendTo($("#water-fall")).fadeIn();
            this.items[x].data.push(obj);
            this.items[x].height += obj.height();
        }
    },
    remove: function() {
    },
    getItem: function() {
        var i = 0, j = 1;
        for(;j<this.items.length;j++) {
            if(this.items[j].height < this.items[i].height) {
                i = j;
            }
        }
        return i;
    }
}
