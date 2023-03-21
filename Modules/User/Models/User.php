<?php

namespace Modules\User\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr,
    Illuminate\Support\Str;

use App\Traits\Global\Models\IsDoctor;

use Modules\Clinic\Models\Clinic;
use Modules\Post\Models\Post;
use Modules\Followable\Models\Followable;
use Modules\Booking\Models\Booking;
use Modules\Experience\Models\Experience;
use Modules\Specialization\Models\Specialization;
use Modules\Device\Models\Device;
use Modules\Setting\Models\Setting;
use Modules\Plan\Models\Plan;
use Modules\Question\Models\Question;
use Modules\Poll\Models\Poll;
use Modules\Pharmacy\Models\Pharmacy;

use Modules\Token\Models\Agent,
    Modules\Token\Models\Token;

use Modules\Rule\Models\Rule;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, IsDoctor;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    protected const USER_COLUMNS = [
        'id',
        'first_name',
        'last_name',
        'phone',
        'account_verified_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean'
    ];

    protected $dates = [
        'date_birth'
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function selete($keys = [])
    {
        return $this->first($keys);
    }

    public function simple($keys = ['id', 'first_name', 'last_name', 'photo', 'account_verified_at'])
    {
        return $this->selete($keys);
    }

    public function fullname($separator = ' '): string
    {
        return "{$this->first_name}{$separator}{$this->last_name}";
    }

    public function settings()
    {
        return $this->hasOne(Setting::class);
    }

    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getPhotoAttribute(string $value)
    {
        return avatar_path($value);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function rules()
    {
        return $this->belongsToMany(Rule::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function following()
    {
        return $this->belongsToMany($this, 'followables', 'follower_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany($this, 'followables', 'following_id', 'follower_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function myTokens()
    {
        return $this->hasMany(Token::class);
    }

    public function agents($table = 'parent_id')
    {
        return $this->hasMany(Agent::class, $table);
    }

    public function workers()
    {
        return $this->agents('agent_id');
    }

    public function pharmacy()
    {
        return $this->hasOne(Pharmacy::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    /**
     * Determine if the token has a given ability.
     *
     * @param  string  $ability
     * @return bool
     */
    public function ability($ability, $only = null)
    {
        $currentAccessToken = $this->currentAccessToken();

        if ($currentAccessToken->name == 'primary') {
            return true;
        }

        $abilities = $currentAccessToken->abilities;

        if ($arr = Arr::get($abilities, "$ability.only")) {
            dd(Arr::get($arr, "$only"));
        }

        return Arr::get($abilities, $ability);
    }

    public function getTokenName()
    {
        return $this->currentAccessToken()->name;
    }

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }
}
