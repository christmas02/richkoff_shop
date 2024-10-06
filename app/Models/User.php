<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
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
    ];

    public static function lisAdministrator()
    {
        return User::all();
    }

    public static function updateProfilAdmin($request){
        try {
            //code...
            $id = $request->id;
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;

            $user = User::where('id',$id)
                ->update([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                ]);
            return $user;

        } catch (\Throwable $th) {
            return $th->getMessage();
            Log::error($th->getMessage());
        }
    }

    public static function updatePhotoprofil($request)
    {
        try{
            $id = $request->id;
            $picture = $request->picture;
            $user = User::where('id',$id)->first();
            $user->picture = $picture;
            $user->save();

            return $user;

        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }

    }

    public static function savePassword($request){
        try {
            $id = $request->id;
            $password = $request->password;
            $password_confirmation = $request->password_confirmation;
            if($password == $password_confirmation){
                $user = User::where('id',$id)->first();
                $user->password = bcrypt($password);
                $user->save();
            }else
            {return 'Erreur';}
            return  $user;

        } catch (\Throwable $th) {
            return $th->getMessage();
            Log::error($th->getMessage());
        }
    }

    public static function roleAdmin()
    {

        return [
            [
                "value" => 1,
                "libel" => 'Super Administrateur',
            ],
            [
                "value" => 2,
                "libel" => 'Administrateur',
            ],
            [
                "value" => 3,
                "libel" => 'Suvie de commande',
            ],
            [
                "value" => 4,
                "libel" => 'Gestionnaire de stock',
            ]
        ];
    }

    public static function saveAdmin($request)
    {
        try{
            if(isset($request['id'] )){
                $user = User::where('id',$request['id'])->first();
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->phone = $request['phone'];
                $user->role = $request['role'];
                $user->save();
            }else{
                $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'phone' => $request['phone'],
                    'role' => $request['role'],
                    'picture' => 'admin.png',
                ]);
            }
            return $user;

        } catch (\Throwable $th) {
            return $th->getMessage();
            Log::error($th->getMessage());
        }

    }


}
