<?php

namespace App\Http\Controllers\Home;

use App\Models\Archive\Archive;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class contentController extends Controller
{
    public function lists(Request $request)
    {
        $archives = Archive::ofPattern('review')
            ->orderBy('weight', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('pc_home.newsList')
            ->with('archives', $archives)
        ;
    }
}
