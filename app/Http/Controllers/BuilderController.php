<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BuilderController extends Controller
{

    // Query Builder Data Retraiving

    function Allrows(){
       $result= DB::table('details')->get();
       return $result;
    }
    function rows(){
        $result= DB::table('details')->where('name','Soikot')->first();
        return $result;
     }
     function find(){
        $result= DB::table('details')->find(3);
        return $result->name;
     }
    function pluck(){
        $result= DB::table('details')->pluck('name','roll');
        return $result;
     }

    //  Query Builder aggregets

     function RowCount(){
        $result= DB::table('details')->count();
        return $result;
     }
     function RowMax(){
        $result= DB::table('details')->max('roll');
        return $result;
     }
     function RowMin(){
        $result= DB::table('details')->min('roll');
        return $result;
     }
     function RowAvg(){
        $result= DB::table('details')->avg('roll');
        return $result;
     }
     function RowSum(){
        $result= DB::table('details')->sum('roll');
        return $result;
     }


    //  Query builder Data Insert Update Delete

     function Insert(Request $request){
        $name= $request->input('name');
        $roll= $request->input('roll');
        $city= $request->input('city');
        $phn= $request->input('phn');
        $class= $request->input('class');

       $result=DB::table('details')->insert(['name'=>$name,'roll'=>$roll,'city'=>$city,'phn'=>$phn,'class'=>$class]);
       if($result==true){
        return "Data Insert Successfully";
      }else{
          return "Insert Fail ! Try Again";
      }
     }
     function Update(Request $request){
        $name= $request->input('name');
        $id= $request->input('id');
        $result = DB::table('details')->where('id',$id)->update(['name'=>$name]);
        if($result==true){
            return "Data Update Successfully";
        }else{
            return "Update Fail ! Try Again";
        }
     }
    function Delete(Request $request){
        $id= $request->input("id");
        $result = DB::table('details')->where(['id'=>$id])->delete();
        if($result==true){
            return "Data Delete Successfully";
        }else{
            return "Delete Fail ! Try Again";
        }
     }



}
