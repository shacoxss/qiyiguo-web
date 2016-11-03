// 阻止输出log
                                        // wangEditor.config.printLog = false;

                                        var editor = new wangEditor('editor-trigger');

                                        // 上传图片
                                        editor.config.uploadImgUrl = $uploadImgUrl;
                                        editor.config.uploadParams = {
                                            _token: $_token,
                                            // token2: '12345'
                                        };
                                        editor.config.uploadHeaders = {
                                            // 'Accept' : 'text/x-json'
                                        }
                                        editor.config.uploadImgFileName = 'files';

                                        // 隐藏网络图片
                                        // editor.config.hideLinkImg = true;

                                        // 表情显示项
                                        editor.config.emotionsShow = 'icon';
                                        editor.config.emotions = {
                                            'default': {
                                                title: '默认',
                                                data: '/pulgin/wangEditor/dist/emotions.data'
                                            },
                                            'weibo': {
                                                title: '什么值得买',
                                                data: [
                                                    
                                                            {
                                                                icon: '/img/emoji/22.gif',
                                                                value: '[黑白小人22]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/23.gif',
                                                                value: '[黑白小人23]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/24.gif',
                                                                value: '[黑白小人24]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/25.gif',
                                                                value: '[黑白小人25]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/26.gif',
                                                                value: '[黑白小人26]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/27.gif',
                                                                value: '[黑白小人27]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/28.gif',
                                                                value: '[黑白小人28]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/29.gif',
                                                                value: '[黑白小人29]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/30.gif',
                                                                value: '[黑白小人30]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/31.gif',
                                                                value: '[黑白小人31]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/32.gif',
                                                                value: '[黑白小人32]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/33.gif',
                                                                value: '[黑白小人33]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/34.gif',
                                                                value: '[黑白小人34]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/35.gif',
                                                                value: '[黑白小人35]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/36.gif',
                                                                value: '[黑白小人36]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/37.gif',
                                                                value: '[黑白小人37]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/38.gif',
                                                                value: '[黑白小人38]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/39.gif',
                                                                value: '[黑白小人39]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/40.gif',
                                                                value: '[黑白小人40]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/41.gif',
                                                                value: '[黑白小人41]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/42.gif',
                                                                value: '[黑白小人42]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/43.gif',
                                                                value: '[黑白小人43]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/44.gif',
                                                                value: '[黑白小人44]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/45.gif',
                                                                value: '[黑白小人45]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/46.gif',
                                                                value: '[黑白小人46]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/47.gif',
                                                                value: '[黑白小人47]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/48.gif',
                                                                value: '[黑白小人48]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/49.gif',
                                                                value: '[黑白小人49]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/50.gif',
                                                                value: '[黑白小人50]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/51.gif',
                                                                value: '[黑白小人51]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/52.gif',
                                                                value: '[黑白小人52]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/53.gif',
                                                                value: '[黑白小人53]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/54.gif',
                                                                value: '[黑白小人54]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/55.gif',
                                                                value: '[黑白小人55]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/56.gif',
                                                                value: '[黑白小人56]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/57.gif',
                                                                value: '[黑白小人57]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/58.gif',
                                                                value: '[黑白小人58]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/59.gif',
                                                                value: '[黑白小人59]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/60.gif',
                                                                value: '[黑白小人60]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/61.gif',
                                                                value: '[黑白小人61]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/62.gif',
                                                                value: '[黑白小人62]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/63.gif',
                                                                value: '[黑白小人63]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/64.gif',
                                                                value: '[黑白小人64]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/65.gif',
                                                                value: '[黑白小人65]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/66.gif',
                                                                value: '[黑白小人66]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/67.gif',
                                                                value: '[黑白小人67]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/68.gif',
                                                                value: '[黑白小人68]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/69.gif',
                                                                value: '[黑白小人69]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/70.gif',
                                                                value: '[黑白小人70]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/71.gif',
                                                                value: '[黑白小人71]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/72.gif',
                                                                value: '[黑白小人72]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/73.gif',
                                                                value: '[黑白小人73]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/74.gif',
                                                                value: '[黑白小人74]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/75.gif',
                                                                value: '[黑白小人75]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/76.gif',
                                                                value: '[黑白小人76]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/77.gif',
                                                                value: '[黑白小人77]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/78.gif',
                                                                value: '[黑白小人78]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/79.gif',
                                                                value: '[黑白小人79]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/80.gif',
                                                                value: '[黑白小人80]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/81.gif',
                                                                value: '[黑白小人81]'    
                                                            },
                                                            {
                                                                icon: '/img/emoji/82.gif',
                                                                value: '[黑白小人82]'    
                                                            }                                            ]
                                            }
                                        };

                                        // 插入代码时的默认语言
                                        // editor.config.codeDefaultLang = 'html'

                                        // 只粘贴纯文本
                                        editor.config.pasteText = true;

                                        // 跨域上传
                                        // editor.config.uploadImgUrl = 'http://localhost:8012/upload';

                                        // 第三方上传
                                        // editor.config.customUpload = true;

                                        // 普通菜单配置
                                        editor.config.menus = [
                                            'bold',
                                            'underline',
                                            'italic',
                                            'strikethrough',
                                            'eraser',
                                            'forecolor',
                                            'bgcolor',
                                            '|',
                                            'quote',
                                            'fontsize',
                                            'head',
                                            'unorderlist',
                                            'orderlist',
                                            'alignleft',
                                            'aligncenter',
                                            'alignright',
                                            '|',
                                            'table',
                                            'emotion',
                                            '|',
                                            'img',
                                            'video',
                                            '|',
                                            'undo',
                                            'redo',
                                            'fullscreen'
                                        ];
                                        // 只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
                                        // editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
                                        //     if (item === 'insertcode') {
                                        //         return null;
                                        //     }
                                        //     if (item === 'fullscreen') {
                                        //         return null;
                                        //     }
                                        //     return item;
                                        // });

                                        // onchange 事件
                                        // editor.onchange = function () {
                                        //     console.log(this.$txt.html());
                                        // };

                                        // 取消过滤js
                                        editor.config.jsFilter = true;

                                        // 取消粘贴过来
                                        // editor.config.pasteFilter = false;

                                        // 设置 z-index
                                        // editor.config.zindex = 20000;

                                        // 语言
                                        // editor.config.lang = wangEditor.langs['en'];

                                        // 自定义菜单UI
                                        // editor.UI.menus.bold = {
                                        //     normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
                                        //     selected: '.selected'
                                        // };
                                        // editor.UI.menus.italic = {
                                        //     normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
                                        //     selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
                                        // };
                                        editor.onchange = $editor_change()

                                        editor.create();

                                        $content_length = editor.$txt.text().replace(/\s\s/g, '').length
