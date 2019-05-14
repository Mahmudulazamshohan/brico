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
use Illuminate\Support\Facades\Cache;
use App\Payment;
use App\Laser;
use App\Forma;
use App\RawBrick;
use App\Fuel;
use App\Bill;
use App\Coal;
use App\Lease;
use App\Delivery;
use App\Unload;
use App\Stuff;
use App\StuffPayment;
use App\StuffSalary;
use App\Accessories;
use App\CoalProducer;
use Illuminate\Support\Facades\DB as DB;
class DashboardController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:admin');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
    }
    public function getDashboard()
    {
        $data['page_title'] = "Dashboard";
        $data['total_customer'] = Customer::all()->count();
        $data['total_laborer'] = Laborer::all()->count();
        $data['site_title'] = $this->site_title;
        $data['stock'] = Stock::all();
         
        return view('dashboard.dashboard',$data);
    }
    public function createCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Create Currency";
        return view('dashboard.currency-create',$data);
    }
    public function storeCurrency(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:currencies,name',
            'rate' => 'required'
        ]);
        try {
            $curr = Input::except('_method','_token');
            Currency::create($curr);
            session()->flash('message', 'Currency Create Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "All Currency";
        $data['currency'] = Currency::orderBy('id','ASC')->paginate(100);
        return view('dashboard.currency-show',$data);
    }
    public function editCurrency($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Edit Currency";
        $data['currency'] = Currency::findOrFail($id);
        return view('dashboard.currency-edit',$data);

    }
    public function updateCurrency(Request $request,$id)
    {
        $curr = Currency::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:currencies,name,'.$curr->id,
            'rate' =>'required'
        ]);
        try {
            $currency = Input::except('_method','_token');
            $curr->fill($currency)->save();
            session()->flash('message', 'Currency Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteCurrency(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $currency = Currency::findOrFail($request->input('id'));
                $currency->delete();
                session()->flash('message', 'Currency Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createBrick()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Brick";
        $data['currency'] = Currency::all();
        return view('dashboard.brick-create',$data);
    }
    public function storeBrick(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:bricks,name',
            'rate' => 'required',
            'currency_id' => 'required'
        ]);
        try {
            $brick = Input::except('_method','_token');
            $bricks = Brick::create($brick);
            $stock = new Stock;
            $stock->brick_id = $bricks->id;
            $stock->save();
            session()->flash('message', 'Brick Create Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showBrick()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Fuel";
        $data['brick'] = Brick::orderBy('id','ASC')->paginate(100);
        return view('dashboard.brick-show',$data);
    }
    public function editBrick($id)
    {
        $data['brick'] = Brick::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Brick Fuel';
        $data['currency'] = Currency::all();
        return view('dashboard.brick-edit',$data);
    }
    public function updateBrick(Request $request,$id)
    {
        $bricks = Brick::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:bricks,name,'.$bricks->id,
            'rate' => 'required',
            'currency_id' => 'required',
        ]);
        try {
            $brick = Input::except('_method','_token');
            $bricks->fill($brick)->save();
            session()->flash('message', 'Brick Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function addBrick()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Add Brick To Stock';
        $data['brick'] = Brick::all();
        return view('dashboard.stock-brick',$data);
    }
    public function storeBrickStock(Request $request)
    {
        $this->validate($request,[
           'brick_id' => 'required',
            'stock_date' => 'required',
            'stock_list'=>'required',
            'quantity' => 'required'
        ]);
        try {
            $brick = Input::except('_method','_token');
            Store::create($brick);
            $stock = Stock::whereBrick_id($request->brick_id)->first();
            $stock->quantity = $stock->quantity + $request->quantity;
            $stock->save();
            session()->flash('message', 'Stock Brick Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showBrickStock()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'All Stock';
        $data['stock'] = Stock::orderBy('id','ASC')->paginate(1000);
        return view('dashboard.stock-show',$data);

    }
    public function invoiceBrickStock()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Stock Invoice";
        $data['invoice'] = Store::orderBY('id','DESC')->paginate(1000);
        return view('dashboard.stock-invoice',$data);
    }
    public function dateBrickStock(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Stock Invoice";
        $data['invoice'] = Store::whereBetween('stock_date', [$start_date, $end_date])->orderBy('id','DESC')->paginate(1000);
        return view('dashboard.stock-invoice',$data);
    }
    public function invoiceIDBrickStock($id)
    {
        $data['invoice'] = Store::whereBrick_id($id)->orderBy('id','DESC')->paginate();
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Brick Invoice";
        return view('dashboard.stock-invoice',$data);

    }
    public function editBrickInvoice($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Stock Invoice Edit";
        $data['invoice'] = Store::findOrFail($id);
        $data['brick'] = Brick::all();
        return view('dashboard.stock-edit',$data);
    }
    public function updateBrickInvoice(Request $request,$id)
    {
        $invoice = Store::findOrFail($id);
        $stock = Stock::whereBrick_id($invoice->brick_id)->first();

        $this->validate($request,[
           'brick_id' => 'required',
            'stock_date' =>'required',
            'quantity' => 'required'
        ]);
        if($request->brick_id == $invoice->brick_id){
            try {
                $inv = Input::except('_method','_token');
                $stock->quantity = $stock->quantity - ($invoice->quantity - $request->quantity);
                $invoice->fill($inv)->save();
                $stock->save();
                session()->flash('message', 'Stock Brick Update Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            } catch (\PDOException $e) {
                session()->flash('message', "Some Problem Occurs, Please Try Again!");
                Session::flash('type', 'danger');
                return redirect()->back();
            }

        }else{
            try {
                $inv = Input::except('_method','_token');

                $stock->quantity = $stock->quantity - $invoice->quantity;
                $stock->save();
                $stock2 = Stock::whereBrick_id($request->brick_id)->first();
                $stock3['quantity'] = $stock2->quantity + $invoice->quantity;
                $stock2->fill($stock3)->save();

                $stock2->quantity = $stock2->quantity - ($invoice->quantity - $request->quantity);
                $stock2->save();

                $invoice->fill($inv)->save();

                session()->flash('message', 'Stock Brick Update Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            } catch (\PDOException $e) {
                session()->flash('message', "Some Problem Occurs, Please Try Again!");
                Session::flash('type', 'danger');
                return redirect()->back();
            }
        }
    }

    public function createCustomer()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Customer Information';
        $data['brick'] = Brick::all();
        return view('dashboard.customer-create',$data);
    }

    public function storeCustomer(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            
        ]);
        try {
            $customer = Input::except('_method','_token');

            // $r = Stock::whereBrick_id($request->brick_id)->first();

            
                
                    
                
                    $customer = Customer::create($customer);
                    $invoice = [];
                    $invoice['customer_id'] = $customer->id;
                    $invoice['brick_id'] = 0;
                    $invoice['quantity'] = 0;
                    $invoice['created_date'] = date("Y-m-d H:i:s");
                    $invoice['pay_date'] = date("Y-m-d");
                    $invoice['paid_by'] = Auth::guard('admin')->user()->username;
                    $invoice['paid_id'] = Auth::guard('admin')->user()->id;
                    $inv = Invoice::create($invoice);
                    $cus1 = Customer::findOrFail($customer->id);
                    $cus1->invoice_id = $inv->id;
                    $cus1->save();

                    // $sell = Sell::whereSell_date(date('Y-m-d'))->first();
                    // if($sell){
                    //     $sell->amount = $sell->amount + ($request->quantity * $inv->brick->rate);
                    //     $sell->currency_id = $inv->brick->currency->id;
                    //     $sell->total_sell = $sell->total_sell + ($request->quantity * $inv->brick->rate);
                    //     $sell->save();
                    // }else{
                    //     $sell['sell_date'] = date('Y-m-d');
                    //     $sell['amount'] = $request->quantity * $inv->brick->rate;
                    //     $sell['currency_id'] = $inv->brick->currency->id;
                    //     $sell['total_sell'] = $request->quantity * $inv->brick->rate;
                    //     Sell::create($sell);
                    // }

                    // $stock = Stock::whereBrick_id($inv->brick_id)->first();
                    // $stock->quantity = $stock->quantity - $inv->quantity;
                    // $stock->save();
                    session()->flash('message', 'Brick Sell SuccessFully Completed.');
                    Session::flash('type', 'success');

                    return redirect()->route('customer-account-laser', $inv->id);
                
           

        } catch (\PDOException $e) {
            session()->flash('message', "$e  Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
  public function customerDelete($id){
    $c = Customer::where('invoice_id',$id)->get();
    if(count($c)){
         Customer::where('invoice_id',$id)->delete();
         Payment::where('customer_id',$id)->delete();
         Delivery::where('customer_id',$id)->delete();
         Laser::where('customer_id',$id)->delete();
         Invoice::where('customer_id',$id)->delete();
         session()->flash('message','This account successfully deleted');
        Session::flash('type','success');
         return redirect()->back();

    }else{
        session()->flash('message','This account already deleted');
        Session::flash('type','danger');
        return redirect()->back();
    }
  }
  public function customerDeleteInterface($id){
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Customer Delete';
        $data['id'] =$id;
    return view('dashboard.customer-delete',$data);

  }
    public function customerAccountShow($id){
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Customer Payment';
        $data['brick'] = Brick::all();
        $data['user_id']=$id;
        $sum_total_payment=0;
        $payment = Payment::where('customer_id','=',$id)->get();
        foreach ($payment as  $value) {
            $sum_total_payment+=$value->payment_amount;
         }
         $data['customer']=Customer::where('invoice_id',$id)->first();
         $customer_order_payment = Laser::where('customer_id','=',$id)->get();
         $data['current_account_balance']=$sum_total_payment;
         $sum_of_all_order =0;
         foreach ($customer_order_payment as $value) {
               $sum_of_all_order+=$value->subtotal;
             }
        $data['due'] = $sum_of_all_order-$sum_total_payment;
        $data['invoice']=Invoice::findorFail($id);
        return view('dashboard.customer-account-show',$data);
    }
    public function customerAccountSave(Request $request){
    	      $brick = Brick::where('name','=',$request->brick_name)->first();
            

                  
              $r = Stock::whereBrick_id($brick->id)->first();
              if ($request->quantity!=0) {
            
              if ($r->quantity< $request->quantity) {
                  session()->flash('message', 'Quantity Can\'t Large Then Stock Quantity.');
                    Session::flash('type', 'danger');
                    return redirect()->back();
              }else{
                if($request->brick_rate_alt == $request->brick_name){
                     Laser::create(["customer_id"=>$request->id,
                                "payment_date"=>date('Y-m-d'),
                                "transport"=>$request->transport,
                                "product_type"=>$brick->name,
                                "product_quantity"=>$request->quantity,
                                "product_rate"=>$request->brick_name,
                                "subtotal"=>$request->cost
                                ]);
                    $inv =Invoice::create([
                        'customer_id'=>$request->id,
                        'brick_id'=>$brick->id,
                        'quantity'=>$request->quantity,
                      ]);
                    $sell = Sell::whereSell_date(date('Y-m-d'))->first();
                    if($sell){
                        $sell->amount = $sell->amount + ($request->quantity * $inv->brick->rate);
                        $sell->currency_id = $inv->brick->currency->id;
                        $sell->total_sell = $sell->total_sell + ($request->quantity * $inv->brick->rate);
                        $sell->save();
                    }else{
                        $sell['sell_date'] = date('Y-m-d');
                        $sell['amount'] = $request->quantity * $inv->brick->rate;
                        $sell['currency_id'] = $inv->brick->currency->id;
                        $sell['total_sell'] = $request->quantity * $inv->brick->rate;
                        Sell::create($sell);
                    }

                    $stock = Stock::whereBrick_id($inv->brick_id)->first();
                    $stock->quantity = $stock->quantity - $inv->quantity;
                    $stock->save();
                session()->flash('message', 'Brick Sell SuccessFully Completed .');
                Session::flash('type', 'success');

              
                   return redirect()->back(); 
                }else{
                      Laser::create(["customer_id"=>$request->id,
                                "payment_date"=>date('Y-m-d'),
                                "transport"=>$request->transport,
                                "product_type"=>$brick->name,
                                "product_quantity"=>$request->quantity,
                                "product_rate"=>$request->brick_rate_alt,
                                "subtotal"=>$request->cost
                                ]);


                      $inv =Invoice::create([
                        'customer_id'=>$request->id,
                        'brick_id'=>$brick->id,
                        'quantity'=>$request->quantity,
                      ]);
                     $sell = Sell::whereSell_date(date('Y-m-d'))->first();
                    if($sell){
                        $sell->amount = $sell->amount + ($request->quantity * $inv->brick->rate);
                        $sell->currency_id = $inv->brick->currency->id;
                        $sell->total_sell = $sell->total_sell + ($request->quantity * $inv->brick->rate);
                        $sell->save();
                    }else{
                        $sell['sell_date'] = date('Y-m-d');
                        $sell['amount'] = $request->quantity * $inv->brick->rate;
                        $sell['currency_id'] = $inv->brick->currency->id;
                        $sell['total_sell'] = $request->quantity * $inv->brick->rate;
                        Sell::create($sell);
                    }

                    $stock = Stock::whereBrick_id($inv->brick_id)->first();
                    $stock->quantity = $stock->quantity - $inv->quantity;
                    $stock->save();
                session()->flash('message', 'Brick Sell SuccessFully Completed .');
                Session::flash('type', 'success');
                 return redirect()->back(); 
                }


               

              }
          }else{
              session()->flash('message', "Please Added First Brick Stock.");
              Session::flash('type', 'danger');
              return redirect()->back();
          }
               
    }
    public function customerPaymentReceived(Request $request)
   {
    if ($request->payment_amount > 0) {
        if ($request->payment_type == "Cheque" && ($request->cheque_or_cash!=null)) {
             Payment::create(["customer_id"=>$request->id,
                              "payment_date"=>date('Y-m-d'),
                               "cheque_or_cash"=>$request->payment_type,
                               "cheque_no"=>$request->cheque_or_cash,
                               "payment_amount"=>$request->payment_amount,
                              ]);
             session()->flash('message','Customer payment successfully added his/her account...');
             Session::flash('type','success');
             return redirect()->route('customer-account-laser', $request->id);
        }elseif ($request->payment_type == "Cash") {
             Payment::create(["customer_id"=>$request->id,
                              "payment_date"=>date('Y-m-d'),
                               "cheque_or_cash"=>$request->payment_type,
                               "cheque_no"=>'',
                               "payment_amount"=>$request->payment_amount,
                            ]);
             session()->flash('message','Customer payment successfully added his/her account...');
             Session::flash('type','success');
              return redirect()->route('customer-account-laser', $request->id);
        }else
        {
          session()->flash('message', 'Please fill the cheque number.....');
          Session::flash('type', 'danger');
         return redirect()->back();
        }
    }else{
       session()->flash('message', 'Please payment amount must be greater than zero');
       Session::flash('type', 'danger');
       return redirect()->back();
    }

   }
    public function customerAccount(){
        $c = DB::select(DB::raw('SELECT customers. * , SUM( customer_payment_received.payment_amount ) as payment 
                                FROM customers, customer_payment_received
                                WHERE customers.invoice_id = customer_payment_received.customer_id
                                GROUP BY customers.invoice_id'));
        
        
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Customer Account';
        $data['customer'] =$c;
        return view('dashboard.customer-account',$data);
    }
    public function customerAccountLaser($id){
        $data['site_title']=$this->site_title;
        $data['page_title'] ='Customer Account Laser';
        $data['id'] =$id;
        $customer =Customer::where('invoice_id',$id)->first();
        $data['customer']=$customer;
        $data['customer_order']=Laser::where('customer_id','=',$customer->invoice_id)->get();
        $data['customer_payment']=Payment::where('customer_id','=',$customer->invoice_id)->get();
        return view('dashboard.customer-account-laser',$data);
    }

    public function setRawBrick(){
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Set Raw Brick';
        $data['sordar'] =Stuff::where('position','Sordar')->get();
        $t =RawBrick::where("setup_date",date('Y-m-d'))->get();
        $s=0;
        $last_mill = 0;
        $tr =0;
        foreach ($t as $v) {
            $s+=($v->even_no *$v->line);
        }
        $l = RawBrick::where('setup_date',date('Y-m-d'))->orderBy('mill_no','ASC')->get()->last();
        if(count($l)){
        	$lmt = RawBrick::where('setup_date',date('Y-m-d'))->where('mill_no',$l->mill_no)->get();
		    foreach ($lmt as  $v) {
		    	$last_mill += $v->even_no * $v->line;
		    }
		    $data['mill_no'] = $l->mill_no;  
        }else{
        	  $data['mill_no'] = null; 
        }
        
      
        $data['last_mill_pro'] = $last_mill;
        $total_production = RawBrick::all();
        foreach ($total_production as  $v) {
        	$tr+=$v->even_no * $v->line;
        }
       
        $data['total_mill_pro'] =$tr;
        $data['today_production'] =$s;
        $data['raw_bricks'] =  RawBrick::where('setup_date',date('Y-m-d'))->orderBy('mill_no','asc')->get();
        return view('dashboard.set-raw-brick',$data);
    }
    public function editRawBrick(Request $request){
        if ($request->even_no > 0) {
            RawBrick::where('setup_date',date('Y-m-d'))
            ->where('mill_no',$request->mill_no)
            ->where('round_no',$request->round_no)
            ->where('pot_no',$request->pot_no)
            ->update(['even_no'=>$request->even_no,'line'=>$request->line]);
            session()->flash('message','Update raw brick successfully');
            Session::flash('type','success');
            return redirect()->back();
        }else{
            session()->flash('message','Please Even must be greater than 0 ');
            Session::flash('type','danger');
            return redirect()->back();
        }
    }
    public function updateRawBrick(Request $request){
         $rawBrick = RawBrick::where('setup_date','=',$request->date)
         ->where('mill_no','=',$request->mill_no)
         ->where('round_no','=',$request->round_no)
         ->where('pot_no','=',$request->pot_no)
         ->count();
        
        
    	  if ($request->date==date('Y-m-d') && ($request->mill_no > 0)) {
            if ($rawBrick==0) {
                RawBrick::create([
                'setup_date'=>$request->date,
                'mill_no'=>$request->mill_no,
                'round_no'=>$request->round_no,
                'pot_no'=>$request->pot_no,
                'even_no'=>$request->even_number,
                'year'=>$request->year,
                'sordar_name'=>$request->sordar_name,
                'line'=>$request->line,
                ]);
            session()->flash('message','Successfully added to <b>Mill No</b> '.$request->mill_no);
            Session::flash('type','success');
            return redirect()->back();
            }else{
            session()->flash('message','Pot number '.$request->pot_no.',Mill no '.$request->mill_no.',Round no '.$request->round_no.' already added.................');
            Session::flash('type','danger');
            return redirect()->back();
            }
            
          }else{
            session()->flash('message','Please enter current date..............');
            Session::flash('type','danger');
            return redirect()->back();
          }

    }

    public function rawBrickLaser($date,$sordar,$year){

        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Raw Brick Laser";
        $data['raw'] = RawBrick::where('setup_date',$date)
        ->where('sordar_name',$sordar)
        ->where('year',$year)
        ->orderBy('pot_no','ASC')->get();
        $data['total_even'] = RawBrick::where('setup_date',$date)->where('sordar_name',$sordar)
        ->where('year',$year)->sum('even_no');
        return view('dashboard.raw-brick-laser',$data);
    }
    
    public function customerInvoice($id)
    {
        $data['invoice'] = Invoice::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell Invoice";
        $data['general'] = GeneralSetting::first();
        return view('dashboard.customer-invoice',$data);
    }
    public function incomeReport()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Income Report";
        $data['expense'] = Expense::all();
        $data['sell'] = Sell::orderBy('id','DESC')->paginate(1000);
        return view('dashboard.income-report',$data);

    }
    public function getReportInvoice($date)
    {
        $data['invoice'] = Invoice::where('pay_date','=',$date)->orderBy('id','DESC')->paginate(10000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Invoice For $date";
        return view('dashboard.report-invoice',$data);
    }
    public function showCustomer()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell All Invoice";
        // $data['customer'] = DB::select(DB::raw('SELECT C.id,
        //                                    C.invoice_id,
        //                                    C.name, 
        //                                    C.email,
        //                                    C.address,
        //                                    C.quantity,
        //                                    B.name AS brick_name,
        //                                    B.rate AS brick_rate,
        //                                    CU.name AS currency_name
        //                                    FROM customers C
        //                                    INNER JOIN bricks B ON C.brick_id = B.id
        //                                    INNER JOIN currencies CU ON B.currency_id = CU.id;'));
        $data['customer'] =  Customer::all();

        return view('dashboard.customer-show',$data);
    }

    public function editCustomer($id)
    {
        $data['customer'] = Customer::findorFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Invoice";
        $data['brick'] = Brick::all();
        return view('dashboard.customer-edit',$data);
    }
    public function updateCustomer(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'brick_id' => 'required',
            'quantity' => 'required',
            'phone' => 'digits:11'
        ]);
        try {

            $customers = Customer::findOrFail($id);

            $invoice = Invoice::findOrFail($customers->invoice_id);

            $oldQuantity = $invoice->quantity;
            $oldBrickId = $invoice->brick_id;
            $oldBrickRate = $invoice->brick->rate;

            $stock = Stock::whereBrick_id($invoice->brick_id)->first();

            if($request->brick_id == $invoice->brick_id){
                try {
                    $customer = Input::except('_method','_token');
                    $customers->fill($customer)->save();
                    $stock->quantity = $stock->quantity - ($request->quantity - $invoice->quantity );
                    $invoice->quantity = $request->input('quantity');
                    $invoice->save();
                    $stock->save();

                    $sell = Sell::whereSell_date(date('Y-m-d'))->first();
                    if($sell){
                        $sell->amount = $sell->amount - ($oldQuantity * $invoice->brick->rate);
                        $sell->total_sell = $sell->total_sell - ($oldQuantity * $invoice->brick->rate);
                        $sell->save();

                        $sell->amount = $sell->amount + ($request->quantity * $invoice->brick->rate);
                        $sell->currency_id = $invoice->brick->currency->id;
                        $sell->total_sell = $sell->total_sell + ($request->quantity * $invoice->brick->rate);
                        $sell->save();
                    }else{
                        $sell['sell_date'] = date('Y-m-d');
                        $sell['amount'] = ($request->quantity * $invoice->brick->rate);
                        $sell['currency_id'] = $invoice->brick->currency->id;
                        $sell['total_sell'] = ($request->quantity * $invoice->brick->rate);
                        Sell::create($sell);
                    }
                    session()->flash('message', 'Customer Invoice Update Successfully.');
                    Session::flash('type', 'success');
                    return redirect()->route('customer-invoice', $invoice->id);
                } catch (\PDOException $e) {
                    session()->flash('message', "Some Problem Occurs, Please Try Again!");
                    Session::flash('type', 'danger');
                    return redirect()->back();
                }

            }else{
                try{
                    $customer = Input::except('_method','_token');

                    $oldStock = Stock::whereBrick_id($oldBrickId)->first();
                    $oldStock->quantity = $oldStock->quantity + $oldQuantity;
                    $oldStock->save();

                    $customers->fill($customer)->save();
                    $inv['brick_id'] = $request->input('brick_id');
                    $inv['quantity'] = $request->input('quantity');
                    $invoice->fill($inv)->save();

                    $newInvoice = Invoice::findOrFail($customers->invoice_id);
                    $newRate = $newInvoice->brick->rate;

                    $sell = Sell::whereSell_date(date('Y-m-d'))->first();
                    if($sell){
                        $oldSell = $oldQuantity * $oldBrickRate;
                        $sell2['amount'] = $sell->amount - $oldSell;
                        $sell2['total_sell'] = $sell->total_sell - $oldSell;

                        $sell->fill($sell2)->save();

                        $sell->amount = $sell->amount + ($request->quantity * $newRate);
                        $sell->total_sell = $sell->total_sell + ($request->quantity * $newRate);
                        $sell->currency_id = $invoice->brick->currency->id;
                        $sell->save();
                    }else{
                        $sell['sell_date'] = date('Y-m-d');
                        $sell['amount'] = $request->quantity * $newRate;
                        $sell['currency_id'] = $invoice->brick->currency->id;
                        $sell['total_sell'] = $request->quantity * $newRate;
                        Sell::create($sell);
                    }

                    $newStock = Stock::whereBrick_id($invoice->brick_id)->first();
                    $newStock->quantity = $newStock->quantity - $invoice->quantity;
                    $newStock->save();

                    session()->flash('message', 'Customer Invoice Update Successfully.');
                    Session::flash('type', 'success');
                    return redirect()->route('customer-invoice', $invoice->id);
                } catch (\PDOException $e) {
                    session()->flash('message', "Some Problem Occurs, Please Try Again!");
                    Session::flash('type', 'danger');
                    return redirect()->back();
                }
            }
        } catch (\PDOException $e) {
            session()->flash('message', "$e ---Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createExpense()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Expense";
        $data['currency'] = Currency::all();
        return view('dashboard.expense-create',$data);
    }
    public function storeExpense(Request $request)
    {
        $this->validate($request,[
            'reason' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        ]);
        try {
            $expense = Input::except('_method','_token');
            $expense['created_by'] = Auth::guard('admin')->user()->username;
            $expense['created_id'] = Auth::guard('admin')->user()->id;
            $sell = Sell::whereSell_date(date('Y-m-d'))->first();
            if($sell->total_sell >= $request->amount){
                $sell->expense_bill = $sell->expense_bill + $request->amount;
                $sell->total_sell = $sell->total_sell - $request->amount;
                $sell->save();
                Expense::create($expense);
                session()->flash('message', 'Expense Created Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Expense Large Than Today Total Earning.');
                Session::flash('type', 'danger');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showExpense()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Expense";
        $data['expense'] = Expense::orderBy('id','DESC')->paginate(1000);
        return view('dashboard.expense-show',$data);
    }
    public function editExpense($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Expense";
        $data['expense'] = Expense::findOrFail($id);
        $data['currency'] = Currency::all();
        return view('dashboard.expense-edit',$data);
    }
    public function updateExpense(Request $request,$id)
    {
        $expenses = Expense::findOrFail($id);
        $this->validate($request,[
            'reason' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        ]);
        try {
            $expense = Input::except('_method','_token');
            $sell = Sell::whereSell_date(date('Y-m-d'))->first();
            if($sell->total_sell >= $request->amount){
                $sell->expense_bill = $sell->expense_bill + ($request->amount - $expenses->amount);
                $sell->total_sell = $sell->total_sell - ($request->amount - $expenses->amount);
                $sell->save();
                $expenses->fill($expense)->save();
                session()->flash('message', 'Expense Updated Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Expense Large Than Today Total Earning.');
                Session::flash('type', 'danger');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function searchExpense(Request $request)
    {
        $start_time = $request->start_date." "."00:00:00";
        $end_time = $request->end_date." "."23:59:59";
        $data['expense'] = Expense::whereBetween('created_at', [$start_time, $end_time])->orderBy('id','DESC')->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Search Expense";
        return view('dashboard.expense-show',$data);
    }
    public function customerInvoiceId($id)
    {
        $data['invoice'] = Invoice::where('customer_id','=',$id)->first();
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell Invoice";
        $data['general'] = GeneralSetting::first();
        return view('dashboard.customer-invoice',$data);
    }
    public function createLaborer()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Laborer";
        $data['currency'] = Currency::all();
        return view('dashboard.laborer-create',$data);
    }
    public function storeLaborer(Request $request)
    {
        $this->validate($request,[
           'name' =>'required',
            'phone' => 'required',
            'currency_id' => 'required',
            'salary' => 'required'
        ]);
        try {
            $laborer = Input::except('_method','_token');
            $lab = Laborer::create($laborer);
            $lab1 = Laborer::findOrFail($lab->id);
            $lab1->code = '200'.$lab->id;
            $lab1->save();
            $salary['laborer_id'] = $lab->id;
            $salary['salary_date'] = date('Y-m-d');
            Salary::create($salary);

            session()->flash('message', 'Laborer Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showLaborer()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Laborer";
        $data['laborer'] = Laborer::orderBy('id','DESC')->get();
        return view('dashboard.laborer-show',$data);
    }
    public function editLaborer($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Laborer";
        $data['laborer'] = Laborer::findOrFail($id);
        $data['currency'] = Currency::all();
        return view('dashboard.laborer-edit',$data);
    }
    public function updateLaborer(Request $request,$id)
    {
        $this->validate($request,[
            'name' =>'required',
            'phone' => 'required',
            'currency_id' => 'required',
            'salary' => 'required'
        ]);
        try {
            $laborers = Laborer::findOrFail($id);
            $laborer = Input::except('_method','_token');
            $laborers->fill($laborer)->save();
            session()->flash('message', 'Laborer Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteLaborer(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $laborer = Laborer::findOrFail($request->input('id'));
                $laborer->delete();
                $salary = Salary::whereLaborer_id($request->input('id'))->get();
                $salary->delete();
                session()->flash('message', 'Laborer Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function todayLaborerBill()
    {
        $laborer = Laborer::all();
        foreach($laborer as $l){
            $s = Salary::where([['salary_date', '=', date('Y-m-d')], ['laborer_id', '=', $l->id],])->first();
            if($s == null){
                $salary['laborer_id'] = $l->id;
                $salary['salary_date'] = date('Y-m-d');
                Salary::create($salary);
            }
        }
        $date = date('Y-m-d');
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Laborer Salary - $date";
        $data['salary'] = Salary::where([['salary_date', '=', date('Y-m-d')], ['status', '=', 0],])->get();
        return view('dashboard.laborer-salary',$data);
    }
    public function payLaborerBill($id)
    {
        $date = date('Y-m-d');
        $salary = Salary::findOrFail($id);
        $salary->status = 1;
        $sell = Sell::whereSell_date($date)->first();
        if($sell->total_sell >= $salary->laborer->salary){
            $sell->laborer_bill = $sell->laborer_bill + $salary->laborer->salary;
            $sell->total_sell = $sell->total_sell - $salary->laborer->salary;
            $sell->save();
            $salary->save();
            $data['site_title'] = $this->site_title;
            $data['page_title'] = "Laborer Salary - $date";
            $data['salary'] = Salary::where([['salary_date', '=', date('Y-m-d')], ['status', '=', 0],])->get();
            session()->flash('message', 'Laborer Bill Successfully Paid.');
            Session::flash('type', 'success');
            return view('dashboard.laborer-salary',$data);
        }else{
            session()->flash('message', 'Laborer Bill Large Than Today Sell Amount.');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function showLaborerBill()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Laborer All Salaries";
        $data['salary'] = Salary::orderBy('id','DESC')->paginate(10000000);
        return view('dashboard.laborer-salary-show',$data);
    }
    public function searchLaborerBill(Request $request)
    {
        $start_time = $request->start_date;
        $end_time = $request->end_date;
        $data['salary'] = Salary::whereBetween('salary_date', [$start_time, $end_time])->orderBy('id','DESC')->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Salary $start_time to $end_time";
        return view('dashboard.laborer-salary-show',$data);
    }
    public function createLoan()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Loan Create';
        $data['currency'] = Currency::all();
        $data['brick'] = Brick::all();
        return view('dashboard.loan-create',$data);
    }
    public function storeLoan(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'currency_id' => 'required',
            'amount' => 'required',
            'brick_id' => 'required',
            'brick_quantity' => 'required',
            'delivery_date' => 'required',
        ]);
        try {
            $lender = Input::except('_token','_method');
            $lender['created_date'] = date('Y-m-d');
            Lender::create($lender);
            session()->flash('message', 'Lender Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', "$e --Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showLoan()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Show All Lender";
        $data['lender'] = Lender::orderBy('id','DESC')->paginate(100000);
        return view('dashboard.lender-show',$data);
    }
    public function deliveryLoan($id)
    {
        $lender = Lender::findOrFail($id);
        $lender->status = 1;
        $lender->save();
        session()->flash('message', "Lender Brick Delivery Successfully.");
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function createDelivery(){
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Delivery";
        $data['brick'] =Brick::all();
        $data['stock'] =Store::groupBy('stock_list')->get();
        $data['today_delivery'] = Delivery::where('date',date('Y-m-d'))->count();
        $data['total_delivery'] =Delivery::count();
        return view('dashboard.create-delivery',$data);
    }
    public function storeDelivery(Request $r){
         $y= explode('-',$r->select_year);
        
         if($r->product_quantity  > 0 && $r->transport_cost > 0 ){
            $t = Delivery::create([
            'date'=> $r->select_date,
            'year'=>$y[0],
            'customer_id'=> $r->customer_id,
            'product_type'=> $r->product_type,
            'quantity'=> $r->product_quantity,
            'stock_id'=> $r->stock_id,
            'transport_type'=> $r->transport_type,
            'transport_bill'=> $r->transport_cost
            	]);
            
          session()->flash('message', " Delivery Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
       }else{
            session()->flash('message', "Please Quantity,Cost,Customer-ID must be greater than 0");
            Session::flash('type', 'danger');
            return redirect()->back();
       }
       
    }
    public function editDelivery(){

    }
    public function laserDelivery($id,$date){
        $del =[];
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Delivery Laser";
        $data['delivery'] = Delivery::where('date',$date)->where('customer_id',$id)->get();
        return view('dashboard.laser-delivery',$data);
     
        
    }
  //Onload Functions
    public function showUnload(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Unload Module";
         $data['total_unload'] = Unload::count();

         return view('dashboard.show-un-load',$data);
    }
    public function storeUnload(Request $r){

     $this->validate($r,[
            'select_date' => 'required',
            'year'=>'required',
            'current_chamber' => 'required',
            'round' => 'required',
            'radda' => 'required',
            'total_onload' => 'required',
            'rate_or_per_hour' => 'required', 
            'total_bill' =>'required'
        ]);
     if ($r->chamber <=50 ) {
     	 if($r->round > 0 && $r->current_chamber > 0 && $r->radda > 0){
           Unload::create([
            'date'=> $r->select_date,
            'year'=>$r->year,
            'current_chamber'=>$r->current_chamber,
            'round'=>$r->round,
            'chamber'=>$r->chamber,
            'radda'=>$r->radda,
            'total_unload'=>$r->total_onload,
            'rate_per_thousand'=>$r->rate_or_per_hour,
            'total_bill' =>$r->total_bill,
        	]);
            session()->flash('message', " Unload Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
       }else{
            session()->flash('message', "Please Round,Current Chamber,Radda must be greater than 0");
            Session::flash('type', 'danger');
        }
     }else{
     	session()->flash('message', "Chamber must be less than 50");
        Session::flash('type', 'danger');
        return redirect()->back();

     }

        
           
        


    }
   
    public function showUnLoadLaser($date,$year,$round){
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Unload Laser";
        $data['year'] = $year;
        $data['unload'] =Unload::where('date',$date)->where("year",$year)->where('round',$round)->get();
          $data['total_unload'] =Unload::where('date',$date)->where("year",$year)->where('round',$round)->sum('total_unload');
          $data['total_bill'] =Unload::where('date',$date)->where("year",$year)->where('round',$round)->sum('total_bill');
        return view('dashboard.show-un-load-laser',$data);
    }

    public function showOtherBill(){
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Other's Bill";
        $arr = [];
        $cp =CoalProducer::groupBy('produced_by')->get();
        foreach ($cp as  $v) {
            $arr[] =$v->produced_by;
        }

        $data['produced_by'] =implode(',', $arr);
        return view('dashboard.show-other-bill',$data);
    }
    public function storeOtherBill(Request $r){
       $this->validate($r,[
        'select_date'=>'required',
        'bill'=>'required',
        'select_month'=>'required',
        'cash_denomination'=>'required',
        'total_amount'=>'required',
        'payment_type'=>'required',
        'bill_type'=>'required'
        ]);
       if($r->total_amount > 0 ){
        if($r->payment_type == "Cheque" && (!empty($r->cheque_no))){
          Bill::create([
              'date' => $r->select_date,
              'amount' => $r->total_amount,
              'month' =>$r->select_month,
              'cash_denomination' => $r->cash_denomination,
              'bill_type' => $r->bill,
              'payment_type'=>$r->payment_type,
              'bill_user_input'=>$r->bill_type,
              'cheque_no'=>$r->cheque_no,
              'year'=>$r->year,
            ]);
            session()->flash('message', " Bill Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
        }else if($r->payment_type == "Cash"){
            Bill::create([
              'date' => $r->select_date,
              'amount' => $r->total_amount,
              'month' =>$r->select_month,
              'cash_denomination' => $r->cash_denomination,
              'bill_type' => $r->bill,
              'payment_type'=>$r->payment_type,
              'bill_user_input'=>$r->bill_type,
              'cheque_no'=>$r->cheque_no,
              'year'=>$r->year,
            ]);
            session()->flash('message', " Bill Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
        }
        else{
            session()->flash('message', "Please Enter Cheuqe No.....");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
         
       }else{
            session()->flash('message', "Please Amount,Cash Denomination must be greater than 0");
            Session::flash('type', 'danger');
            return redirect()->back();
       }
       

    }
    public function showOtherBillLedger($year,$month,$bill_type,$bills){
        //echo $month.' '.$bill_type;
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Other Bill Ledger";
         $data['bill_types'] = $bill_type;
          $arr = [];
        $cp =CoalProducer::groupBy('produced_by')->get();
        foreach ($cp as  $v) {
            $arr[] =$v->produced_by;
        }

        $data['produced_by'] =implode(',', $arr);
         $data['month'] = Bill::where('month',$month)->where('bill_type',$bill_type)->where('date','like','%'.$year.'%')->where('bill_user_input',$bills)->get();
         $data['total_amount'] = Bill::where('month',$month)->where('bill_type',$bill_type)->where('bill_user_input',$bills)->sum('amount');
         return view('dashboard.show-other-bill-ledger',$data);
    }
    public function showCoalBuy(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Buy Coal";
         $data['coal'] =Coal::all();
         $data['producer'] =CoalProducer::all();
         $data['producers'] =Coal::groupBy('produced_by')->get();
         return view('dashboard.show-coal-buy',$data);
    }
    public function storeCoalBuy(Request $r){
     $this->validate($r,[
       'date'=>'required',
       'year'=>'required',
       'import_country'=>'required',
       'rate_per_ton'=>'required',
       'produced_by'=>'required',
       'killo'=>'required',
       'quantity'=>'required',
       'amount'=>'required',
       
        ]);
     if($r->killo > 0  && $r->quantity > 0 && $r->amount  >0){
       Coal::create([
        'date'=>$r->date,
        'produced_by'=>$r->produced_by, 
        'rate_per_ton'=>$r->rate_per_ton,
        'import_country'=>$r->import_country,
        'year'=>$r->year,
        'killo'=>$r->killo,
        'quantity'=>$r->quantity,
        'amount'=>$r->amount,
       	]);
            session()->flash('message', " Coal Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
     }else{
            session()->flash('message', "Please Killo,Quantity,Cash Denomination must be greater than 0");
            Session::flash('type', 'danger');
            return redirect()->back();
     }
    }
    public function storeCoalProducer(Request $r){
      $this->validate($r,[
        'produced_by'=>'required|unique:coal_producer',
        'year' => 'required',
        'contact_number'=>'digits:11'
        ]);
      CoalProducer::create([
         'produced_by'=>$r->produced_by,
         'year'=>$r->year,
         'phone'=>$r->contact_number,
        ]);

            session()->flash('message', " Coal Producer Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();

    }
    public function showCoalBuyLedger($name,$year){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Coal Ledger";
         $data['coal'] =Coal::where('produced_by',$name)->where('year',$year)->get();
         $data['p'] = CoalProducer::where('produced_by',$name)->first();
        
         $data['total_amount'] = Coal::where('produced_by',$name)->where('year',$year)->sum('amount');
         return view('dashboard.show-coal-buy-ledger',$data);
    }
    public function showFuelBill(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Fuel Bill";
         return view('dashboard.show-fuel-bill',$data);
    }
    public function storeFuelBill(Request $r){
      
        $this->validate($r,[
            'select_date' =>'required',
            'fuel_type' => 'required',
            'litre' => 'required',
            'amount'=>'required'
        ]);
        if($r->litre > 0 && $r->amount > 0){
            Fuel::create(
            [
            'date'=>$r->select_date,
            'year'=>$r->year,
            'total_amount'=>$r->total_amount,
            'fuel_type'=>$r->fuel_type,
            'selection'=>$r->selection,
            'transport_type'=>$r->tranport,
            'litre'=>$r->litre,
            'amount'=>$r->amount,]
            );
            session()->flash('message', "Fuel Bill Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
        }else{
         
            session()->flash('message', "Please fill or Litre , Amount must be greater than 0");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showFuelBillLedger($date,$fuel_type,$section,$year){
         
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Fuel Bill Ledger";
         $data['fuel'] =Fuel::where('date',$date)->where('fuel_type',$fuel_type)->where('selection',$section)->get();
         $data['litre_sum'] = Fuel::where('date',$date)->where('fuel_type',$fuel_type)->where('selection',$section)->sum('litre');
         $data['fuel_type']=$fuel_type;
         $data['selection']=$section;
         $data['year'] = $year;
         $data['amount_sum'] = Fuel::where('date',$date)->where('fuel_type',$fuel_type)->where('selection',$section)->sum('amount');
        return view('dashboard.show-fuel-bill-ledger',$data);
    }
    /*payment*/
    public function paymentModule(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Payment Module";
         $data['stuff'] = Stuff::all();
         $data['stuffG'] = Stuff::groupBy('position')->get();
         return view('dashboard.payment-module',$data);
    }
    public function paymentModuleLaser(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "On Load";
         return view('dashboard.payment-module-laser',$data);
    }
    public function storePaymentModule(Request $r){
        $this->validate($r,[
        'date' => 'required',
        'position' => 'required',
        'stuff_name' => 'required',
        'note' => 'required',
        'amount' => 'required',
            ]);
              if($r->amount > 0){
                StuffPayment::create([
                     'date' => $r->date,
                    'position' => $r->position,
                    'stuff_name' => $r->stuff_name,
                    'note' => $r->note,
                    'amount' => $r->amount,
                    ]);
                    session()->flash('message', "Payment Save Successfully.");
                    Session::flash('type', 'success');
                    return redirect()->back();
               }else{
               
                    session()->flash('message', "Payment failed to save.");
                    Session::flash('type', 'danger');
                    return redirect()->back();
               }
                

    }

    /*Stuff*/
    public function stuffModule(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Stuff Module";
         $data['stuff'] =Stuff::all();
         return view('dashboard.stuff-module',$data);
    }
    public function stuffModuleLaser($stuff){
        $data['site_title'] = $this->site_title;
         $data['page_title'] = "Stuff Laser";
         $data['stuff'] = Stuff::where('stuff_id',$stuff)->first();
         $data['stuff_salary'] = StuffSalary::where('stuff_id',$stuff)->get();
         $data['total_amount'] = StuffSalary::where('stuff_id',$stuff)->sum('amount');
         return view('dashboard.stuff-module-laser',$data);
    }
    public function storeStuffModule(Request $r){
        $this->validate($r,[
            'name' =>  'required ',
            'address' => 'required ' ,
            'position' =>'required',
            'mobile' => 'required|max:11' ,
            'date' => 'required ',
            'salary' => 'required' ,
            ]);
          
       if(Input::hasFile('input-file-preview')){
           $file = Input::file('input-file-preview');
           $file->move('nid-upload',time().'.'.$file->getClientOriginalExtension());
          
           Stuff::create([
            'name' => $r->name,
            'address' => $r->address,
            'mobile' => $r->mobile,
            'position' =>$r->position,
            'join_date' => $r->date,
            'salary' => $r->salary,
            'avater_file_name' => time().'.'.$file->getClientOriginalExtension() ,
            'stuff_id'=>time(),
            ]);
           session()->flash('message', "Fuel Bill Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
       }else{
       
            session()->flash('message', "Adding stuff unsuccessful.");
            Session::flash('type', 'danger');
            return redirect()->back();
       }
    }

    /*Salary*/
    public function salaryModule(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Salary Module";
         $data['stuff'] =Stuff::all();
         $data['stuffG'] = Stuff::groupBy('position')->get();
         return view('dashboard.salary-module',$data);
    }
    public function salaryModuleLaser(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Salary Module Laser";
         return view('dashboard.salary-module-laser',$data);
    }
    public function storeSalaryModule(Request $r){
        $this->validate($r,[
             'date'=>'required',
            'position'=>'required',
            'stuff_id'=>'required',
            'payment_type'=>'required',
            'current_month'=>'required',
            'amount'=>'required',
            ]);
           if($r->amount >0 ){
                 StuffSalary::create([
                    'date' => $r->date,
                    'position' => $r->position,
                    'stuff_id' => $r->stuff_id,
                    'payment_type' => $r->payment_type,
                    'current_month' => $r->current_month,
                    'amount' => $r->amount,
                    ]);
                    session()->flash('message', "Salary Save Successfully.");
                    Session::flash('type', 'success');
                    return redirect()->back();
               }else{
               
                    session()->flash('message', "Salary not saved");
                    Session::flash('type', 'danger');
                    return redirect()->back();
               }
    }
     /*Forma module*/
    public function formaModule(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Forma Account";
         $data['supplier'] = Forma::all();
         return view('dashboard.forma-module',$data);
    }
    public function formaModuleLaser($date,$supplier){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Forma Module Laser";
         $data['forma'] =Forma::where('date',$date)->where('supplier',$supplier)->get();
         return view('dashboard.forma-module-laser',$data);
    }
    public function storeFormaModule(Request $r){
        $this->validate($r,[
        'date'=>'required',
		'supplier'=>'required',
		'address'=>'required',
		'mobile'=>'required',
		'rate'=>'required',
		'quantity'=>'required',
		'distance'=>'required',
		'width'=>'required',
		'height'=>'required',
		'note'=>'required',]);
		if($r->width > 0 && $r->height > 0 && $r->quantity > 0  ){
		Forma::create([
	    'date'=>$r->date,
		'supplier'=>$r->supplier,
		'address'=>$r->address,
		'mobile'=>$r->mobile,
		'rate'=>$r->rate,
		'quantity'=>$r->quantity,
		'distance'=>$r->distance,
		'width'=>$r->width,
		'height'=>$r->height,
		'note'=>$r->note,]);
		    session()->flash('message', "Forma Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
       }else{
       
            session()->flash('message', "Forma not saved");
            Session::flash('type', 'danger');
            return redirect()->back();
       }
		


    }

    /*Land Lease module*/
    public function landLeaseModule(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Land Lease";
         $data['lease'] = Lease::all();
         return view('dashboard.land-lease-module',$data);
    }
    public function landLeaseModuleLaser($name){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Land Lease Laser";
         $data['land_lease'] = Lease::where('landower_name',$name)->first();
        $data['land_leases'] = Lease::where('landower_name',$name)->get();
         $data['total_sum'] = Lease::where('landower_name',$name)->sum('amount');
         return view('dashboard.land-lease-module-laser',$data);
    }
    public function storeLandLeaseModule(Request $r){
        $this->validate($r,[
        'landower_name' => 'required',
		'mobile' => 'required|min:11',
		'start' => 'required',
		'end' => 'required',
		'land_quantity' => 'required',
		'unit' => 'required',
		'amount' => 'required',
		'reminder_date' => 'required',
		'time' => 'required',]);
		if($r->land_quantity > 0){
			Lease::create([
		'landower_name' =>$r->landower_name,
		'mobile' => $r->mobile,
		'start' => $r->start,
		'end' =>$r->end,
		'land_quantity' =>$r->land_quantity ,
		'unit' => $r->unit,
		'amount' => $r->amount,
		'note' =>$r->note,
		'reminder_date' => $r->reminder_date,
		'time' => $r->time,]);

		    session()->flash('message', "Land Lease Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
       }else{
       
            session()->flash('message', "Land Lease not saved");
            Session::flash('type', 'danger');
            return redirect()->back();
       }



    }


    public function accessoriesModule(){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Accessories Module";
         $data['stuff'] =Stuff::all();
         $data['position'] =Stuff::groupBy('position')->orderBy('position','DSC')->get();
         return view('dashboard.accessories-module',$data);
    }
    public function storeAccessoriesModule(Request $r){
        $this->validate($r,[
            'date' => 'required',
            'stuff_name' => 'required',
            'stuff_type'=>'required',
            'accessories_type' => 'required',
            'quantity' => 'required',
            'waste' => 'required',
            ]);
            if($r->quantity >0 ){
                Accessories::create([
                     'date' => $r->date,
                     'stuff_type'=>$r->stuff_type,
                    'stuff_name' => $r->stuff_name,
                    'accessories_type' => $r->accessories_type,
                    'quantity' => $r->quantity,
                    'waste' => $r->waste,
                    ]);
             session()->flash('message', "Accessories Save Successfully.");
            Session::flash('type', 'success');
            return redirect()->back();
       }else{
       
            session()->flash('message', "Accessories not saved");
            Session::flash('type', 'danger');
            return redirect()->back();
       }
    }
    public function accessoriesModuleLaser($stuff_type,$stuff_name,$date){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Accessories Module Laser";
         $data['accessories'] =Accessories::where('date',$date)->where('stuff_type',$stuff_type)->where('stuff_name',$stuff_name)->get();
         return view('dashboard.accessories-module-laser',$data);
    }

    public function coalAccount(){

    }
    public function customerGatepass($id,$date){
        $db = DB::select(DB::raw("select delivery.*,bricks.* from delivery inner join bricks on delivery.product_type = bricks.name where customer_id=$id AND date='$date'")); 
        if(count($db)){
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Customer Gatepass";
         $payment_amount =Payment::where('customer_id','=',$id)->sum('payment_amount');
         $subtotal = Laser::where('customer_id','=',$id)->sum('subtotal');
         $data['customer']=Customer::where('invoice_id',$id)->first();
         $data['customer_orders']=$db;
         $data['payment_amount']=$payment_amount;
         $data['subtotal']=$subtotal;
         $data['id']=$id;
         $data['balance_due'] =$subtotal-$payment_amount;
         return view('dashboard.customer-gatepass',$data);
        }else{
            session()->flash('message','Customer has no delivery data...');
             Session::flash('type','danger');
            return redirect()->route('create-delivery');
        }      
        
    }


    public function searchCustomerId(Request $r){
        $outputString=''; 
         if ($r->ajax()) {
             $customerInfoForSearch = Customer::where('invoice_id',$r->search)->first();
               if($customerInfoForSearch!=null){
                 $outputString ='<div class="panel panel-primary" style="border-color:#FF6735; ">
                                   <div class="panel-heading" style="background:#FF6735;border-color:#FF6735;">
                                    <h3 class="panel-title" style="text-align: center; font-size:20px; font-weight:bold;font-style: italic;">Search Result <i class="fa fa-search"></i></h3>
                                     <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                                     </div>
                                     <div class="panel-body">
                                       <h1 style=font-size:20px>Name:'.$customerInfoForSearch->name.'<h1>
                                       <h1 style=font-size:20px>Phone:'.$customerInfoForSearch->phone.'</h1></div>
                                 </div>';
               }else{
                $outputString='<p style=color:red;>Customer ID not found in our record</p>';
               }
             
         }else{
            $outputString ="Not Ajax Request";
         }
         return Response($outputString);
    }
    public function searchDelivery(Request $r){
        $ajaxOutputStringForDelivery = "";
        $test = "";
        $c = Customer::where("name","like","%".$r->search_delivery."%")->get();

            foreach ($c as $v) {
           $test.='<li class="list-group-item"><div class="row"><div class="col-sm-2 col-xs-2">
           <div class="btn btn-info" style="margin-right:4px;" >ID:'.$v->invoice_id.'</div></div>'
           .'<div class="col-sm-4 col-xs-4"><div class="btn btn-success" style="margin-right:4px;">Name:'.$v->name.'</div></div>
           <div class="col-sm-3 col-xs-3"><div class="btn btn-danger">Address:'.($v->address?$v->address:"No avaliable").'</div></div>
           <div class="col-sm-3 col-xs-3"><center><a class="btn btn-success" href="http://ranabricks.zoomerlens.com/customer-gatepass/'.$v->invoice_id.'">Click</a></center></div>
           </div></li>';
        }
       

         if($r->ajax()){
            if($r->search_delivery &&count($c)){


          $ajaxOutputStringForDelivery='<div class="panel-group">
                                        <div class="panel panel-default">
                                        <div class="panel-heading" style="background:#52be7f;">
                                        <h4 class="panel-title" >
                                          <center><a data-toggle="collapse" href="#collapse1" style="font-weight:bold;color:#fff;">Press: Result Found</a></center>
                                        </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                        <ul class="list-group">
                                       
                                          <li class="list-group-item">'.$test.'</li>
                                          
                                        </ul>
                                        <div class="panel-footer" style="background:#ea6052:color:#fff;"><center>Delivery Gatepass</center></div>
                                        </div>
                                        </div>
                                        </div>';
                                    }else{
                                        $ajaxOutputStringForDelivery ='<div class="panel-group">
                                        <div class="panel panel-default">
                                        <div class="panel-heading" style="background:#ff302a;">
                                        <h4 class="panel-title" >
                                          <center><a data-toggle="collapse" href="#collapse1" style="font-weight:bold;color:#000;">No Result Found</a></center>
                                        </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                        <ul class="list-group">
                                       
                                          <li class="list-group-item">No Result Found</li>
                                          
                                        </ul>
                                        <div class="panel-footer"><center>Delivery Gatepass</center></div>
                                        </div>
                                        </div>
                                        </div>';
                                    }
         }else{
            $ajaxOutputStringForDelivery="Not Ajax Request";
         }
       
        
         return Response($ajaxOutputStringForDelivery);
    }
    public function allMyReport($date){
        
         $data['site_title'] = $this->site_title;
         $data['page_title'] = "Customer Report";
        if(count(explode('-', $date)) == 2){
             $data['report_data'] =   DB::select(DB::raw("SELECT customers.invoice_id,customers.name,customers.address,customers.phone  , customer_order.transport,
            customer_order.product_type,customer_order.product_quantity,customer_order.product_rate,
            customer_order.subtotal as total
            FROM customer_order
            INNER JOIN customers On customer_order.customer_id = customers.invoice_id 
            Where customer_order.payment_date like '%".$date."%'"));
        }elseif (count(explode('-', $date))==3) {
             $data['report_data'] =   DB::select(DB::raw("SELECT customers.invoice_id,customers.name,customers.address,customers.phone  , customer_order.transport,
            customer_order.product_type,customer_order.product_quantity,customer_order.product_rate,
            customer_order.subtotal as total
            FROM customer_order
            INNER JOIN customers On customer_order.customer_id = customers.invoice_id 
            Where customer_order.payment_date ='".$date."'"));
        }elseif (count(explode('-', $date))==1) {
              $data['report_data'] =   DB::select(DB::raw("SELECT customers.invoice_id,customers.name,customers.address,customers.phone  , customer_order.transport,
            customer_order.product_type,customer_order.product_quantity,customer_order.product_rate,
            customer_order.subtotal as total
            FROM customer_order
            INNER JOIN customers On customer_order.customer_id = customers.invoice_id 
            Where customer_order.payment_date like '%".$date."%'"));
        }
  
        
         
        
            $cash = [];
            $accountCheck =[];
            $account_status =[];
          
           // echo "<pre>";
            // var_dump($data['report_data']);
         if ($data['report_data']!=null) {
             foreach ($data['report_data'] as $k => $v) {
             $dt  = DB::select(DB::raw('SELECT SUM( customer_payment_received.payment_amount ) as payment_amount 
                                        FROM customer_payment_received
                                        WHERE customer_id ='.$v->invoice_id));
             $cash[] = $dt;

             
         }

         }
         
         $data['report_payment'] = $cash;

      
        
        if($data['report_data']!=null){
            $data['nullOrNotNull'] = 1;
          return view('dashboard.all-my-report',$data);
        }else{
            $data['nullOrNotNull'] = 0;
          return view('dashboard.all-my-report',$data);
        }
    }
    public function deleteBrick($id){

        if(count(Brick::where('id',$id)->get())){
          Brick::where('id',$id)->delete();
          Stock::where('brick_id',$id)->delete();
          Store::where('brick_id',$id)->delete();
          
          session()->flash('message','Brick Deleted Successfully');
          Session::flash('type','success');
          return redirect()->back();
        }else{
             session()->flash('message','Brick Not Found || Not Deleted');
             Session::flash('type','danger');
          return redirect()->back();

        }
    }
        public function deleteStock(){

        }

}
