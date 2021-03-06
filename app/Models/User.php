<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,HasRoles;
    /**
     * @var string
     */
    public $table = 'vicidial_users';
    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable=[

        'full_name','pass','user'
    ];
    protected $hidden = [
        'pass', 'remember_token','user_id'
        ];

    /**
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
  
    public function isOnline(){
        return Cache::has('user-is-online' . $this->id);
    }

    /*
    const VERIFIED_USER= '1';
    const UNVERIFIED_USER= '0';


    const ADMIN_USER= 'true';
    const REGULAR_USER='false';
    protected $fillable = [
        'name', 'email', 'password','verified','verification_token','admin'
    ];

    protected $hidden = [
        'password', 'remember_token','verification_token',
    ];
    public function isVerified(){
        return $this->verified==User::VERIFIED_USER;
    }
 
    public function isAdmin(){
        return $this->admin==User::ADMIN_USER;
    }
    public static function generateVerificationCode(){
        return str_random(40);
    }
    const ACTIVE_USER= '1';
    const INACTIVE_USER= '0';
    public function isActive(){
       return $this->active==User::ACTIVE_USER;
   }
  */
    //define Mutators
    /**
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
    }

    /**
     * @param $name
     * @return string
     */
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    /**
     * @param $email
     */
    public function EmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }


    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 'Y');

    }
   
}
