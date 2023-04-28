<?php

namespace App\Http\Controllers\Administrator\Ong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OngController extends Controller
{
    public function showDetails()
    {

    }

    public function updateDetails(Request $request, $id)
    {
        // criar ong com cnpj e nome no momento que cria usuário
    }

    public function images()
    {

    }

    public function uploadImage(Request $request, $id)
    {
        // criar ong com cnpj e nome no momento que cria usuário
    }

    public function storeImages(Request $request, $id)
    {
        // criar ong com cnpj e nome no momento que cria usuário
    }

    public function phones($id)
    {
        //
    }

    public function storePhones($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
