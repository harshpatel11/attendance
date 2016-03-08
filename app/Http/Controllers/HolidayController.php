<?php
  
namespace App\Http\Controllers;
  
use App\holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;  
  
class HolidayController extends Controller{
  
  
    public function index(){
  
        $holiday  = holiday::all();
  
        return response()->json($holiday);
  
    }
  
    public function getholiday($id){
  
        $holiday  = holiday::find($id);
  
        return response()->json($holiday);
    }
  
   
    }
  
  
  
}