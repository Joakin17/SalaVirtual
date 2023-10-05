<?php

namespace App\Http\Controllers; // Asegúrate de que el espacio de nombres sea correcto

use Illuminate\Http\Request;
use App\Models\UsuarioExterno;

class UsuarioExternoController extends Controller
{
    public function index()
    {
      return view('home');
    }
    

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      //
    }

    public function guardarUsuario(Request $request)
      {
          // Obtén el NIT del formulario
          $nit = $request->input('Nit');
          
          // Verifica si ya existe un usuario con el mismo NIT
          $usuarioExistente = UsuarioExterno::where('Nit', $nit)->first();
          
          if ($usuarioExistente) {
              // El usuario ya existe, muestra un mensaje de error o realiza la acción que desees.
              return redirect()->back()->with('error', 'El NIT ya está registrado.');
          }

          // Si no existe, crea un nuevo usuario
          $usuarioExterno = new UsuarioExterno();
          $usuarioExterno->Nit = $nit;
          $usuarioExterno->nombre = $request->input('nombre');
          $usuarioExterno->Genero = $request->input('Genero');
          $usuarioExterno->Institucion = $request->input('Institucion');
          $usuarioExterno->tipo = $request->input('tipo');

          // Guarda el registro en la base de datos
          $usuarioExterno->save();

          // Redirige a la página de índice de usuarios externos con un mensaje de éxito
          return redirect()->route('home');
      }

    public function showeditar(Request $request)
    {
        $busca = $request->get('Nit'); // Cambia 'carne' a 'Nit' para buscar por NIT
        $usuario = UsuarioExterno::where('Nit', $busca)->first(); // Cambia el modelo a 'UsuarioExterno'

        if (!$usuario) {
          return view('usuario.agregarusuarioext')->with(['busca' => $busca]);
        }

        return view('usuario.editarusuario')->with(['usuario' => $usuario]);
    }


    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Encuentra el usuario externo por su ID
        $usuarioExterno = UsuarioExterno::find($id);
    
        // Obtén el NIT actual del usuario externo
        $nitActual = $usuarioExterno->nit;
    
        // Obtén el NIT que se quiere asignar en la edición
        $nitNuevo = $request->input('Nit');
    
        // Verifica si el NIT nuevo es diferente al NIT actual
        if ($nitNuevo != $nitActual) {
            // Verifica si ya existe un usuario externo con el mismo NIT nuevo
            $usuarioExistente = UsuarioExterno::where('Nit', $nitNuevo)->first();
    
            if ($usuarioExistente) {
                // El NIT nuevo ya está en uso por otro usuario externo, muestra un mensaje de error
                return redirect()->back()->with('error', 'El NIT ya está registrado.');
            }
        }
    
        // Actualiza los campos del usuario externo con los datos del formulario
        $usuarioExterno->Nit = $nitNuevo;
        $usuarioExterno->nombre = $request->input('nombre');
        $usuarioExterno->Genero = $request->input('Genero');
        $usuarioExterno->Institucion = $request->input('Institucion');
        $usuarioExterno->tipo = $request->input('tipo');
    
        // Guarda los cambios en la base de datos
        $usuarioExterno->save();
    
        // Redirige a la página de índice de usuarios externos con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Usuario externo actualizado con éxito');
    }
    


    public function destroy($id)
    {
      //
    }
}
