<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function authAdmin() {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
    }
    public function index()
    {
        $this->authAdmin();
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function edit(User $user)
    {
        $this->authAdmin();
        return view('admin.user-edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $this->authAdmin();
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Berhasil menghapus pengguna');
    }
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->authAdmin();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);
    
        if (in_array($validatedData['role'], ['user', 'admin'])) {
            $user->role = $validatedData['role'];
        }
    
        $user->update($validatedData);
    
        return redirect()->route('admin.index')->with('success', 'Berhasil mengubah pengguna');
    }

    public function agendas() {
        $this->authAdmin();
        $agendas = Agenda::where('private', false)
                            ->with('comments', 'likes', 'bookmarks', 'details', 'user')
                            ->get();
        return view('admin.agendas', compact('agendas'));
    }
    public function agendaDestroy(Agenda $agenda)
    {
        $this->authAdmin();
        $agenda->delete();
        return redirect()->route('admin.agendas')->with('success', 'Berhasil menghapus agenda');
    }
    
}
