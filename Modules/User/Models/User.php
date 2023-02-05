<?php

namespace Modules\User\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Modules\Clinic\Models\Clinic;
use Modules\Post\Models\Post;
use Modules\Followable\Models\Followable;
use Modules\Booking\Models\Booking;

use Modules\Rule\Models\Rule;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'date_birth'
    ];

    public function fullname($separator = ' '): string
    {
        return "{$this->first_name}{$separator}{$this->last_name}";
    }

    // public function setPasswordAttribute(string $value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    public function clinic()
    {
        return $this->hasMany(Clinic::class);
    }

    public function bookings(string $type = 'user_id')
    {
        return $this->hasMany(Booking::class, $type);
    }

    public function checkIfDoesntHaveBooking(int $clinic_id, int $doctor_id, $date, bool $done = false)
    {
        return $this->bookings()
        ->whereClinicId($clinic_id)
        ->whereDoctorId($doctor_id)
        ->whereBookingDate($date)
        ->whereIsDone($done)->first();
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
        return $this->morphMany(\Modules\Question\Models\Question::class, 'questionable');
    }

    public function following()
    {
        return $this->belongsToMany($this, 'followables', 'follower_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany($this, 'followables', 'following_id', 'follower_id');
    }

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }
}
