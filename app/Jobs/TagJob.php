<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Tag\Tag;

class TagJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Tag
     */
    private $tag;

    /**
     * Create a new job instance.
     *
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        //
        $this->tag = $tag;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api_key = env('91CHA_API_KEY');
        //
        //$this->tag->baidu_index = get();

        $this->tag->save();
    }
}
