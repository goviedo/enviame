<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresasResource;
use App\Http\Resources\EmpresasResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Empresas;
use Log;

/**
 * API Empresa
 */
class EmpresaController extends Controller {

    public function index(){
      $empresas = Empresas::paginate();
      return (new EmpresasResourceCollection($empresas))->response();
    }

    public function save(Request $request) {
      $nombre = $request->input('nombre');

      $empresa = Empresas::create([
        'nombre'=>$nombre
      ]);
      return (new EmpresasResource($empresa))->response();
    }

    public function show(Request $request)
    {
      $id = $request->input('id');
      $empresa = Empresas::find($id);
      return (new EmpresasResource($empresa))->response();
    }

    public function update(Request $request) {
      $id = $request->input('id');
      $nombre = $request->input('nombre');

      $empresa = Empresas::where('id', $id)
          ->update(['nombre' => $nombre]);


      return response()->json([
        'resultado' => $empresa 
      ], Response::HTTP_OK);
    }

    public function delete(Request $request) {
      $id = $request->input('id');

      $empresa = Empresas::find($id)->delete();

      return response(null, Response::HTTP_NO_CONTENT);

    }
}

