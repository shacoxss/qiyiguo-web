<script>
    $(function () {
        $('.like').on('click', function () {
            var islogin = $('.news-d-about-author-r-add').data('follow');
            if(islogin==-1){
                layer.msg('请先登录！');
                return false;
            }
            var $this = $(this)
            var index = layer.load(0, {shade: false, time : 10000});
            $.getJSON('{{ route('archive.like', [$archive->id]) }}', function (response){
                $this.attr('disabled', true)
                layer.close(index)
                layer.msg(response.msg)
                if (response.code == 0) {
                    var count = parseInt($this.find('span').text())
                    $this.find('span').text(count + 1)
                }
            })
        })
    })

    //添加关注
    $(function(){

        $('.news-d-about-author-r-add').click(function(){
            var token = "{{csrf_token()}}";
            var followed_id = "{{$archive->user->id}}";
            if($(this).data('follow')==-1){
                layer.msg('请先登录！');
                return false;
            }else if($(this).data('follow')==1){
                $('.news-d-about-author-r-add').data('follow',0);
                var followed = 1;
                $.ajax({
                    url:"{{url('archive/follow')}}",
                    type:"post",
                    data:{_token:token,followed_id:followed_id,followed:followed},
                    success:function(data){
                        if(data.rs=='error'){
                            layer.msg('取消关注失败！');
                        }else{
                            var url = "{{asset('home/images/tab/add.png')}}";
                            $('.news-d-about-author-r-add').attr('style',"background:url('"+url+"')center no-repeat;background-size: 24px 24px;");
                            layer.msg('您已取消关注！');
                        }
                    }
                });
            }else{
                $('.news-d-about-author-r-add').data('follow',1);
                var followed = 0;
                $.ajax({
                    url:"{{url('archive/follow')}}",
                    type:"post",
                    data:{_token:token,followed_id:followed_id,followed:followed},
                    success:function(data){
                        if(data.rs=='error'){
                            layer.msg('关注失败！');
                        }else{
                            var url = "{{asset('home/images/tab/del.png')}}";
                            $('.news-d-about-author-r-add').attr('style',"background:url('"+url+"')center no-repeat;background-size: 24px 24px;");
                            layer.msg('感谢您的关注！');
                        }
                    }
                });
            }
        });
    });

</script>