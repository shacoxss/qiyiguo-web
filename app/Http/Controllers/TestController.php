<?php
namespace App\Http\Controllers;
use App\Helpers\ContentCut;
use App\Helpers\HTML;
use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\Relation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Yajra\Datatables\Datatables;
class TestController extends Controller
{
    //
    public function index(Request $request)
    {ini_set('memory_limit', '-1');
        $content = Archive::find(141)->detail->content;
        $content = explode(HTML::PAGE_FLAG, $content);
        $page = new LengthAwarePaginator($content, count($content), 1);
    }
    public function anyData(Request $request)
    {
        return Datatables::of(Tag::query())->make(true);
    }
}
