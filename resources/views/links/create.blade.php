@extends('member.masterCommon')
@section('content')

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
        .input-file {
            margin-top: 12px;
            text-align: center;
        }
        .input-file input {
            position: relative;
        }
        .btn-xss {
            margin-bottom: 6px;
        }
    </style>
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">新增链接</h1>
            <p class="page-subtitle">手动新增一个链接</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="{{url('member/links')}}">链接管理</a></li>
        <li class="active">新增链接</li>
    </ol>

    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规设置</a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <form action="{{url('member/links')}}" method="POST" id="create-tag">
                                @if(count('errors')>0)
                                    @if(is_string($errors))
                                        <div class="alert alert-danger">{{$errors}}</div>
                                    @else
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                @endif
                                @if(session('msg'))
                                    <div class="alert alert-success">{{session('msg')}}</div>
                                @endif
                                {{ csrf_field() }}
                                <div class="tab-content">
                                    <div class="tab-pane fade padding in active" id="normal">
                                        <!--Tab start-->
                                        <style>
                                            p.cur {background: #eee; padding: 3px; font-style: inherit;}
                                            .col-md-12,.col-md-4{padding-left: 0;}
                                        </style>
                                        <div class="col-lg-9">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4">
                                                    <label>链接名称：</label>
                                                    <input class="form-control " placeholder="链接名称" name="name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>链接URL：</label>
                                                    <input class="form-control " placeholder="链接URL" name="link_url">
                                                </div>
                                            </div>
                                        </div>
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
