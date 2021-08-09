<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    public static $tableName = "customers";

    public static function findByName($name){
        $users = DB::table(Customer::$tableName)->where('full_name','like',"%".$name."%")->get();
        return $users;
    }

    public static function findByPhoneNumber($phoneNumber){
        $users = DB::table(Customer::$tableName)->where('phone_number','=', $phoneNumber)->get();
        return $users;
    }



    public static function saveCustomer(CustomerEntity $customer){
        $temp = new Customer();
        $temp->full_name = $customer->getFullName();
        $temp->avatar = $customer->getAvatar();
        $temp->gender = $customer->getGender();
        $temp->email = $customer->getEmail();
        $temp->phone_number = $customer->getPhoneNumber();
        $temp->save();
    }

    public static function overview(){
        $a = array();
        $all =  DB::table(Customer::$tableName)->get();
        for($i = 0; $i < count($all); $i++){
            $customerEntity = new CustomerEntity();
            $customerEntity->setAvatar(StoreFile::$publicPath.$all[$i]->avatar);
            $customerEntity->setPhoneNumber($all[$i]->phone_number);
            $customerEntity->setGender($all[$i]->gender);
            $customerEntity->setEmail($all[$i]->email);
            $customerEntity->setFullName($all[$i]->full_name);
            array_push($a, $customerEntity);
        }
        return $a;
    }

    public static function search($name, $phoneNumber){
        $a = array();
        $data = null;
        if(!empty($name) && !empty($phoneNumber)){
            $data = DB::table(Customer::$tableName)
                        ->where('full_name','=',$name)
                        ->where('phone_number','=',$phoneNumber)
                        ->get();
        }
        elseif (!empty($name) && empty($phoneNumber)){
            $data = DB::table(Customer::$tableName)
                ->where('full_name','like',"%".$name."%")
                ->get();
        }
        elseif (empty($name) && !empty($phoneNumber)){
            $data = DB::table(Customer::$tableName)
                ->where('phone_number','=',$phoneNumber)
                ->get();
        }
        else{
            $data = DB::table(Customer::$tableName)->get();
        }
        for($i = 0; $i < count($data); $i++){
            $customerEntity = new CustomerEntity();
            $customerEntity->setAvatar(StoreFile::$publicPath.$data[$i]->avatar);
            $customerEntity->setPhoneNumber($data[$i]->phone_number);
            $customerEntity->setGender($data[$i]->gender);
            $customerEntity->setEmail($data[$i]->email);
            $customerEntity->setFullName($data[$i]->full_name);
            array_push($a, $customerEntity);
        }
        return $a;
    }

}
