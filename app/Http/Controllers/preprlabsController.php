<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\preprlabs;
use JavaScript;

class preprlabsController extends Controller
{
    public function list(){
        $labs = PreprLabs::all();

        JavaScript::put([
            'labs' => $labs,
        ]);

        return view('home', [
            'labs' => $labs,
        ]);
    }
}
