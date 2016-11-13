<div class="form-group text-center">
    <p>
        @if(isset($archive) && $archive->cover)
            <img class="cover-img" src="{{route('image', [$archive->cover, '250'])}}" />
        @else
            <img>
        @endif
    </p>
    <a href="javascript:;" class="cover btn btn-primary btn-xl"><i class="fa fa-plus"></i><span class="file-name">点击上传封面</span></a>
    <input type="file" name="cover" style="display: none;">
</div>
<style>
    .cover-img {
        max-width: 250px;
        border: 1px solid #ccc;
        padding: 10px;
    }
</style>
<script>
    $(document).ready(function () {
        $('.cover').click(function () {
            $('input[name=cover]').click();
        })
        $('input[name=cover]').on('change', function (event) {
            var file = event.target.files[0];
            var box = $(this).parents('div.form-group');

            box.find('img').attr('src', window.URL.createObjectURL(file)).addClass('cover-img')

            box.find('.file-name').text(file.name)
        })
    })
</script>