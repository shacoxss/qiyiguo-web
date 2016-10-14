@extends('member.userCommon')
@section('content')
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">标签编辑</h1>
            <p class="page-subtitle">标签的相关设置都在这里啦</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="masterTagsList.php">标签管理</a></li>
        <li class="active">标签标记</li>
    </ol>

    <!-- /.row -->
    <div class="row" id="tag-content">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规设置</a> </li>
                                <li><a href="#customSet" data-toggle="tab"> <span class="fa fa-gear icon"></span>自定义属性</a> </li>
                                <li><a href="#SEO" data-toggle="tab"> <span class="fa fa-google icon"></span>SEO设置</a> </li>
                                <li><a href="#content" data-toggle="tab"> <span class="fa fa-save icon"></span>html编辑器</a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <form action="{{route('tag.update',[$tag->name])}}" method="POST">
                                {{ csrf_field() }}
                                <div class="tab-content">
                                    <div class="tab-pane fade padding in active" id="normal">
                                        <!--Tab start-->
                                        <blockquote>
                                            <p class="text-danger strong">第一个div需添加style="padding-left:0;"样式，保证对齐</p>
                                        </blockquote>
                                        <style>
                                            p.cur {background: #eee; padding: 3px; font-style: inherit;}
                                            .col-md-12,.col-md-4,.col-md-6{padding-left: 0;}
                                        </style>
                                        <div class="col-lg-9">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4">
                                                    <label>标签名称：</label>
                                                    <input class="form-control " placeholder="标签名称：" name="name" v-model="name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>URL自定义</label>
                                                    <input class="form-control " placeholder="URL自定义" name="url" v-model="url">
                                                    <p class="cur">默认全拼或英文，指定需检测是否重复</p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>自定义模版文件</label>
                                                    <input class="form-control " placeholder="自定义模版文件" name="template" v-model="template">
                                                    <p class="cur">未指定用默认模版</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4" id="background_color">
                                                    <label class="col-md-12">
                                                        背景色
                                                        <i class="btn btn-xss" :style="{background:'#'+background_color}" style=" width:31px; height:27px;"></i>
                                                    </label>
                                                    <input type="hidden" name="background_color" v-model="background_color">
                                                    <ul class="navbar-top-links navbar-right color-select">
                                                        <li class="dropdown color-dropdown" style="width:100%;">
                                                            <a class="dropdown-toggle userdd" data-toggle="dropdown" href="javascript:void(0)">
                                                                <i class="caret"></i>
                                                                点击选择标签的颜色
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-color" @click='c_background_color'>
                                                                <li><a href="#" data-value="45171D" style="background:#45171D;"></a></li>
                                                                <li><a href="#" data-value="E84A5F" style="background:#E84A5F;"></a></li>
                                                                <li><a href="#" data-value="FF847C" style="background:#FF847C;"></a></li>
                                                                <li><a href="#" data-value="FECEA8" style="background:#FECEA8;"></a></li>
                                                                <li><a href="#" data-value="C190F0" style="background:#C190F0;"></a></li>

                                                                <li><a href="#" data-value="9876DE" style="background:#9876DE;"></a></li>
                                                                <li><a href="#" data-value="FDFE9A" style="background:#FDFE9A;"></a></li>
                                                                <li><a href="#" data-value="9ADEB9" style="background:#9ADEB9;"></a></li>
                                                                <li><a href="#" data-value="00AD7C" style="background:#00AD7C;"></a></li>
                                                                <li><a href="#" data-value="52D681" style="background:#52D681;"></a></li>

                                                                <li><a href="#" data-value="B5FF7D" style="background:#B5FF7D;"></a></li>
                                                                <li><a href="#" data-value="95EFCE" style="background:#95EFCE;"></a></li>
                                                                <li><a href="#" data-value="2EA1D9" style="background:#2EA1D9;"></a></li>
                                                                <li><a href="#" data-value="395EA6" style="background:#395EA6;"></a></li>
                                                                <li><a href="#" data-value="3E467F" style="background:#3E467F;"></a></li>

                                                                <li><a href="#" data-value="2E94B9" style="background:#2E94B9;"></a></li>
                                                                <li><a href="#" data-value="F0B775" style="background:#F0B775;"></a></li>
                                                                <li><a href="#" data-value="D25565" style="background:#D25565;"></a></li>
                                                                <li><a href="#" data-value="3C9099" style="background:#3C9099;"></a></li>
                                                                <li><a href="#" data-value="5FBDB0" style="background:#5FBDB0;"></a></li>

                                                                <li><a href="#" data-value="C4317B" style="background:#C4317B;"></a></li>
                                                                <li><a href="#" data-value="AC7C7C" style="background:#AC7C7C;"></a></li>
                                                                <li><a href="#" data-value="D0BAA8" style="background:#D0BAA8;"></a></li>
                                                                <li><a href="#" data-value="51C4E9" style="background:#51C4E9;"></a></li>
                                                                <li><a href="#" data-value="6150C1" style="background:#6150C1;"></a></li>

                                                                <li><a href="#" data-value="7A4579" style="background:#7A4579;"></a></li>
                                                                <li><a href="#" data-value="FC5185" style="background:#FC5185;"></a></li>
                                                                <li><a href="#" data-value="EC9E69" style="background:#EC9E69;"></a></li>
                                                                <li><a href="#" data-value="347A2A" style="background:#347A2A;"></a></li>
                                                                <li><a href="#" data-value="61305D" style="background:#61305D;"></a></li>
                                                            </ul>
                                                            <!-- /.dropdown-user -->
                                                        </li>
                                                        <!-- /.dropdown -->
                                                    </ul>
                                                </div>
                                                <div class="form-group col-md-4 tag-list" id="alias">
                                                    <label class="col-md-12">
                                                        同义标签
                                                        <a href="#" >
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </label>
                                                    <input class="form-control " placeholder="同义标签" v-on:keydown.enter.prevent="add_alias">
                                                    <p class="cur">交叉以后以ID最小的配置为准</p>
                                                    <span v-for="(alias,i) in aliases">
                                                        <a href="#" class="btn btn-primary btn-xss">@{{alias.name}} <i @click="aliases.splice(i, 1)" class="fa fa-times"></i></a>
                                                        <input type="hidden" name="aliases[]" :value="alias.id">
                                                    </span>
                                                </div>
                                                <div class="form-group col-md-4 tag-list" id="similar">
                                                    <label class="col-md-12">
                                                        相关标签
                                                        <a href="#" >
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </label>
                                                    <input class="form-control " placeholder="相关标签">
                                                    <p class="cur">相关内容关联</p>
                                                    <span v-for="similar,i in similars">
                                                        <a href="#" class="btn btn-primary btn-xss">@{{similar.name}} <i @click="similars.splice(i, 1)" class="fa fa-times"></i></a>
                                                        <input type="hidden" name="similars[]" :value="similar.id">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4">
                                                    <div class="list-group-item withswitch">
                                                        <h5 class="list-group-item-heading">开启平台模版</h5>
                                                        <p class="list-group-item-text">可设置平台相关功能</p>
                                                        <div class="switch">
                                                            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox" name="platform" v-model="platform">
                                                            <label for="cmn-toggle-1" style="border:none;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--<div class="form-group col-md-4">--}}
                                                    {{--<label class="col-md-12">--}}
                                                        {{--管理员--}}
                                                        {{--<a href="#" >--}}
                                                            {{--<i class="fa fa-search"></i>--}}
                                                        {{--</a>--}}
                                                    {{--</label>--}}
                                                    {{--<input class="form-control " placeholder="管理员"><br>--}}
                                                    {{--<a href="#" class="btn btn-primary btn-xss">ID:286 | wongvio  <i class="fa fa-times"></i></a>--}}
                                                    {{--<a href="#" class="btn btn-primary btn-xss">ID:2826 | 蛋切刀  <i class="fa fa-times"></i></a>--}}
                                                {{--</div>--}}
                                                <div class="form-group col-md-4" v-if="platform">
                                                    <label class="col-md-12">
                                                        平台地址
                                                    </label>
                                                    <input class="form-control " placeholder="URL" name="platform_link" v-bind:value="link">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4">
                                                    <div class="list-group-item withswitch">
                                                        <h5 class="list-group-item-heading">开启主播模式</h5>
                                                        <p class="list-group-item-text">可设置主播相关功能</p>
                                                        <div class="switch">
                                                            <input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-round" type="checkbox" name="anchor" v-model="anchor">
                                                            <label for="cmn-toggle-2" style="border:none;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4" v-if="anchor">
                                                    <label class="col-md-12">
                                                        主播
                                                        <a href="#" >
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </label>
                                                    <input class="form-control " placeholder="主播" name="anchor" v-bind:value="anchor_name"><br>
                                                    {{--<a href="#" class="btn btn-primary btn-xss">ID:210 | luka  <i class="fa fa-times"></i></a>--}}
                                                </div>
                                                <div class="form-group col-md-4" v-if="anchor">
                                                    <label class="col-md-12">
                                                        主播直播间地址
                                                    </label>
                                                    <input class="form-control " placeholder="主播" name="anchor_link" v-bind:value="link">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-6 cmn-toggle-1" v-if="platform">
                                                    <label class="col-md-12">
                                                        平台公告
                                                    </label>
                                                    <textarea class="form-control" placeholder="平台公告" name="platform_notice">{{$tag->notice}}</textarea>
                                                </div>
                                                <div class="form-group col-md-6 cmn-toggle-2" v-if="anchor">
                                                    <label class="col-md-12">
                                                        主播公告
                                                    </label>
                                                    <textarea class="form-control" placeholder="主播公告" name="anchor_notice">{{$tag->notice}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-3">
                                            <a href="#" class="btn btn-primary btn-xss input-file-a-style">
                                                <i class="fa fa-plus"></i> 点击上传LOGO
                                                <input type="file" class="input-file-style">
                                            </a>
                                            <a href="#" class="btn btn-primary btn-xss input-file-a-style">
                                                <i class="fa fa-plus"></i> 点击上传背景
                                                <input type="file" class="input-file-style">
                                            </a>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <!--Tab End-->
                                    </div>
                                    <div class="tab-pane fade padding" id="customSet">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> 增加一个属性</button>
                                        <br><br>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>排序 </th>
                                                <th>图标 </th>
                                                <th>名称</th>
                                                <th>跳转地址</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                <th>23 </th>
                                                <th>1 </th>
                                                <td><img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301I13RY1.jpg" alt="" class="gridpic"></td>
                                                <td>新浪微博</td>
                                                <td>http://weibo.com</td>
                                                <td class="center">
                                                    <a href="#" class="btn btn-circle btn-primary ">编辑</a>
                                                    <a href="" class="btn btn-circle btn-danger ">删除</a>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <th>11 </th>
                                                <th>2 </th>
                                                <td><img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301612153202.jpg" alt="" class="gridpic"></td>
                                                <td>微信帐号</td>
                                                <td>caomengli</td>
                                                <td class="center">
                                                    <a href="#" class="btn btn-circle btn-primary ">编辑</a>
                                                    <a href="" class="btn btn-circle btn-danger ">删除</a>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td style="padding-top:15px">null</td>
                                                <td><input class="form-control " placeholder="排序" ></td>
                                                <td><input type="file" style="margin-top:10px"></td>
                                                <td><input class="form-control " placeholder="名称" ></td>
                                                <td><input class="form-control " placeholder="跳转地址" ></td>
                                                <td class="center">
                                                    <a href="#" class="btn btn-circle btn-primary" style="margin-top:10px">保存</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade padding" id="SEO">
                                        <div class="form-group">
                                            <label>标签指数：</label>
                                            <input class="form-control " placeholder="1204" disabled="" value="{{$tag->baidu_index}}">
                                        </div>
                                        <div class="form-group">
                                            <label>标签关键词：</label>
                                            <input class="form-control " placeholder="标签关键词：" name="keywords" value="{{$tag->keywords}}">
                                        </div>
                                        <div class="form-group">
                                            <label>标签描述：</label>
                                            <textarea class="form-control" rows="3" name="description">{{$tag->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade padding" id="content">
                                        <!--编辑器开始-->
                                        <div class="form-group">
                                            <label style="padding:15px 0;">调用标签 [Tag.html]</label>
                                            <link rel="stylesheet" type="text/css" href="{{asset('pulgin/wangEditor/dist/css/wangEditor.min.css')}}">
                                            <style type="text/css">
                                                #editor-trigger {
                                                    height: 600px;
                                                    /*max-height: 600px;*/
                                                }
                                                .container {
                                                    width: 100%;
                                                    margin: 0 auto;
                                                    position: relative;
                                                    padding: 0;
                                                }
                                            </style>
                                            <div id="editor-container" class="container">
                                                <div id="editor-trigger"><p>请输入内容</p><p>&lt;script&gt;&lt;/script&gt;</p></div>
                                                <!-- <textarea id="editor-trigger" style="display:none;">
                                                    <p>请输入内容...</p>
                                                </textarea> -->
                                            </div>
                                        </div>
                                        <!--编辑器结束-->
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">提 交</button>
                                    <button type="reset" class="btn btn-default">重 置</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    <script>
        var tag = new Vue({
            el : '#tag-content',
            data : {!! $data !!},
            methods : {
                c_background_color: function (event) {
                    this.background_color = event.target.dataset.value;
                },
                add_alias: function (event) {
                    if(event.target.value) {
                        this.aliases.push({
                            name : event.target.value,
                            id : event.target.value
                        })
                        event.target.value = '';
                    }
                }
            }
        });
    </script>
    <!-- DataTables JavaScript -->
    <script src={{asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("vendor/datatables-plugins/dataTables.bootstrap.min.js")}}></script>
    <script src={{asset("vendor/datatables-responsive/dataTables.responsive.js")}}></script>

    <!-- Custom Theme JavaScript -->
    <script src={{asset("js/adminnine.js")}}></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-userlist').DataTable({
                responsive: true,
                pageLength:10,
                sPaginationType: "full_numbers",
                oLanguage: {
                    oPaginate: {
                        sFirst: "<<",
                        sPrevious: "<",
                        sNext: ">",
                        sLast: ">>"
                    }
                }
            });
        });
    </script>

    <!--wangEditor js-->
    <script type="text/javascript" src={{asset("pulgin/wangEditor/dist/js/wangEditor.js")}}></script>
    <!--<script type="text/javascript" src="pulgin/wangEditor/dist/js/wangEditor.min.js"></script>-->
    <script type="text/javascript" src={{asset("js/wangEditor_emoji.js")}}></script>
    <script>
        function add_tag(tag, target) {
            var $tag = $(
                    '<span>'
                    +'<a href="#" class="btn btn-primary btn-xss">'+tag.name+'<i class="fa fa-times"></i></a>'
                    +'<input type="hidden" name="aliases[]" value="'+tag.id+'">'
                    +'</span>'
            )

            $(target).append($tag);
        }
        $(document).ready(function() {
            //选择背景色
//            var $back = $('#background_color');
//            $back.find('.dropdown-color').on('click', function(event) {
//                if(event.target.nodeName !== 'A') return false;
//                $back.find('input[name=background_color]').val($(event.target).data('value'))
//                $back.find('i.btn').css('background', '#'+$(event.target).data('value'))
//            })

//            $('.withswitch label').on('click', function () {
//                var iam = $(this).attr('for');
//                var close = iam == 'cmn-toggle-1' ? 'cmn-toggle-2' : 'cmn-toggle-1';
//                var $close = $('#'+close)
//                var $iam = $('#'+iam)
//                $close.attr('checked', false)
//                $close.parents('.col-md-4').nextAll().fadeOut()
//                $('.'+close).fadeOut()
//                $iam.parents('.col-md-4').nextAll().fadeOut()
//                $('.'+iam).fadeOut()
//                if(!$iam.prop('checked')) {
//                    $iam.parents('.col-md-4').nextAll().fadeIn()
//                    $('.'+iam).fadeIn()
//                }
//            })

//            $('.tag-list a.btn').on('click', function (event) {
//                if(event.target.nodeName !== 'I') return false;
//                $(this).parent().remove()
//            })
        });
    </script>
@endsection