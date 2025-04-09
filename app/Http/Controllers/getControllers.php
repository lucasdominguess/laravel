<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Exceptions\CustomExcepiton;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AniversarianteRequest;
use App\Models\Aniversariante;

class getControllers extends Controller
{
    public function AllUsersAndRoles()
    {
        return User::with('roles')->get();
    }
    public function UserAndRoles($id)
    {
        return User::with('roles')->find($id);

    }
    public function UserOflRoles(string $id)
    {
        // return User::with('roles')->where('id', $id)->get();
    // }: Collection
    // {
        return Roles::with('users')->where('type',$id)->get();
    }
    public function test(AniversarianteRequest $request)
    {
        // $input = $request->validated();
        // Aniversariante::create($request->all());
        // // Log::info('test');
        // // throw new CustomExcepiton('Custom exception message');
        // // return 'test';
        // return response(Aniversariante::create($request->all()), 201);
        return response($request);
    }
}
