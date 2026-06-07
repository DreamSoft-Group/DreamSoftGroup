<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser una dirección de email válida.',
    'max' => [
        'string' => 'El campo :attribute no debe ser mayor que :max caracteres.',
    ],
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'unique' => 'El valor del campo :attribute ya está en uso.',
    'exists' => 'El valor seleccionado para :attribute no es válido.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'url' => 'El campo :attribute debe ser una URL válida.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'attributes' => [
        'email' => 'email',
        'password' => 'contraseña',
        'name' => 'nombre',
        'title' => 'título',
        'slug' => 'slug',
        'content' => 'contenido',
        'project_id' => 'proyecto',
        'status' => 'estado',
        'source' => 'origen',
    ],
];
