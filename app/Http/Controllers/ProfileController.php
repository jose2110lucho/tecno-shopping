<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

     // Mostrar el formulario de cambio de contraseña
     public function showChangePasswordForm()
     {
         return view('user.changePassword');
     }


     // Actualizar la contraseña del usuario
    public function updatePassword(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Verificar que la contraseña actual coincida
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'La contraseña actual no es correcta.');
        }

        // Actualizar la contraseña del usuario
        $user = Auth::user();  // Obtén al usuario autenticado
        $user->password = Hash::make($request->new_password);  // Hashear la nueva contraseña
        $user->save();  // Guardar los cambios

        return back()->with('success', 'La contraseña ha sido actualizada con éxito.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
    public function destroy(string $id)
    {
        //
    }
}
