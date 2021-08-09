<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerEntity;
use App\Models\StoreFile;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function createCustomer(Request $request){

        if($request->hasFile("avatar")){
            $fileName = StoreFile::StoreFile($request->file("avatar"));
        }
        else{
            $fileName = "";
        }

        $customer = new CustomerEntity();
        $customer->setAvatar($fileName);
        $customer->setFullName($request->input("fullName"));
        $customer->setEmail($request->input("email"));
        $customer->setGender($request->input("gender"));
        $customer->setPhoneNumber($request->input("phoneNumber"));
        Customer::saveCustomer($customer);
        return redirect('/customers');
    }

    public function overview(){
        $data = Customer::overview();
        return view("overview", ['data'=>$data]);
    }

    public function search(Request $request){
        $name = $request->input('name');
        $phoneNumber = $request->input('phoneNumber');
        $data = Customer::search($name, $phoneNumber);
        return view("overview", ['data'=>$data]);
    }
}
