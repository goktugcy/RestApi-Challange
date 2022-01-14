<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\packages;
class CompanyController extends Controller
{
    public $successStatus = 200;
    public function getpackages()
    {
       $company =  packages::orderBy('name','DESC')->get();
        
       
       foreach ($company as $key => $packages) {
           packages::orderBy('name','DESC')->get(); //Foreach döngüsü ile kullanıcılar
       }

        $message['success'] = 'Veriler başarıyla görüntülendi';
        return response()->json(['message' => $message], $this->successStatus );
        // return response()->json($company); //Dataları görüntülemek için.
    }

 
}
