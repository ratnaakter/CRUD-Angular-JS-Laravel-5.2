<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AngularaRequest;

use App\Http\Controllers\Controller;
use App\Angular;
use DB;
use Illuminate\Support\Facades\View;


class AngularController extends Controller
{

    public function save()
    {
        //$errors = array();
        $data = array();
        // Getting posted data and decodeing json
        $_POST = json_decode(file_get_contents('php://input'), true);//json decode made json to array
        //dd($_POST);
        $model = new Angular();
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        $model->mobile = $_POST['mobile'];
        $model->save();
       // checking for blank values.
/*        if (empty($_POST['Name']))
            $errors['Name'] = 'Name is required.';

        if (empty($_POST['Email']))
            $errors['Email'] = 'Username is required.';

        if (empty($_POST['Mobile']))
            $errors['Mobile'] = 'Mobile is required.';

        if (!empty($errors)) {
            $data['errors']  = $errors;
        } else {
            $data['message'] = 'Form data is going well';
        }
        // response back.
        echo json_encode($data);*///json encode make array to json

        echo json_encode("Success");
    }
  


    //-----Angular js show edit update---------------------------

    public function show_angular($pagID)//Response to get data
    {
        $pagination=10;
        $pagID=($pagID*$pagination)-$pagination;
        $show = DB::table('user')->take($pagination)->skip($pagID)->get();
        return response()->json(['users' => $show]);
    }
    public function totalItemsLength()
    {
        $show = DB::table('user')->count();
        return response()->json(['users' => $show]);
    }

    public  function  show_angular_page()//show data which is get from response method show_angular
    {
        return View('show');
    }
    public function edit_angular($id)
    {
        $user = Angular::findOrFail($id);
        return view('show', compact('user'));
    }
    public function update()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        $id=$_POST['id'];
        $model=Angular::find($id);
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        $model->mobile = $_POST['mobile'];
        $model->update();
        //dd($_POST);
    }

    public function delete($id)
    {
        //Angular::destroy($id);
        $employee = Angular::find($id);
        //dd($employee);
       $employee->delete();

        return "Employee record successfully deleted #";

    }
    public function shopping_cart_create()
    {
        return View('shopping_cart');
    }

}
