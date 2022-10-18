<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContractsController extends Controller
{
    public function create(Request $request) {

        $validate = $request->validate([

            'full_name' => 'required|max:255',
            'subject' => 'required|max:150',
            'content' => 'required|min:10|max:1000',
            'created_by' =>'required|max:100'

          ]);




          Contract::create([

           'user_id' => Auth::user()->id,
           'full_name' => $request->full_name,
           'subject' => $request->subject,
           'content' => $request->content,
           'created_by' => $request->created_by

        ]);

      }



      public function user_contracts() {

        $contracts = Contract::where('user_id', Auth::user()->id)->get();
        return response()->json($contracts);

      }


      public function contract_show($id) {

        $contract = Contract::where('id',$id)->where('user_id', auth()->user()->id)->first();

        return response()->json($contract);

      }


      public function contract_update(Request $request, $id) {

        $validate = $request->validate([

            'full_name' => 'required|max:255',
            'subject' => 'required|max:150',
            'content' => 'required|min:10|max:1000',
            'created_by' =>'required|max:100'

          ]);


          $contract = Contract::find($id);

          $contract->update($request->all());


      }


      public function user_details() {

         $user = User::where('id', Auth()->user()->id);

         return response()->json($user);

      }





}
