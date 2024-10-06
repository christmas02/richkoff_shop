<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    //
    //
    public static function uploadFile($image, $entreprise): string
    {
        $fichier_name = $entreprise. '.' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $fichier_name);
        return $fichier_name;
    }

    public function index(){
        try{
            $customers = Client::getAllCustomer();
            return view('admin.customers.listCustomers',['customers' => $customers]);
        }catch(\Throwable $th){
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Veuillez réessayer svp!');
        }
    }

    public function saveCustomer(Request $request)
    {
        try{
            if($request->picture){
                $image = self::uploadFile($request->picture,$request->entreprise);
            }else{
                $image = "logo.png";
            }
            $client = Client::saveCustomer($request, $image);
            //dd($client);
            if($client == true){
                return back()->with('success', 'Enregistrement éffectuer avec succès !');
            }else{
                return back()->with('error', 'Le client existe deja dans la base de donnée');
            }
        }catch(\Throwable $th){
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Veuillez réessayer svp!');
        }

    }

    public function updateCustomer(Request $request){
        try{
            //dd($request->all());
            $client = Client::updateInfoCustomer($request->all());
            //dd($client);
            return back()->with('success', 'Enregistrement éffectuer avec succès !');

        }catch(\Throwable $th){
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Veuillez réessayer svp!');
        }
    }
}
