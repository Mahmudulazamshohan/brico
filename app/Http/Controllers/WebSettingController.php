<?php

namespace App\Http\Controllers;

use App\About;
use App\GeneralSetting;
use App\Home;
use App\Menu;
use App\Partner;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class WebSettingController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:admin');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;

    }



    public function getChangePass()
    {
        $data['page_title'] = "Change Password";
        $general_all = GeneralSetting::first();
        $data['site_title'] = $general_all->title;
        return view('auth.change-pass',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);

        try {
            $c_password = Auth::guard('admin')->user()->password;
            $c_id = Auth::guard('admin')->user()->id;

            $user = Admin::findOrFail($c_id);

            if(Hash::check($request->current_password, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Current Password Not Match.');
                Session::flash('type', 'danger');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function getGeneralSetting()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'General Setting';
        $data['general'] = GeneralSetting::first();
        return view('websetting.general-setting',$data);
    }
    public function putGeneralSetting(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'address' => 'required',
            'number' => 'required',
            'email' => 'required',
            'footer_text' => 'required',
            'image' => 'mimes:png|dimensions:width=220,max_height=50',
            'facebook' => 'required',
            'twitter' => 'required',
            'google_plus' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'mission' =>'required',
            'vision' => 'required'
        ]);
        try {
            $generals = GeneralSetting::find($id);
            $general = Input::except('_method', '_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = "logo".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->save($location);
                $general['logo'] = $filename;
            }

            $generals->fill($general)->save();
            session()->flash('message', 'General Setting Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getHomePageSetting()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Home Page Setting";
        $data['home'] = Home::first();
        return view('websetting.home-page-setting',$data);
    }
    public function putHomePageSetting(Request $request,$id)
    {
        $this->validate($request,[
            'top_title' => 'required',
            'top_description' => 'required',
            'bottom_title' => 'required',
            'bottom_description' => 'required',
        ]);
        try {
            $home = Home::find($id);
            $hom = Input::except('_method', '_token');
            $home->fill($hom)->save();
            session()->flash('message', 'Home Page Setting Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getAboutPageSetting()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "About Page Setting";
        $data['about'] = About::first();
        return view('websetting.about-page-setting',$data);
    }
    public function putAboutPageSetting(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg'
        ]);
        try {
            $abouts = About::find($id);
            $about = Input::except('_method', '_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = "about-pic".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->resize(360,400)->save($location);
                $about['image'] = $filename;
            }

            $abouts->fill($about)->save();
            session()->flash('message', 'About Setting Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getMenuCreate()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Menu Setting";
        return view('websetting.menu-create',$data);
    }
    public function postMenuCreate(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|unique:menus,name',
            'description' => 'required'
        ]);
        try {
            $menu = Input::except('_method','_token');
            Menu::create($menu);
            session()->flash('message', 'Menu Create Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showMenuCreate()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Show All Menu";
        $data['menu'] = Menu::all();
        return view('websetting.menu-show',$data);
    }
    public function editMenuCreate($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Menu";
        $data['menu'] = Menu::findorFail($id);
        return view('websetting.menu-edit',$data);
    }
    public function updateMenuCreate(Request $request,$id)
    {
        $menus = Menu::findOrFail($id);
        $this->validate($request,[
           'name' =>'required|unique:menus,name,'.$menus->id,
            'description' => 'required'
        ]);
        try {
            $menu = Input::except('_method','_token');
            $menus->fill($menu)->save();
            session()->flash('message', 'Menu Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteMenuCreate($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();
            session()->flash('message', 'Menu Deleted Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getPartnerCreate()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Partner";
        return view('websetting.partner-create',$data);
    }
    public function postPartnerCreate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:partners,name',
            'email' => 'required|unique:partners,name',
            'address' => 'required',
            'image' => 'required'
        ]);
        try {

            $partner = Input::except('_method', '_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->resize(130,80)->save($location);
                $partner['image'] = $filename;
            }
            Partner::create($partner);
            session()->flash('message', 'Partner Added Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showPartnerCreate()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Partner";
        $data['partner'] = Partner::orderBy('id','ASC')->paginate(100);
        return view('websetting.partner-show',$data);
    }
    public function editPartnerCreate($id)
    {
        $data['partner'] = Partner::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Partner";
        return view('websetting.partner-edit',$data);
    }
    public function updatePartnerCreate(Request $request,$id)
    {
        $partners = Partner::findOrFail($id);
        $this->validate($request,[
           'name' => 'required|unique:partners,name,'.$partners->id,
            'email' => 'required|unique:partners,email,'.$partners->id,
            'address' => 'required'
        ]);
        try {

            $partner = Input::except('_method', '_token');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename;
                Image::make($image)->resize(325,260)->save($location);
                $partner['image'] = $filename;
            }
            $partners->fill($partner)->save();

            session()->flash('message', 'Partner Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deletePartnerCreate(Request $request)
    {
        if ($request->input('id') === '') {
            session()->flash('message', 'Oops, bad request!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }else{
            $partner = Partner::findOrFail($request->input('id'));
            $partner->delete();
            Storage::delete($partner->image);
            session()->flash('message', 'Deleted Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }















}
