<?php
namespace Laraspace\Http\Controllers\Ngoaitru;

use Laraspace\Http\Requests;
use Illuminate\Http\Request;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{
    
	public function index() {
      $msg = "This is a simple message by PTD.";
      return response()->json(array('msg'=> $msg), 200);
   }

   public function findKhambenh(Request $request)
    {   
        if ($request->ajax()) {  
        	
            $sqlpg =@"SELECT * FROM current.dmbenhnhan a INNER JOIN current.khambenh b ON a.mabn = b.mabn WHERE b.makb = '$request->makb'";
            
            $dmbn = DB::connection('pgsql')->select($sqlpg);
            return response()->json($dmbn);
		}       
    }
    
}



