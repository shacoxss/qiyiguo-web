<?php
/**
 * Created by PhpStorm.
 * User: shx
 * Date: 2016/10/24
 * Time: 14:29
 */

namespace App\Models\Archive;

use Illuminate\Http\Request;

trait VisitCountable
{
    public function visit(Request $request)
    {
        $user_id = session('user') ? session('user')->id : null;
        $ip = $request->ip();

        $visit = ArchiveVisit
            ::where(function ($query) use($ip, $user_id) {
                $query
                    ->where('ip', $ip)
                    ->orWhere('user_id', $user_id)
                ;
            })
            ->where('archive_id', $this->id)
            ->where('updated_at', '>', DB::raw('NOW()-'.ArchiveVisit::VISITED_EXPIRE.''))
            ->first()
        ;

        if (!$visit) {
            ArchiveVisit::create([
                'user_id' => $user_id,
                'archive_id' => $this->id,
                'ip' => $ip,
            ]);
        }
    }


    public function getVisitCountAttribute()
    {
        return ArchiveVisit::where('archive_id', $this->id)->count();
    }
}