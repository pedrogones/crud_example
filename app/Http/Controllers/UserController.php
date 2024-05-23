<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->paginate(10);
       return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>[
                'required',
                'email'
            ],
            'password'=>[
                'confirmed'
            ],
            'role_id'=>'required',
        ];
    }
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            User::query()->create($data);
            return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
        } catch (Exception $e) {
            dd($e);
            //   return back()->with('error', 'Não foi possível criar o usuário!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (Exception $th) {
            dd($th);
        }
    }
}