<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;

class UserRepository implements UserInterface
{
    public function getAllUsers()
    {
        try {
            $users = User::all();
            return $users;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUserById($id)
    {
        try {
            $user = User::find($id);
            
            // Check the user
            if(!$user) return "No user with ID $id";
            return $user;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(UserRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If user exists when we find it
            // Then update the user
            // Else create the new one.
            $user = $id ? User::find($id) : new User;

            // Check the user 
            if($id && !$user) return  "No user with ID $id";

            $user->username = $request->username;
            $user->role     = $request->role;
            // Remove a whitespace and make to lowercase
            $user->email = preg_replace('/\s+/', '', strtolower($request->email));
            // I dont wanna to update the password, 
            // Password must be fill only when creating a new user.
            if(!$id) $user->password = \Hash::make($request->password);

            // Save the user
            $user->save();

            DB::commit();
           /*return $this->success(
                $id ? "User updated"
                    : "User created",
                $user, $id ? 200 : 201);*/
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);

            // Check the user
            if(!$user) return "No user with ID $id";

            // Delete the user
            $user->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
