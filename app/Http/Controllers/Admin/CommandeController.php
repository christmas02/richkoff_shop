<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommandeController extends Controller
{
    //
    public function listCommand()
    {
        try {
            $commands = Commande::getcommande();
            return view('admin.command.listCommand', ['commands' => $commands]);
        } catch (\Throwable $th) {
            dd($th);
            Log::error($th->getMessage());
            return redirect()->back()->with('danger', 'Veille ressayez svp');
        }
    }

    public function detailCommand($identification_commande)
    {
        try {
            $command = Commande::firstCommand($identification_commande);
            $status = Commande::statusExectutionCommande();
            $product = json_encode($command['products']);
            return view('admin.command.detailCommand', ['command' => $command, 'products' => $product, 'status' => $status]);
        } catch (\Throwable $th) {
            dd($th);
            Log::error($th->getMessage());
            return redirect()->back()->with('danger', 'Veille ressayez svp');
        }
    }

    public function saveStatuCommande(Request $request)
    {
        try{
            $data = $request->all();
            Commande::updateStatutCommandafterexecute($data);
            return redirect()->back()->with('success', 'Operation effectuer avec success !');

        }catch(\Throwable $th){
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Veuillez réessayer svp!');
        }
    }
}
