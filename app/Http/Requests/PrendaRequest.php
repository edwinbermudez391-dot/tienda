<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('patch') || $this->isMethod('put');
        $imageRule = $isUpdate ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,webp|max:2048';

        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'talla' => 'required|in:S,M,L,XL',
            'categoria' => 'required|in:Camisetas,Hoodies,Pantalones,Accesorios,Chaquetas',
            'estado' => 'required|in:disponible,reservado,vendido',
            'imagen' => $imageRule,
            'mostrar_spotlight' => 'nullable|boolean',
            'mostrar_catalogo' => 'nullable|boolean',
            'mostrar_muro' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'talla.in' => 'La talla debe ser S, M, L o XL.',
            'categoria.in' => 'La categoría debe ser Camisetas, Hoodies, Pantalones, Accesorios o Chaquetas.',
            'estado.in' => 'El estado debe ser disponible, reservado o vendido.',
            'titulo.max' => 'El título no puede exceder 255 caracteres.',
            'precio.min' => 'El precio debe ser mayor o igual a 0.',
        ];
    }
}
