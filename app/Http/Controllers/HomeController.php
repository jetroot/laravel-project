<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\User;
use App\Utils\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private $paginationNumber = 12;

    /**
     * @var Utility
     */
    private $utils;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->utils = new Utility();
    }

    /**
     * Search people
     *
     */
    public function index()
    {
        // search query
        $search = request()->query('search');

        if (empty($search)) {
            return view('home', [
                'found' => false,
                'isSearching' => false,
                'canPaginate' => false
            ]);
        } else {
            // search by card_id && last_name in db
            $users = People::where('card_id', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%")->simplePaginate($this->paginationNumber);

            if (count($users) > 0) {
                return view('home', [
                    'found' => true,
                    'canPaginate' => true,
                    'isSearching' => false,
                    'users' => $users,
                ]);
            } else {
                return view('home', [
                    'found' => false,
                    'isSearching' => true,
                    'canPaginate' => true,
                    'users' => $users,
                ]);
            }
        }
    }

    // show all users
    public function show() {
        if ($this->utils->isAdmin()) {
            $users = User::simplePaginate($this->paginationNumber);
            return view('pages.show', [
                'users' => $users
            ]);

        } else {
            return redirect($this->utils::home);
        }
    }

    // show update view user by id
    public function showUpdateUserView($userId) {
        if ($this->utils->isAdmin()) {
            return view('pages.updateuser', [
                'userId' => $userId
            ]);
        } else {
            return redirect($this->utils::home);
        }
    }

    // update user password by id
    public function update(Request $request, $userId) {
        // validate inputs
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8', 'max:255'],
            'password_confirmation' => ['required', 'min:8', 'max:255'],
        ]);

        if ($this->utils->isAdmin()) {
            $user = User::where(['id' => $userId])->first();

            if (!empty($user)) {
                
                // match old password with user password in db
                $isPasswordMatch = Hash::check($request->input('old_password'), $user->password);
                if ($isPasswordMatch) {

                    // match new password with confirmation password
                    if ($request->input('new_password') == $request->input('password_confirmation')) {

                        // save new password to db
                        $user->password = Hash::make($request->input('new_password'));
                        $user->save();

                        return back()->with('success','Password changed successfully');
                    } else {
                        return back()->with('error','Operation failed, try again');
                    }

                } else {
                    return back()->with('error','Operation failed, try again');
                }

            } else {
                return back()->with('error','Operation failed, try again');
            }

        } else {
            return redirect($this->utils::home);
        }
    }

    // delete user by id
    public function delete($userId) {

        if ($this->utils->isAdmin()) {
            $user = User::where(['id' => $userId, 'isAdmin' => 0])->first();

            if (!empty($user)) {
                $user->delete();
                return back()->with('success','Operation accomplished successfully');
            }

            return back()->with('error','Operation failed, try again');

        } else {
            return redirect($this->utils::home);
        }
    }

    
}
