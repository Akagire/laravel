<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Builder;

use App\Scopes\ScopePerson;

class Person extends Model
{
    //
    // https://readouble.com/laravel/5.4/ja/eloquent.html
    // "他の名前を明示的に指定しない限り、クラス名を複数形の「スネークケース」にしたものが、テーブル名として使用されます"

    // どうしても指定したい場合は↓
    // protected $table = 'people';

    // 検索で利用されるPrimary keyのカラム名は「id」である前提。
    // id以外を指定したい場合は↓
    // protected $primaryKey = 'userid';

    protected $guarded = array('id');

    // DBにupdated_at、created_atをつけたくないので
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name . '(' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:120',
    );
}
