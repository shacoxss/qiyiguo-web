<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>上传控件 - 奇异果 qiyiguo.tv</title>

    <!-- plupload css -->
    <link type="text/css" rel="stylesheet" href="{{asset('vendor/jquery-ui-themes-1.12.1/jquery-ui.min.css')}}" media="screen" />
    <link type="text/css" rel="stylesheet" href="{{asset('pulgin/plupload-2.1.9/js/jquery.ui.plupload/css/jquery.ui.plupload.css')}}" media="screen" />
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="{{ asset('http://www.plupload.com/css/my_ie_lte7.css') }}" />
    <![endif]-->
    <!-- plupload css -->

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pulgin/plupload-2.1.9/js/jquery-ui.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('pulgin/plupload-2.1.9/js/plupload.full.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('pulgin/plupload-2.1.9/js/i18n/zh_CN.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pulgin/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.min.js') }}" charset="UTF-8"></script>
    <!-- plipload end -->

</head>

<body style="margin:0 5px;">
<div id="uploader">
    <p>您的浏览器不支持上传控件，<a href="http://browsehappy.com/" target="_blank">升级浏览器</a>以上传照片！</p>
</div>

<!-- plipload start -->
<script type="text/javascript">
    // Initialize the widget when the DOM is ready
        $("#uploader").plupload({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : "/examples/upload",

            // Maximum file size
            max_file_size : '2mb',

            chunk_size: '1mb',

            // Resize images on clientside if we can
            resize : {
                width : 200,
                height : 200,
                quality : 90,
                crop: true // crop to exact dimensions
            },

            // Specify what files to browse for
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"},
            ],

            // Rename files by clicking on their titles
            rename: true,

            // Sort files
            sortable: true,

            // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
            dragdrop: true,

            // Views to activate
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },

            // Flash settings
            flash_swf_url : '{{asset('pulgin/plupload-2.1.9/js/Moxie.swf')}}',

            // Silverlight settings
            silverlight_xap_url : '{{ asset('pulgin/plupload-2.1.9/js/Moxie.xap') }}'
        });
</script>



</body>
</html>