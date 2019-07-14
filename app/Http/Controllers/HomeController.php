<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job_post;
use App\Job_category;
use App\Company;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        if(Auth::guard('company')->check()){
            $this->middleware('auth:company')->except(['index']);
        }
        else if(Auth::guard('student')->check()){
            $this->middleware('auth:student')->except(['index']);
            }
        else if(Auth::guard('admin')->check()){
            $this->middleware('auth:admin')->except(['index']);
        }
        else if(Auth::guard('supervisor')->check()){
            $this->middleware('auth:supervisor')->except(['index']);
        }
    }
    
    public function home(Request $request)
    {
        $key='';$loc='';$spec='';$min='';
        if(isset($_GET['key'])&&isset($_GET['location'])&&isset($_GET['specialization'])&&isset($_GET['allowance'])){
            $key = $request->query('key')?$request['key']:'';
            $loc = $request->query('location')?$request['location']:'';
            $spec = $request->query('specialization')?$request['specialization']:'';
            $min = $request->query('allowance')?$request['allowance']:0;
            if($spec == ''){
                $results = Job_post::
                    where(function($q) use ($key) {
                        $q->whereHas('company', function ($query) use ($key){
                            $query->where('Cmp_Name', 'like', '%' . $key . '%');
                        })->orWhere('Title','like', '%' . $key . '%');
                    })
                    ->where('location','like', '%' . $loc . '%')
                    ->where('MinAllowance', '>=', $min )
                    ->paginate();
            }
            else{
                $results = Job_post::
                    where(function($q) use ($key) {
                        $q->whereHas('company', function ($query) use ($key){
                            $query->where('Cmp_Name', 'like', '%' . $key . '%');
                        })->orWhere('Title','like', '%' . $key . '%');
                    })
                    ->where('Sub_Id',$spec)
                    ->where('location','like', '%' . $loc . '%')
                    ->where('MinAllowance', '>=', $min )
                    ->paginate();
            }
        }
        else if(isset($_GET['key'])){
            $key = $request->query('key');
            $results = Job_post::
                    whereHas('company', function ($query) use ($key){
                        $query->Where('Cmp_Name', 'like', '%' . $key . '%');
                    })
                    ->orWhere('location','like', '%' . $key . '%')
                    ->orWhere('Title', 'like', '%' . $key . '%')
                    ->paginate();
        }
        else if(isset($_GET['category'])){
            $cat = $request->query('category');
            $results = Job_post::with('company')
                    ->whereHas('job_sub_category', function ($query) use ($cat){
                        $query->Where('Cat_Id', $cat );
                    })
                    ->paginate();
        }
        else if(isset($_GET['specialization'])){
            $spec = $request->query('specialization');
            $results = Job_post::with('company')
                    ->where('Sub_Id',$spec)
                    ->paginate();
        }
        else if(isset($_GET['location'])){
            $loc = $request->query('location');
            $results = Job_post::where('location', $loc)->paginate();
        }
        else if(isset($_GET['name'])){
            $name = $request->query('name');
            $results = Job_post::
                    whereHas('company', function ($query) use ($name){
                        $query->Where('Cmp_Name', $name );
                    })
                    ->paginate();
        }
        else{
            $results = Job_post::with('company')->paginate();
        }
        $categories = Job_category::all();
        $find = array(
            'key' => $key,
            'loc' => $loc,
            'spec' => $spec,
            'min' => $min,
        );
        $data = compact('results','categories','key','find');
        return view('home.home', $data);
    }
    
    public function index()
    {
        return view('home.index');
    }
    
    public function ipim()
    {
        return view('home.ipim');
    }
    public function feedback()
    {
        return view('home.feedback');
    }
    
    public function survey()
    {
        return view('home.survey');
    }
        
    public function search(Request $request)
    {
        $key = $request['key']?$request['key']:"";
        return redirect()->intended(route('searchjob',['key'=>$key]));
    }
    
    public function criteria(Request $request)
    {
        $key = $request['key']?$request['key']:"";
        $specialization = $request['Sub_Id']?$request['Sub_Id']:"";
        $location = $request['Loc_Name']?$request['Loc_Name']:"";
        $allowance = $request['Allowance']?$request['Allowance']:"";
        
        $query = ['key'=>$key, 'specialization' => $specialization, 'location' => $location, 'allowance'=> $allowance];
        return redirect()->intended(route('searchjob',$query));
    }
    
    public function specialization()
    {
        
        $categories = Job_category::all();
        $key = "";
        $data = compact('categories','key');
        return view('home.specialization', $data);
    }
    
    public function companylist()
    {
        $categories = Job_category::all();
        $key = "";
        $results = Company::all();
        $data = compact('results','categories','key');
        return view('home.companylist', $data);
    }
    
    public function location()
    {
        $categories = Job_category::all();
        $key = "";
        $data = compact('categories','key');
        return view('home.location',$data);
    }
}
