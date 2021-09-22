<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isadmin(){

        return $this->administration_level > 0 ? true : false;
    
    }
    public function issuperadmin(){
        return $this->administration_level > 0 ? true : false;
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\rating');
    }

    public function rated(book $book)
    {
        return $this->ratings->where('book_id', $book->id)->isNotEmpty();
    }

    public function bookrating(book $book)
    {
        return $this->rated($book) ? $this->ratings->where('book_id', $book->id)->first() : NULL;
    }
    public function booksincart(){

        return $this->belongsToMany("App\Models\book")->withPivot(["number_of_copies","bought"])->wherePivot("bought",FALSE);
    }

    public function ratedpurches()
    {
        return $this->belongsToMany('App\Models\book')->withPivot(['bought'])->wherePivot('bought', true);
    }
}
