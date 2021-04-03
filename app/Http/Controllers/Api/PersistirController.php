<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Persistir;
use Log;

/**
 * API Persistir
 */
class PersistirController extends Controller {

    public function persistir(Request $request){

      $texto = request()->json()->all();

      $p = Persistir::create([
        "texto" => $texto['texto']
      ]);

      
      return response()->json([
        'resultado' => $p
      ], Response::HTTP_OK);
      
    }

}

