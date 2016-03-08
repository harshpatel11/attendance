<?php

namespace App\Console\Commands;
use App\holiday;
use config\attendance;
use Illuminate\Console\Command;

class funholiday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enjoy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $username = config('attendance.username');
        $password = config('attendance.passwords');
        $url = config('attendance.url');

        $arrayName = array('username' => $username,
                        'password' => $password);
         
        $array = json_encode($arrayName,true);

        $response = \Httpful\Request::post($url.'userloginapi/user/login')->sendsJson()
        ->body($array)->send();
        $cookie_session = $response->body->session_name . '=' . $response->body->sessid;
        $response = \Httpful\Request::get($url."holidaysapi/holidaysapi")->addHeader('Cookie', $cookie_session)->send();
        
        foreach($response->body as $data){
            $holiday = new holiday;
            $holiday->Title = $data->Title;
            $holiday->Date = $data->Date;
            $holiday->save();
        }

        $this->info('Holiday Data Save Successfully ...');
    
    }
}
