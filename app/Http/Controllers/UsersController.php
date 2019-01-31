<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    /*
    public function __construct(){

        $this->middleware('auth:api');
    }
    */

    public function index()
    {
        return response()->json(User::active()->paginate(10)->toArray());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
            $validation = Validator::make($request->all(), [
            'user'=>'required|min:4',
            'pass'=>'required',
            'full_name'=>'required'
        ]);

        if ($validation->fails()) {

            return response()->json(['message' => $validation->messages()->all()], 422);
            
        } else {
            $data=$request->all();
            $data['pass']= bcrypt($request->pass);
        try {

            $user = User::create($data
            );
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['full_name'] =  $user->full_name;
            return response()->json(['message' => 'User added!', 'data' => $user]);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    }
    /**
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user_id)
    {
        try {
        $user = User::findOrFail($user_id);

        return response()->json(['response' => 'success', 'user' => $user]);
        
    } catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
}
    


    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */

    public function search(){

        if ($search = \Request::get('q')) {
            $users = User::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                        ->orWhere('email','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $users = User::latest()->paginate(5);
        }

        return $users;

    }
 
    
public function update(Request $request, User $user)
{
    
        $data=$request->all();
        $data['pass']= bcrypt($request->pass);  
        try {
            
            $user->update($data);
      
            return response()->json(['message' => 'User updated!', 'data' => $user]);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    
 
    }

    public function destroy($user_id)
    {

        $this->authorize('isAdmin') || $this->authorize('isSupervisor');
        try {

            User::findOrFail($user_id)->delete();

            return response()->json(['response' => 'success', 'message' => 'User Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
