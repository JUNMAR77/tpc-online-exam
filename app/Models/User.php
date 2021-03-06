<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Package;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find($id)
 * @method where(string $string, string $string1, string $keyword)
 * @method static paid()
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $dates = ['expire_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id', 'role_id', 'account_type_id', 'package_id',
        'name', 'last_name', 'email', 'phone', 'provider',
        'provider_id', 'password', 'expire_date', 'is_paid', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var arraym
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePaid($query){
        return $query->where('account_type_id', 1)->where('is_paid', 1)->where('status', 1);
    }

    public function scopeNotAdmin($query){
        return $query->where('role_id', '!=', 1);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }
}
