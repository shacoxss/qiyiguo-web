$(function() {
    var $modal = $('#detail-modal');
    var img_box = $('#lightgallery')
    var prev = null;
    var next = null;
    var gen_img = function (img) {
        return $(
            '<a href="'+img.url+'/raw.jpeg" data-sub-html="<h3>'+img.title+'</h3><p>'+img.description+'</p>">\
                <img src="'+img.url+'/180x120.jpeg" />\
            </a>'
        );
    };

    function click_gen(id) {
        return function(e) {
            var load = layer.load(0,{shade:[0.5, '#FFF']});
            $.getJSON('/gallery/'+id, function (res) {
                img_box.html('');
                res.images.map(gen_img).forEach(function (img) {img_box.append(img)})
                lightGallery(document.getElementById('lightgallery'), {
                    thumbnail:true,
                    zIndex : 1500
                });
                $('.album-article h2').text(res.title)
                $('.album-article .v-a-content').html(res.detail.content)
                $('#author').text(res.author)
                $('#updated_at').text(res.updated_at)
                prev = res.prev;
                next = res.next;
                $modal.modal('open');
                layer.close(load);
            })
        }
    }
    function next_gallery(id) {
        if (id) {
            click_gen(id)()
        } else {
            layer.alert('没有了')
        }
    }
    $('.am-album-modal-prev').on('click', function() {next_gallery(prev)})
    $('.am-album-modal-next').on('click', function() {next_gallery(next)})
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