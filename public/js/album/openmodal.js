$(function() {
    function click_gen(id) {
        return function (event) {
            if(event.target.nodeName == 'A') return;
            layer.open({
                type: 2,
                title: false,
                area: ['1238px', '1300px'], //宽高
                closeBtn: 0,
                shadeClose: true,
                content: DETAIL_URL + '/' + id
            });
        }
    }

    function list_append(list) {
        //循环append元素
        var $list = $(list).map(function (index, item) {
            var tags = '';
            for (var i = 0; i < item.tags.length; i++) {
                tags +=
                    '<dt style="background: #'
                        + (item.tags[i].background_color ? item.tags[i].background_color : '006633')
                        + ';"><a href="'+item.tags[i].url+'">' + item.tags[i].name + '</a>' +
                    '</dt>'
            }
            return $(
                '<div class="item masonry_brick">' +
                '<div class="item_t">' +
                '<div class="img">' +
                '<a><img width="205" alt="' + item.title + '" src="' + item.cover + '/205.jpeg" /></a>' +
                '</div>' +
                '<div class="title">' +
                '<span><a href=""></a>' + item.title + '</span>' +
                '</div>' +
                '<div class="tk-liulan">' +
                '<span class="tk-icon icon-pl"></span><span>20</span>' +
                '<span class="tk-icon icon-xh"></span><span>' + item.visit_count + '</span>' +
                '</div>' +
                    '<div style="margin-top: 0;border-top: 1px solid #DDDDDD;overflow: hidden;padding-left: 0;float: left; padding-top: 10px;width: 100%;"> \
                        <dl class="tab-block-r-ul">'
                            + tags +
                        '</dl>\
                    </div>' +
                '</div>' +
                '</div>'
            ).click(click_gen(item.id))
            .get(0);
        });
        $list_box.append($list).masonry('appended', $list);
        $list.find('img').on('load', function () {
            $list_box.masonry();
            $list_box.find('.item').fadeIn()
        });
    }

    //瀑布流初始化
    var $list_box = $('.item_list').masonry({
        itemSelector: '.masonry_brick',
        columnWidth: 220,
        gutterWidth: 15
    });


    function scroll_listen() {
        if($(window).scrollTop() + $(window).height() + 100 > $(document).height()) {
            $(window).off('scroll');
            next_handle();
        }
    }


    function done_handle() {
        $('#page-info').text('没有更多了');
    }

    function next_handle() {
        var $page = $('#page-info').html('<i class="am-icon-spinner am-icon-pulse"></i> 加载中...');
        var next_page = parseInt($page.data('page')) + 1;
        $page.data('page', next_page);

        $.getJSON(BASE_URL + '?page=' + next_page, function (list) {
            list_append(list)
            if (list.length < 10) {
                done_handle();
            } else {
                $(window).on('scroll', scroll_listen)
            }
        })
    }

    next_handle()
});