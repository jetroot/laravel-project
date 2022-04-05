<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\User;
use App\Utils\Utility;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * @var Utility
     */
    private $utils;

    public function __construct()
    {
        $this->middleware('auth');

        $this->utils = new Utility();
    }

    // Return view page for creating people by [ admin / user ]
    public function create()
    {
        return view('pages.create');
    }

    // storing people by [ admin / user ]
    public function store(Request $request) {
        // validate inputs
        $request->validate([
            'cardid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required|date_format:Y-m-d',
            'birthplace' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'gender' => 'required|in:M,F',
            'address' => 'required',
            'phone' => 'required|digits:10',
            'profession' => 'required',
            'note' => 'required',
        ]);

        // check uniqueness of card_id
        $isCardIdExists = People::where('card_id', '=', $request->input('cardid'))->first();

        if (empty($isCardIdExists)) {

            // store data in db
            $created = People::create([
                'card_id' => $request->input('cardid'),
                'first_name' => $request->input('firstname'),
                'last_name' => $request->input('lastname'),
                'birth_date' => $request->input('birthdate'),
                'birth_place' => $request->input('birthplace'),
                'father_name' => $request->input('fathername'),
                'mother_name' => $request->input('mothername'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'profession' => $request->input('profession'),
                'note' => $request->input('note'),
            ]);

            if ($created) {
                return back()->with('success','Operation accomplished successfully');
            }

            return back()->with('error','Operation failed, try again');
        }
    }


    // show update view with data by admin
    public function updateView($userId) {

        // check if userId is exists in db
        $isUserIdExists = People::where('id', $userId)->first();

        if ($isUserIdExists) {
            return view('pages.update', [
                'userId' => $isUserIdExists->id,
                'cardId' => $isUserIdExists->card_id,
                'firstName' => $isUserIdExists->first_name,
                'lastName' => $isUserIdExists->last_name,
                'birthDate' => $isUserIdExists->birth_date,
                'birthPlace' => $isUserIdExists->birth_place,
                'fatherName' => $isUserIdExists->father_name,
                'motherName' => $isUserIdExists->mother_name,
                'gender' => $isUserIdExists->gender,
                'address' => $isUserIdExists->address,
                'phone' => $isUserIdExists->phone,
                'note' => $isUserIdExists->note,
                'profession' => $isUserIdExists->profession,
                'isIdExists' => true
            ]);

        } else {
            return view('pages.update', [
                'isIdExists' => false
            ]);
        }

    }

    // update peple data
    public function update(Request $request, $userId) {
        // validate inputs
        $request->validate([
            'cardid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required|date_format:Y-m-d',
            'birthplace' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'gender' => 'required|in:M,F',
            'address' => 'required',
            'phone' => 'required|digits:10',
            'profession' => 'required',
            'note' => 'required',
        ]);

         // check if userId is exists in db
         $isUserIdExists = People::where('id', $userId)->first();

         // update data
         $isUpdated = People::where('id', $userId)->update([
             'card_id' => $request->input('cardid'),
             'first_name' => $request->input('firstname'),
             'last_name' => $request->input('lastname'),
             'birth_date' => $request->input('birthdate'),
             'birth_place' => $request->input('birthplace'),
             'father_name' => $request->input('fathername'),
             'mother_name' => $request->input('mothername'),
             'gender' => $request->input('gender'),
             'address' => $request->input('address'),
             'phone' => $request->input('phone'),
             'profession' => $request->input('profession'),
             'note' => $request->input('note')
         ]);
         
         if ($isUpdated) {
             return back()->with('success','Operation accomplished successfully');
         }

         return back()->with('error','Operation failed, try again');
    }

    // delete people by id
    public function delete($userId) {

        $user = People::where(['id' => $userId])->first();
        if (!empty($user)) {

            $user->delete();
            return back()->with('success','Operation accomplished successfully');

        } else {
            return back()->with('error','Operation failed, try again');
        }
    }
}
