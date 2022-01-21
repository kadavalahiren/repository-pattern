<?php

namespace App\Services;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use http\Exception\InvalidArgumentException;
use Log;
use DB;


class UserService {

    protected $userRepository;
    /* UserRepository Constructor create  */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();         // userRepository in getAll method called
    }

    public function saveUserData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required'
        ]);                                     // Request Data validation 

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());      // validation fail - Error Generate
        }

        $result = $this->userRepository->save($data);       // userRepository in getAll method called
        return $result;
    }
}