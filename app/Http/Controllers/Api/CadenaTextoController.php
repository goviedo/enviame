<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CadenaTextoController extends Controller
{
    private function pal($palindrome) {

        $ok = true;

        $largo = strlen($palindrome);
        $i = 0;
        for ($i = 0; $i < $largo/2; $i++) {
            if ($palindrome[$i] !== $palindrome[$largo - 1 - $i]) $ok =  false;
        }
        return $ok;
    }

    private function verificaFraseCompleta($frase) {
        $palabras = array();
        $largoFrase = strlen($frase);

        $inicio = 0;
        $avance = 1;
        $i = 0;
        while($largoFrase-->0) {
            $palabra = $frase[$inicio].$frase[($inicio+($avance++<$largoFrase?$avance++:0))];
            if($this->pal($palabra) && strlen($palabra)>3) {
                $palabras[$i++] = $palabra;
                $inicio++;
                $avance = 1;
            }
            
        }
        return $palabras;
    }
    /**
     * Obtiene las cadenas que es son iguales
     * al reves o al derecho
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $frase = $request->input('frase');

        $palabras = $this->verificaFraseCompleta($frase);
        
        return response()->json([
            'data' => $palabras 
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
