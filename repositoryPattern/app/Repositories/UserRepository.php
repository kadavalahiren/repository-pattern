<?php
namespace App\Repositories;
use App\Models\User;
use Log;
use DB;

class UserRepository implements UserInterface
{
    protected $user;
    public function __construct(User $user){
        $this->$user = $user;
    }

    public function all()
    {
        $all_user = User::all(); 
        // $all_user = User::find(5);
        Log::info('$all_user');
        Log::info($all_user);
        return $all_user;  // All data get in Class file 
    }

    public function get($id)
    {
        Log::info('USER REPOSITORY GET Called');
    }

    public function store(array $data)
    {
        Log::info('USER REPOSITORY STORE MEthod Called');
        /* Databse in data store  */
        try
        {
            DB::beginTransaction();
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $execute = $user->save();
                if (!$execute) {
                    DB::rollback();
                    return response()->json(['status'=> false ,'message' => 'Internal Server Error.Please Try again Later.'],500);
                }
            DB::commit();
            return response()->json(['status'=> true ,'message'=>"User Save Successfully"],200); // Send Response 
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

