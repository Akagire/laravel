<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    // https://readouble.com/laravel/5.4/ja/eloquent.html
    // "他の名前を明示的に指定しない限り、クラス名を複数形の「スネークケース」にしたものが、テーブル名として使用されます"
    // どうしても指定したい場合は↓
    // protected $table = 'people';
}
