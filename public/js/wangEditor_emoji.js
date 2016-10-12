// 阻止输出log
                                        // wangEditor.config.printLog = false;

                                        var editor = new wangEditor('editor-trigger');

                                        // 上传图片
                                        editor.config.uploadImgUrl = '/upload';
                                        editor.config.uploadParams = {
                                            // token1: 'abcde',
                                            // token2: '12345'
                                        };
                                        editor.config.uploadHeaders = {
                                            // 'Accept' : 'text/x-json'
                                        }
                                        // editor.config.uploadImgFileName = 'myFileName';

                                        // 隐藏网络图片
                                        // editor.config.hideLinkImg = true;

                                        // 表情显示项
                                        editor.config.emotionsShow = 'icon';
                                        editor.config.emotions = {
                                            'default': {
                                                title: '默认',
                                                data: '/qyg_mg/pulgin/wangEditor/dist/emotions.data'
                                            },
                                            'weibo': {
                                                title: '什么值得买',
                                                data: [
                                                    
                                                            {
                                                                icon: '/qyg_mg/img/emoji/22.gif',
                                                                value: '[黑白小人22]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/23.gif',
                                                                value: '[黑白小人23]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/24.gif',
                                                                value: '[黑白小人24]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/25.gif',
                                                                value: '[黑白小人25]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/26.gif',
                                                                value: '[黑白小人26]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/27.gif',
                                                                value: '[黑白小人27]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/28.gif',
                                                                value: '[黑白小人28]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/29.gif',
                                                                value: '[黑白小人29]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/30.gif',
                                                                value: '[黑白小人30]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/31.gif',
                                                                value: '[黑白小人31]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/32.gif',
                                                                value: '[黑白小人32]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/33.gif',
                                                                value: '[黑白小人33]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/34.gif',
                                                                value: '[黑白小人34]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/35.gif',
                                                                value: '[黑白小人35]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/36.gif',
                                                                value: '[黑白小人36]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/37.gif',
                                                                value: '[黑白小人37]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/38.gif',
                                                                value: '[黑白小人38]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/39.gif',
                                                                value: '[黑白小人39]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/40.gif',
                                                                value: '[黑白小人40]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/41.gif',
                                                                value: '[黑白小人41]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/42.gif',
                                                                value: '[黑白小人42]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/43.gif',
                                                                value: '[黑白小人43]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/44.gif',
                                                                value: '[黑白小人44]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/45.gif',
                                                                value: '[黑白小人45]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/46.gif',
                                                                value: '[黑白小人46]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/47.gif',
                                                                value: '[黑白小人47]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/48.gif',
                                                                value: '[黑白小人48]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/49.gif',
                                                                value: '[黑白小人49]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/50.gif',
                                                                value: '[黑白小人50]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/51.gif',
                                                                value: '[黑白小人51]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/52.gif',
                                                                value: '[黑白小人52]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/53.gif',
                                                                value: '[黑白小人53]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/54.gif',
                                                                value: '[黑白小人54]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/55.gif',
                                                                value: '[黑白小人55]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/56.gif',
                                                                value: '[黑白小人56]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/57.gif',
                                                                value: '[黑白小人57]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/58.gif',
                                                                value: '[黑白小人58]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/59.gif',
                                                                value: '[黑白小人59]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/60.gif',
                                                                value: '[黑白小人60]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/61.gif',
                                                                value: '[黑白小人61]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/62.gif',
                                                                value: '[黑白小人62]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/63.gif',
                                                                value: '[黑白小人63]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/64.gif',
                                                                value: '[黑白小人64]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/65.gif',
                                                                value: '[黑白小人65]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/66.gif',
                                                                value: '[黑白小人66]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/67.gif',
                                                                value: '[黑白小人67]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/68.gif',
                                                                value: '[黑白小人68]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/69.gif',
                                                                value: '[黑白小人69]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/70.gif',
                                                                value: '[黑白小人70]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/71.gif',
                                                                value: '[黑白小人71]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/72.gif',
                                                                value: '[黑白小人72]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/73.gif',
                                                                value: '[黑白小人73]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/74.gif',
                                                                value: '[黑白小人74]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/75.gif',
                                                                value: '[黑白小人75]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/76.gif',
                                                                value: '[黑白小人76]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/77.gif',
                                                                value: '[黑白小人77]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/78.gif',
                                                                value: '[黑白小人78]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/79.gif',
                                                                value: '[黑白小人79]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/80.gif',
                                                                value: '[黑白小人80]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/81.gif',
                                                                value: '[黑白小人81]'    
                                                            },
                                                            {
                                                                icon: '/qyg_mg/img/emoji/82.gif',
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
                                        // editor.config.jsFilter = false;

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
                                        editor.create();
