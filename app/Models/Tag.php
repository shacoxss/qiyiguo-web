<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\Pinyin\Pinyin;
use Symfony\Component\Process\Exception\InvalidArgumentException;

/**
 * @property string  name
 * @property string  url
 * @property string  pinyin
 */
class Tag extends Model
{
    const PINYIN_BREAK = '-';
    //
    protected $fillable = ['name', 'url', 'pinyin'];

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function create(array $attributes = [])
    {
        $model = new static($attributes);

        if(empty($model->url) || empty($model->pinyin)) {
            $model->autoComputeAttributes();
        }
        $model->save();

        return $model;
    }

    /**
     * 当url或者pinyin为空时自动为其设置
     *
     *
     * @return static
     */
    public function autoComputeAttributes()
    {
        if($msg = $this->isInvalidName()) {
            throw new InvalidArgumentException($msg);
        }

        if(empty($this->pinyin)) {
            $pinyin = new Pinyin();
            $this->pinyin = $pinyin->permalink($this->name, self::PINYIN_BREAK);
        }

        if(empty($this->url)) {
            $this->url = '/tag/'. $this->pinyin;
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

        if(empty($this->name)) {
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
        foreach(str_split_unicode($query) as $word) {
            $where .= $word.'%';
        }

        return self::where('name', 'like', $where)
            ->orWhere('pinyin', 'like', $where)
            ->get();
    }
}
