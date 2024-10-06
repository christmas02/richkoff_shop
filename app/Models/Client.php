<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Client extends Model
{
    use HasFactory;

    public static function getAllCustomer(){
        $customers = Client::all();
        return $customers;
    }

    public static function saveCustomer($request){
        try{
            $customerExiste = Client::where('phone', $request['phone'])
                ->where('email', $request['email'])->first();
            //dd($request);
            if(!$customerExiste){
                $customer = new Client;
                $customer->name_customer = $request['name_customer'];
                $customer->identifiant = 'xxxxxxxxxxx';
                $customer->email = $request['email'];
                $customer->phone = $request['phone'];
                $customer->picture = 'xxxxxxx';
                $customer->adresse = $request['adresse'];
                $customer->save();
                return true;
            }else{
                return false;
            }

        }catch(\Throwable $th){
            dd('model client '.$th);
            Log::error($th->getMessage());
        }
    }

    public static function firstCustomer($id){
        try{
            $customer = Client::find($id);
            return $customer;
        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }
    }

    public static function updateInfoCustomer($request)
    {
        try{

            $customer = Client::where('id',$request['id'])->first();
            //dd($customer );
            $customer->entreprise = $request['entreprise'];
            //$customer->identifiant = uiid;
            $customer->representant = $request['representant'];
            $customer->email = $request['email'];
            $customer->phone = $request['phone'];
            $customer->adresse = $request['adresse'];
            $customer->save();

            return $customer;

        }catch(\Throwable $th){
            return $th->getMessage();
            Log::error($th->getMessage());
        }

    }

}
