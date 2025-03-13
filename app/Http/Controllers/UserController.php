<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = [
            ["id" => 1, "name" => "Dale Cooper","email" => "agentcooper@mail.com"],
            ["id" => 2, "name" => "Peter Englert", "email" => "peter@mail.com"],
            ["id" => 3, "name" => "Sam Porter", "email" => "sam@drawbridge.com"]
        ];

        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $users = [
            ["id" => 1, "name" => "Dale Cooper","email" => "agentcooper@mail.com"],
            ["id" => 2, "name" => "Peter Englert", "email" => "peter@mail.com"],
            ["id" => 3, "name" => "Sam Porter", "email" => "sam@drawbridge.com"]
        ];

        $nextId = count($users) + 1;

        $user = [
            "id" => $nextId,
            "name" => $request->input('name'),
            "email" => $request->input('email')
        ];
    
        $this->users[] = $user;

        return redirect()->route('users.index')->with('success', 'Usuário criado.');
    }

    public function show($id)
    {
        $users = [
            ["id" => 1, "name" => "Dale Cooper","email" => "agentcooper@mail.com"],
            ["id" => 2, "name" => "Peter Englert", "email" => "peter@mail.com"],
            ["id" => 3, "name" => "Sam Porter", "email" => "sam@drawbridge.com"]
        ];

        $user = collect($users)->firstWhere('id', $id);
    
        if (!$user) {
            abort(404);
        }
    
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $users = [
            ["id" => 1, "name" => "Dale Cooper", "email" => "agentcooper@mail.com"],
            ["id" => 2, "name" => "Peter Englert", "email" => "peter@mail.com"],
            ["id" => 3, "name" => "Sam Porter", "email" => "sam@drawbridge.com"]
        ];
    
        $user = null;
        foreach ($users as $u) {
            if ($u['id'] == $id) {
                $user = $u;
                break;
            }
        }
    
        if ($user === null) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado.');
        }
    
        return view('users.edit', compact('user'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $users = [
            ["id" => 1, "name" => "Dale Cooper","email" => "agentcooper@mail.com"],
            ["id" => 2, "name" => "Peter Englert", "email" => "peter@mail.com"],
            ["id" => 3, "name" => "Sam Porter", "email" => "sam@drawbridge.com"]
        ];

        foreach ($users as &$user) {
            if ($user['id'] == $id) {
                $user['name'] = $request->name;
                $user['email'] = $request->email;
                break;
            }
        }

        return redirect()->route('users.index')->with('success', 'Usuário atualizado.');
    }

    public function destroy($id)
    {
        $users = [
            ["id" => 1, "name" => "Dale Cooper","email" => "agentcooper@mail.com"],
            ["id" => 2, "name" => "Peter Englert", "email" => "peter@mail.com"],
            ["id" => 3, "name" => "Sam Porter", "email" => "sam@drawbridge.com"]
        ];

        $users = array_filter($users, function($user) use ($id) {
            return $user['id'] != $id;
        });

        $users = array_values($users);

        return redirect()->route('users.index')->with('warning', 'Usuário deletado');
    }
}
