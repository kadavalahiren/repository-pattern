<?php
namespace App\Repositories;
use App\Models\User;
use DB;
use Log;

class UserDemoRepository implements UserDemoInterface 
{
    protected $users;
    public function __construct(User $user)
    {
        Log::info('USERDEMOREPOSITORY - CONSTRUCT');
        $this->$user = $user;
    }

    public function all()
    {
        $all_user = User::all();
        Log::info('All USER GET - USERDEMOREPOSITORY');
        Log::info($all_user);
        return view('allUser', compact('all_user'));        // All Data Send in Show in AllUser Blade file  - View Show 
        // return $all_user; 
    }

    public function get($id)
    {
        Log::info('USER REPOSITORY GET Called');
    }

    public function store($request)
    {
        Log::info('USER REPOSITORY STORE MEthod Called');
        /* USER REPOSITORY STORE MEthod Called -  DATA STORE IN DATABASE */
        try
        {
            DB::beginTransaction();
                $user = new User;
                $user->name = $request['name'];
                $user->email = $request['email'];
                $execute = $user->save();       // USER SAVE
                if (!$execute) {
                    DB::rollback();
                    return response()->json(['status'=> false ,'message' => 'Internal Server Error.Please Try again Later.'],500);
                }
            DB::commit();
            
            return response()->json(['status'=> true ,'message'=>"User Save Successfully"],200); // RESPONSE SEND IN Controller
        }  
        catch (\Exception $e)
        {   
            Log::info("Error: Code: ".$e->getCode());
            Log::info("Error: Message: ".$e->getMessage());   
            return response()->json(['status'=> false ,'message' => 'Internal server error'],500);   
        } 
     
       
    }

    public function update($id ,array $data)
    {
        Log::info('USER REPOSITORY Update Called');
    }

    public function delete($id)
    {
        Log::info('USER REPOSITORY delete Called');
    }

}