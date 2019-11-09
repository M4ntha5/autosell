<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city_id', 'country_id', 'user_level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ads()
    {
        return $this->hasMany('App\Ad');
    }
    public static function getAllUsers()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(6);
        return $users;
    }

    public static function getUser($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public static function updateUser(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public static function deleteUser(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }


    public static function create(array $request)
    {
        $user = new User();   
        if (!empty($request['email'])) 
        {
            $user->email = $request['email'];
        }
        if (!empty($request['password'])) 
        {
            $user->password = Hash::make($request['password']);
        }
        $user->name = 'jonas';
        $user->save();    
        
        return $user;   
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

}
