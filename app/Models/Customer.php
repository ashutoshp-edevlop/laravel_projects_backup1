<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "customers";
    protected $primaryKey = "customer_id";

    //when the table column name is user_name, we need to give the function name as UserName, and if we are changing the name column to user_name, we need to change the name to user_name every where
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    //to change the time
    public function getDobAttribute($value)
    {
        return date("d-M-Y", strtotime($value));
    }
}
