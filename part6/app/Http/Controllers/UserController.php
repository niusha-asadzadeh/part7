<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function validation($name,$email,$password){
           return [
               "$name" => ['required', 'nullable', 'string', 'max:150'],
               "$password" => ['required', 'string', 'min:4', 'max:100'],
               "$email" => ['required', 'email', 'unique:App\Models\User', 'max:100']
           ];
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
//get by id
    public function getById (string $id): JsonResponse
    {
        $user = User::where('id', $id)->first();
        return response()->json($user);
    }

//get all
    public function getAll(){
        return User::all();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    //add
    public function store (Request $request): JsonResponse
    {
        return response()->json(
            User::create(
                $request->validate($this->validation('name','email','password'))
            )
        );

    }
    /**
     * @param string $id
     * @return JsonResponse
     */
    //delete
    public function delete (string $id): JsonResponse
    {
        User::where('id', $id)->delete();

        return response()->json([
            'test' => 'delete shod',
        ]);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return JsonResponse
     */
    //update
    public function update (string $id, Request $request): JsonResponse
    {
        $user = User::where('id', $id);
        $update = $request->validate(
            $this->validation('name', 'email', 'password')
        );
        $user->update($update);
        return response()->json([
            'test' => 'update shod',
        ]);
    }
}
