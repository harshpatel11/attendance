<?php

namespace App\Http\Controllers\Graph;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\holiday;
use Session;
use config\attendance;


class GraphController extends Controller
{
    public function check(Request $request)
    {
        $username = config('attendance.username');
        $password = config('attendance.passwords');
        $url = config('attendance.url');

        $arrayName = array('username' => $username,
                        'password' => $password);
         
        $array = json_encode($arrayName,true);
        $post = $request->all();
        
        $response = \Httpful\Request::post($url.'userloginapi/user/login')->sendsJson()->body($array)->send();
       
        $cookie_session = $response->body->session_name . '=' . $response->body->sessid;
        $response = \Httpful\Request::get($url.'holidaysapi/holidaysapi')->addHeader('Cookie', $cookie_session)->send();
        

            foreach ($response->body as $key => $value) {
                $results = holiday::where('Date', '=', $value->Date)->get();
                $len=count($results);

                if($len == "0") {
                    $holiday = new holiday;
                    $holiday->Title = $value->Title;
                    $holiday->Date = $value->Date;
                    $holiday->save();  

                }else if($len == "1") {
                    echo "Record is already there .......";   
                }
            }            

    }

}















//        $len=count($response);
//         if($len == "0") {
//         foreach ($response->body as $key => $value) {
//             $holiday = new holiday;

//             $check = $this->checkDate($value->Date);
//                 if($check){
//                     $holiday->Title = $value->Title;
//                     $holiday->Date = $value->Date;
//                     $holiday->save();  
//                 }
//             }
//         }
//         else if($len == "1") {
//             $id=$response['_id'];
//             $arrayName = array(
//             'Date' =>$response['Date'],
//             );
        
//             $response = holiday::where('_id',$id)->update($arrayName);

//             echo "Record is Updated .......";   
//         }

//      exit; 
//     }



//         public function checkDate($date){
//             $result = holiday::where('_id',$id)->first();
//             return $this->func_name('check')->with('data',$result);        
//         }
// }



 // $id=$response['_id'];
            
 //            $arrayName = array(
 //            'Date' =>$response['Date'],
 //         );
        
 //            $response = holiday::where('_id',$id)->update($arrayName);





//     public function add()
//     {
//          return view ('holiday');
//     }


//     public function addholiday(Request $request)
//     {
//         $post = $request->all();
//         $title=$post['Title'];
//         $date=$post['Date'];

//         $holiday = holiday::all();
//         $holiday_array=json_decode($holiday, true);

//         $results = holiday::where('Title', '=', $title)->where('Date', '=', $date)->get();
//         $len=count($results);

//         if($len == "0") {
//                 $holiday = new holiday;
//                 $holiday->Title = $title;
//                 $holiday->Date = $date;
//                 $holiday->save();              
//         }else if($len == "1") {
//             echo "Record is already there .......";   
//         }

//         exit;
//     }

// }


//$holiday = holiday::all();
        // $data['Date'] = $holiday->toArray();
        // echo"<pre>";
        // print_r($data);exit();



     



    