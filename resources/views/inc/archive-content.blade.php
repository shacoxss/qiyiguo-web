<div class="news-detail-content-left-p">
    @if(isset($review) && (!$review))
    <h2 style="color:red;">该篇内容尚未通过审核，现属于预览状态！</h2>
    @endif
    {!! $content !!}
    {!! $content->links() !!}
    <p style="text-align: center;">
        @include('inc.lake-button', ['archive' => $archive])
    </p>
</div>