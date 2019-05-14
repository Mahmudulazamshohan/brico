<?php

namespace App\Http\Controllers;

use App\Brick;
use App\Customer;
use App\Expense;
use App\GeneralSetting;
use App\Invoice;
use App\Laborer;
use App\Lender;
use App\Salary;
use App\Sell;
use App\Stock;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Currency;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Laser;
use App\RawBrick;
class UserController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:user');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
    }
    public function showUserDashboard(){
    	$rawBrick = RawBrick::where('setup_date',date('Y-m-d'))
    	->where('mill_no',1)
    	->orderBy('pot_no','asc')
    	->get();

    	// foreach ($rawBrick as $key => $value) {
    	// 	echo '<input type="text" value="'.$value->setup_date.'" style="width:200px;heigth:70px;border-radius:4px;" disabled/>';
    	// 	echo '<input type="text" value="'.$value->mill_no.'" style="width:200px;heigth:70px;border-radius:4px; margin-bottom:2px;" disabled/>';
    	// 	echo '<input type="text" value="'.$value->round_no.'" style="width:200px;heigth:70px;border-radius:4px; margin-bottom:2px;" disabled/>';
    	// 	echo '<input type="text" value="'.$value->pot_no.'" style="width:200px;heigth:70px;border-radius:4px; margin-bottom:2px;" disabled/>';
    	// 	echo '<input type="text" value="'.$value->even_no.'" style="width:200px;heigth:70px;border-radius:4px; margin-bottom:2px;"/>';
    	// 	echo '<input type="submit" value="Submit"style="width:200px;heigth:50px;border-radius:4px; margin-bottom:2px;" disabled /><br>';
    	// }
    	$data['page_title'] = "Dashboard";
        $data['site_title'] = $this->site_title;
        return view('user.dashboard',$data);
    }
    


}
