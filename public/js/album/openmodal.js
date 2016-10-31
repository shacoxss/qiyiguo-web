$(function() {
    function click_gen(id) {
        return function () {
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
            return $(
                '<div class="item masonry_brick">' +
                '<div class="item_t">' +
                '<div class="img">' +
                '<a><img width="205" alt="' + item.title + '" src="' + item.thumb + '" /></a>' +
                '</div>' +
                '<div class="title">' +
                '<span><a href=""></a>' + item.title + '</span>' +
                '</div>' +
                '<div class="tk-liulan">' +
                '<span class="tk-icon icon-pl"></span><span>20</span>' +
                '<span class="tk-icon icon-xh"></span><span>20</span>' +
                '</div>' +
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
    list_append(list);


    function scroll_listen() {
        if($(window).scrollTop() + $(window).height() + 100 > $(document).height()) {
            $(window).off('scroll');
            next_handle();
        }
    }

    $(window).on('scroll', scroll_listen)

    function done_handle() {
        $('#page-info').text('没有更多了');
    }

    function next_handle() {
        var $page = $('#page-info').html('<i class="am-icon-spinner am-icon-pulse"></i> 加载中...');
        var next_page = parseInt($page.data('page')) + 1;
        $page.data('page', next_page);

        $.getJSON(BASE_URL + '/' + next_page, function (list) {
            list.length ? list_append(list) : done_handle();
        })
    }
});