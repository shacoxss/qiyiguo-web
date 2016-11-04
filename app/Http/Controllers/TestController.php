<?php

namespace App\Http\Controllers;

use App\Helpers\ContentCut;
use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\Relation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        $text = '<table><tr><td><p>111</p></td></tr></table>';

        $match = [];

        return preg_replace('#(<table>.*)(<p>(.*)</p>)(.*</table>)#', '$1$3<br>$4', $text);

        $content = Archive::find(72)->detail->content;

        $content = new ContentCut($content);

        echo($content->cut());
    }

    public function anyData(Request $request)
    {
        return Datatables::of(Tag::query())->make(true);
    }
}
