<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Overtrue\Pinyin\Pinyin;
use Symfony\Component\Process\Exception\InvalidArgumentException;

/**
 * @property string  name
 * @property string  url
 * @property string  pinyin
 */
class Tag extends Model
{
    use TagAliases,TagRelated;

    const PINYIN_BREAK = '-';
    const TAG_URL = '/tag/';
    const AUTO_SUFFIX_LIMIT = 1;

    const RELATION_TABLE = 'tag_relations';
    const RELATION_ALIAS = 'alias';
    const RELATION_RELATED = 'related';
    const RELATION_NAME_COLUMN = 'relation';
    const RELATION_KEY_COLUMN = 'one_id';
    const RELATION_OTHER_COLUMN = 'other_id';
    const RELATION_WEIGHT_COLUMN = 'weight';
    //
    protected $fillable = ['name', 'url', 'pinyin'];

    /**
     * Save a new model and return the instance.
     *
     * @param  array $attributes
     * @param bool $auto_compute_url
     * @return static
     */
    public static function create(array $attributes = [], $auto_compute_url = true)
    {
        $model = new static($attributes);

        if ($msg = $model->isInvalidName()) {
            throw new InvalidArgumentException($msg);
        }

        if (empty($model->pinyin)) {
            $model->autoComputePinyin();
        }

        if ($auto_compute_url and empty($model->url)) {
            $model->autoComputeUrl();
        }

        $model->save();
        return $model;
    }

    /**auto compute pinyin
     *
     * @return static
     */
    private function autoComputePinyin()
    {
        $pinyin = new Pinyin();
        $this->pinyin = $pinyin->permalink($this->name, self::PINYIN_BREAK);
        return $this;
    }

    /**auto compute unique url
     *
     * @return static
     */
    private function autoComputeUrl()
    {
        if (empty($this->pinyin)) {
            $this->autoComputePinyin();
        }

        $this->url = self::TAG_URL.$this->pinyin;

        //set the url unique
        while (self::where('url', $this->url)->first()) {
            $this->url .= '-'.strtolower(Str::random(self::AUTO_SUFFIX_LIMIT));
        }

        return $this;
    }

    /**
     * 检测标签名是否有效
     *
     * @return string
     */
    protected function isInvalidName()
    {
        $error_message = '';

        if (empty($this->name)) {
            $error_message = '标签名不能为空。';
        }

        elseif (Tag::where('name', $this->name)->first()) {
            $error_message = "重复的标签名：'$this->name'。";
        }

        return $error_message;
    }

    /**
     * 模糊搜索pinyin和name
     *
     * @param string $query
     *
     * @return \Illuminate\Database\Eloquent\Collection
     *
     */

    public static function search($query)
    {
        function str_split_unicode($str, $l = 1) {
            if ($l > 0) {
                $ret = array();
                $len = mb_strlen($str, "UTF-8");
                for ($i = 0; $i < $len; $i += $l) {
                    $ret[] = mb_substr($str, $i, $l, "UTF-8");
                }
                return $ret;
            }
            return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
        }

        $where = '%';
        foreach (str_split_unicode($query) as $word) {
            $where .= $word.'%';
        }

        return self::where('name', 'like', $where)
            ->orWhere('pinyin', 'like', $where)
            ->get();
    }

    /**
     * 把一组标签id、标签名、Tag实例包装成Tag id 集合
     *
     * @param array $tags
     * 如果标签名不存在，是否创建它
     * @param bool $create_it
     * @return \Illuminate\Support\Collection
     */
    public static function wrapToTagIdCollect(array $tags, $create_it = false)
    {
        return collect($tags)
            ->map(function ($alias) use($create_it) {
                if ($alias instanceof static) {
                    return $alias->id;
                }

                if (is_numeric($alias)) {
                    return $alias;
                }

                if (is_string($alias)) {
                    if ($tag = self::where('name', $alias)->value('id')) {
                        return $tag;
                    }

                    if ($create_it) {
                        return self::create(['name' => $alias])->id;
                    }
                }

                throw new \Exception('Invalid Tag Type: '.$alias);
            });
    }
}
