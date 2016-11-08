<div class="form-group">
    <p>
        @if(isset($archive) && $archive->cover)
            <img style="max-width:250px;" src="{{route('image', [$archive->cover, '250'])}}" />
        @else
            <img style="max-width: 250px;">
        @endif
    </p>
    <a href="javascript:;" class="cover btn btn-primary btn-xl"><i class="fa fa-plus"></i><span class="file-name">点击上传封面</span></a>
    <input type="file" name="cover" style="display: none;">
</div>
<script>
    $(document).ready(function () {
        $('.cover').click(function () {
            $('input[name=cover]').click();
        })
        $('input[name=cover]').on('change', function (event) {
            var file = event.target.files[0];
            var box = $(this).parents('div.form-group');

            box.find('img').attr('src', window.URL.createObjectURL(file))

            box.find('.file-name').text(file.name)
        })
    })
</script>