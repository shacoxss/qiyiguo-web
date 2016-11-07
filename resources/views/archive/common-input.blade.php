<div class="form-group">
    <label>{{$type->display_name}}标题：</label>
    <input class="form-control" name="title" placeholder="{{$type->display_name}}标题" value="{{$archive->title or ''}}" style="font-size: 20px">
</div>
<div class="form-group">
    <label>标签(数量不可超过三个，选择好标签有助提升阅读量，<a href="#">点此学习如何写好标签</a>)</label>
    <input class="form-control" placeholder="标签" name="tags" value="{{$tags or ''}}">
    <br>
    <p style="display: none;">
        推荐标签：
        <span id="extract"></span>
    </p>
</div>
@if(session('user')->master)
    <!-- 管理员属性编辑开始 -->
    <div class="row">
        <!-- 单属性控制 -->
        @foreach($patterns as $p)
            <div class="form-group col-md-3">
                <div class="list-group-item withswitch">
                    <h5 class="list-group-item-heading">{{$p->display_name}}</h5>
                    <p class="list-group-item-text">{{'{'.$p->name.'}'}}</p>
                    <div class="switch">
                        <input id="cmn-toggle-{{$p->name}}" class="cmn-toggle
                                                                cmn-toggle-round" type="checkbox" name="{{$p->name}}"
                               @if(isset($archive) && ($archive->mode & $p->pattern) == $p->pattern)
                               checked="checked"
                                @endif
                        >
                        <label for="cmn-toggle-{{$p->name}}" style="border:none;"></label>
                    </div>
                </div>
            </div>
    @endforeach
        @if(session('user')->master)
            <div class="form-group col-md-3">
                <div class="list-group-item withswitch">
                    <h5 class="list-group-item-heading">奇异果资讯</h5>
                    <p class="list-group-item-text">news</p>
                    <div class="switch">
                        <input id="cmn-toggle-news" class="cmn-toggle
                                                            cmn-toggle-round" type="checkbox" name="news"
                               @if(isset($archive) && $archive->news)
                               checked="checked"
                                @endif
                        >
                        <label for="cmn-toggle-news" style="border:none;"></label>
                    </div>
                </div>
            </div>
            @endif
    <!-- 单属性控制 -->
        <div class="form-group col-md-12">
            <label>关联系统栏目</label>
            <select class="form-control" name="category_id">
                @foreach($cate as $c)
                    <option @if(isset($archive) && $archive->category_id == $c->cate_id)
                            selected
                            @endif
                            value="{{$c->cate_id}}">
                        {{str_repeat('--', $c->lev)}} {{$c->cate_name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- 管理员属性编辑开始 -->
@endif