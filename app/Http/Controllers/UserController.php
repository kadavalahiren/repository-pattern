<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\models\User;
use App\Repositories\UserRepository;
use App\Repositories\UserInterface;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Log;
use DB;

class UserController extends Controller
{
    
    private $user;
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        Log::info('index Called');
        $users = $this->user->all();
        
        // $images = new UserResource($users);       // Resource Data - Single Data
        // return $images;

        // $images = UserResource::Collection($users);
        // return $images;
        
        return (new  UserCollection($users));        // Collection of Data
    }

    public function create()
    {
        Log::info('create Called');
    }

    public function store(UserRequest $request)
    {
        $users = $this->user->store($request->all());   // Repository Pattern follow interface Store method called
        return $users;
    }

    public function show($id)
    {
        Log::info('show Called');
    }

    public function edit($id)
    {
        Log::info('edit Called');
    }

    public function update(Request $request, $id)
    {
        Log::info('update Called');
    }

    public function destroy($id)
    {
        Log::info('destroy Called');
    }
}
