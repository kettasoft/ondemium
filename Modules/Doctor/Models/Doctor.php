<?php

namespace Modules\Doctor\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Modules\Education\Models\Education;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Scout\Searchable;
use App\Traits\Permission;
use Modules\Post\Models\Post;
use Modules\Device\Models\Device;
use Modules\Comment\Models\Comment;
use Modules\FollowSystem\Models\Follow;
use App\Traits\Global\Models\Followable;
use Modules\Clinic\Models\Clinic;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable, Permission, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plan_id',
        'username',
        'first_name',
        'last_name',
        'photo',
        'gender',
        'date_birth',
        'email',
        'phone',
        'country_code',
        'permissions',
        'password',
        'status',
        'is_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_verified' => 'boolean',
        'status' => 'boolean',
        'plan_id' => 'integer'
    ];

    protected $dates = [
        'date_birth'
    ];

    protected $with = [
        //
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function posts()
    {
        return $this->morphMany(Post::class, 'createdable')->select('id','body', 'photos');
    }

    public function device()
    {
        return $this->hasMany(\Modules\Device\Models\Device::class, 'doctor_id');
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function group()
    {
        return $this->hasMany(\Modules\Group\Models\Group::class, 'doctor_id');
    }

    public function join()
    {
        return $this->morphMany(\Modules\Group\Models\GroupMember::class, 'memberable');
    }

    public function questions()
    {
        return $this->morphMany(\Modules\Question\Models\Question::class, 'questionable');
    }

    protected static function newFactory()
    {
        return \Modules\Doctor\Database\factories\DoctorFactory::new();
    }
}
