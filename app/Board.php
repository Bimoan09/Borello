<?php
namespace App;

use Illuminate\Database\Elequent\Model;

class Board extends Model {


    protected $guarded = [];

    protected $fillable = {

        'name', 'username', 'password'
    }



}



?>