<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DetailsModel;

class DetailsController extends Controller{




    ///////////////////// Row Crud/////////////////////

    function DetailsSelect( Request $request){
        $sql="SELECT * FROM `details` ";
        $request=DB::select($sql);
        return $request;
    }

    function DetailsDelete(Request $request){
       $id= $request->input('id');
       $sql="DELETE FROM `details` WHERE id = ?";
      $result= DB::delete($sql,[$id]);
       if($result==true){
        return "Data Delete Successfully";
      }else{
          return "Delete Fail ! Try Again";
      }
    }

    function DetailsUpdate(Request $request){
        $roll= $request->input("roll");
        $city= $request->input("city");
        $phn= $request->input("phn");
        $sql="UPDATE `details` SET city=?,phn=? WHERE roll=?";
        $result= DB::update($sql,[$city,$phn,$roll]);
        if($result==true){
            return "Data Update Successfully";
          }else{
              return "Data Update Fail ! Try Again";
          }
    }

    function DetailsCreate(Request $request){
       $name= $request->input('name');
       $roll= $request->input('roll');
       $city= $request->input('city');
       $phn= $request->input('phn');
       $class= $request->input('class');

      $sql="INSERT INTO `details`(`name`, `roll`, `city`, `phn`, `class`) VALUES (?,?,?,?,?)";
      $result= DB::insert($sql,[$name,$roll,$city,$phn,$class]);

      if($result==true){
        return "Data Insert Successfully";
      }else{
          return "Insert Fail ! Try Again";
      }
    }

        ///////////////// Retriving Models///////////////////////

        function selectAll(){
            $result= DetailsModel::all();
            return $result;
        }

        function selectById(Request $request){
            $id = $request->input('id');
            $result=  DetailsModel::where('id',$id)->get();
            return $result;
        }

        function Count(){
            $result=DetailsModel::count();
            return $result;
        }
        function Max(){
            $result=DetailsModel::max('roll');
            return $result;
        }
        function Min(){
            $result=DetailsModel::min('roll');
            return $result;
        }
        function Avg(){
            $result=DetailsModel::avg('roll');
            return $result;
        }
        function Sum(){
            $result=DetailsModel::sum('roll');
            return $result;
        }
        function Insert(Request $request){
           $name= $request->input('name');
           $roll= $request->input('roll');
           $city= $request->input('city');
           $phn= $request->input('phn');
           $class= $request->input('class');
            $result=DetailsModel::Insert(['name'=>$name,'roll'=>$roll,'city'=>$city,'phn'=>$phn,'class'=>$class]);
            if($result==true){
                return 'Insert Successfully';
            }else{
                return 'Insert Fail';
            }
        }
        function Update(Request $request){
            $id= $request->input('id');
            $name= $request->input('name');
            $roll= $request->input('roll');
             $result=DetailsModel::where('id',$id)->Update(['name'=>$name,'roll'=>$roll]);
             if($result==true){
                 return 'Update Successfully';
             }else{
                 return 'Update Fail';
             }
         }

         function Delete(Request $request){
            $id = $request->input('id');
            $result = DetailsModel::where('id',$id)->delete();
            if($result==true){
                return 'Delete Successfully';
            }else{
                return 'Delete Fail';
            }
         }



}
