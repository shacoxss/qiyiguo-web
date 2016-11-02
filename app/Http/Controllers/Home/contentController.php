<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use App\Model\FollowUser;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveVisit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class contentController extends Controller
{
    public function contentLists(Request $request, $cate_id)
    {

        //获取栏目及其子栏目
        $cate2 = Category::where('cate_name','视频游戏')->first();
        if($cate2){
            $son = Category::where('cate_pid',$cate2->cate_id)->count();
            if($son){
                $cate_son = Category::where('cate_pid',$cate2->cate_id)->get();
                $cate_arr2 = [];
                foreach($cate_son as $v){
                    $cate_arr2[] = $v->cate_id;
                }
                array_push($cate_arr2,$cate2->cate_id);
                $cate_ids2 = implode(',',$cate_arr2);
                $video_archives =   Archive::where('archive_type_id',1)
                    ->whereIn('category_id',$cate_ids2)
                    ->orderBy('updated_at','desc')
                    ->take(6)
                    ->get()
                ;
            }else{
                $video_archives =   Archive::where('archive_type_id',1)
                    ->where('category_id',$cate2->cate_id)
                    ->orderBy('updated_at','desc')
                    ->take(6)
                    ->get();
            }
        }else{
            $video_archives = false;
        }

        //游戏攻略
        $cate3 = Category::where('cate_name','游戏攻略')->first();
        if($cate3){
            $son = Category::where('cate_pid',$cate3->cate_id)->count();
            if($son){
                $cate_son = Category::where('cate_pid',$cate3->cate_id)->get();
                $cate_arr3 = [];
                foreach($cate_son as $v){
                    $cate_arr3[] = $v->cate_id;
                }
                array_push($cate_arr3,$cate3->cate_id);
                $cate_ids3 = implode(',',$cate_arr3);
                $game_archives =   Archive::whereIn('category_id',$cate_ids3)
                    ->orderBy('updated_at','desc')
                    ->take(3)
                    ->get()
                ;
            }else{
                $game_archives =   Archive::where('category_id',$cate3->cate_id)
                    ->orderBy('updated_at','desc')
                    ->take(3)
                    ->get()
                ;
            }

        }else{
            $game_archives = false;
        }
        $cate = Category::where('cate_id',$cate_id)->first();
        $archives = Archive::ofPattern('review')
            ->where('category_id', $cate_id)
            ->orderBy('weight', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('pc_home.newsList')
            ->with('archives', $archives)
            ->with('cate',$cate)
            ->with('video_archives',$video_archives)
            ->with('game_archives',$game_archives)
        ;
    }

    public function detail(Request $request, Archive $archive)
    {
        if (!$archive->hasPattern('review')) return response('没有通过审核', 404);

        $archive->visit($request);
        $user = session('user');
        if($user){
            $author_id = $archive->user->id;
            $follow = FollowUser::where('user_id',$user->id)->first();
            if($author_id == $follow['followed_id']){
                $followed = 1;
            }else{
                $followed = 0;
            }
        }else{
            $followed = -1;
        }

        return view($archive->type->t_show)
            ->with('archive', $archive)
            ->with('followed',$followed)
            ->with('user',$user)
        ;
    }

    public function like(Request $request, Archive $archive)
    {
        $user = session('user');

        if (!$user) redirect('/auth');

        if ($archive->isLiked($user)) {
            return response()->json(['msg' => '您已经喜欢过该文章了！', 'code' => 1]);
        } else {
            $archive->like($user);
            return response()->json(['msg' => '感谢您的支持！', 'code' => 0]);
        }
    }

    public function changeFollow()
    {
        $user = session('user');
        if($input = Input::except('_token')){
            if($input['followed']){
                if(FollowUser::where('user_id',$user->id)->where('followed_id',$input['followed_id'])->delete()){
                    return response()->json(['rs'=>'success','msg'=>'取消关注成功！']);
                }else{
                    return response()->json(['rs'=>'error','msg'=>'取消关注失败！']);
                }
            }else{
                $data['user_id'] = $user->id;
                $data['followed_id'] = $input['followed_id'];
                $data['followed_at'] = date('Y-m-d H:i:s',time());
                if(FollowUser::where('user_id',$user->id)->where('followed_id',$input['followed_id'])->first()){
                    return response()->json(['rs'=>'success','msg'=>'您已关注过！']);
                }else if(FollowUser::create($data)){
                    return response()->json(['rs'=>'success','msg'=>'关注成功！']);
                }else{
                    return response()->json(['rs'=>'error','msg'=>'关注失败！']);
                }
            }
        }else{
            return response()->json(['rs'=>'error','msg'=>'非法请求！']);
        }
    }
}
