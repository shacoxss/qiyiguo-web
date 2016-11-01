@extends('pc_home.commonIn')

@section('title')
	<title>{{$archive->title}}</title>
	<meta name="Keywords" content="">
	<meta name="description" content="" />
@endsection
@section('content')
    @include('inc.archive-header', ['tags' => $archive->tags()->get()])
		<div class="am-g news-detail-content">
			<div class="am-g width ">
				<div class="am-u-sm-8 news-detail-content-left" style="width: 796px;margin-top: 10px;">
                    @include('inc.archive-content', ['archive' => $archive])
                    @include('inc.comment')
				</div>

				<div class="am-u-sm-4 news-d-right-block" style="width: 404px;">
                    @include('inc.about-author', ['user' => $archive->user,'followed' => $followed])
                    @include('inc.archive-recommend')
				</div>
			</div>
		</div>
		<!--底部-->
@endsection

@section('scripts')
    @include('inc.archive-scripts')
@endsection