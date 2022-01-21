<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\UserDemoRepository;
use App\Repositories\UserDemoInterface;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Log;

class UserRoutesController extends Controller
{
    private $user;
    public function __construct(UserDemoInterface $user)
    {
        $this->user = $user;
    }

    public function getAllData()
    {
        $users = $this->user->all();            // All Data get called Interface method ( All method )
        Log::info('getAllData - Controller');
        return $users;
    }

    public function userCreate()
    {
        return view('createUser'); 
    }

    public function dataStore(UserRequest $request)
    {
        $users = $this->user->store($request);      // Data store in Database & return redirect back in same Page ( store method )
        return redirect()->back();
    }

    public function userEdit()
    {
        # code...
    }

    public function userStore()
    {
        # code...
    }

    public function userUpdate()
    {
        # code...
    }

    public function userDelete()
    {
        # code...
    }


}
