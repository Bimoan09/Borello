<?php
namespace App;


use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use illuminate\Http\Request;

class Board extends Model {


    protected $guarded = [];

    protected $fillable = [
        'name', 'username', 'password', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}



?>