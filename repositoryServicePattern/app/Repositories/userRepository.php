<?php 

namespace App\Repositories;
use App\Models\User;
use http\Exception\InvalidArgumentException;
use Log;
use DB;

class UserRepository {

    protected $user;
    /* Model Construct create  */
    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->get();      // Model Relationship Using in All Data Get 
    }

    public function save($data)
    {
        $user = new $this->user;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $execute = $user->save();           // User Save in A Database 
        if (!$execute) {
            return response()->json(['status'=>500 , 'message'=>'Internal Server Error']);      // Database in data not a enter & error message Show
        } 
        return response()->json(['status'=>200, 'message'=>'User Save SuccessFully.']);     // Data Successfully Store in database & message Show
    }
}
