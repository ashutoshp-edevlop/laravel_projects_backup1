<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // public function create(){
    //     $url = url('/customer');
    //     $data = compact('url');
    //     return view('customer');
    // }
    public function index(){
        return view('index');
    }
    public function create()
    {
        $url = url('/customer');
        // $title ="Customer Registration";
        $data = compact('url');
        return view('customer')->with($data);
    }
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        
        $customer = new Customer;
        
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = $request['password'];
        $customer->save();

        return redirect('/customer/view');
    }
    public function view(Request $request)
    {
        $search = $request['search'] ??"";
        if($search != ""){
            //where
            $customers = Customer::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->get();
        }else{
            $customers = Customer::paginate(15);
        }
        $data = compact('customers','search');
        return view('customer-view')->with($data);
        // echo "<pre>";
        // print_r($customers);
        // die;
    }
    public function trash(Request $request){
        $search = $request['search'] ??"";
        if($search != ""){
            $customers = Customer::onlyTrashed()->where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->get();
        }else{
            $customers = Customer::onlyTrashed()->paginate(2);
        }

        // $customers = Customer::onlyTrashed()->get();
        $data = compact('customers','search');
        return view('customer-trash')->with($data);
    }
    public function delete($id)
    {
        $customer =Customer::find($id);
        if (!is_null($customer)){
            $customer->delete();
        }
        return redirect('customer/view');
    }
    public function forceDelete($id)
    {
        $customer =Customer::withTrashed()->find($id);
        if (!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect()->back();
    }
    public function restore($id)
    {
        $customer =Customer::withTrashed()->find($id);
        if (!is_null($customer)){
            $customer->restore();
        }
        return redirect('customer/view');
    }
    public function edit($id)
    {
        
        $data = Customer::find($id);
        return view('update_customer')->with('customer',$data);
        // if(is_null($customer)){
        //     //not found
        //     return redirect('customer/view');
        // }
        // else{
        //     $url = url('/update_customer'). "/" . $id;
        //     // $data = Crypt::decrypt($id);
        //     // $title = "Update Customer";
        //     $data = compact('customer','url');
            
        // }
    }
    public function update($id, Request $request)
    {
        // p($request->all());
        // die;

        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password=$customer->password;
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        // $customers = Customer::all();
        // dd($customers);
        // return view('customer/view',compact('customers'));
        $customer->save();
        return redirect('customer/view'); 
    }
}
