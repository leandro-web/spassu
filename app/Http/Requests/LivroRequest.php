<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->has('Valor')) {
            $valor = str_replace(['.', ','], ['', '.'], $this->Valor);
            $this->merge([
                'Valor' => $valor,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Titulo'        => 'required|string|max:40',
            'Editora'       => 'required|string|max:40',
            'Edicao'        => 'required|integer|min:1',
            'AnoPublicacao' => 'required|integer|min:1000|max:' . date('Y'),
            'Valor'         => 'required|numeric|min:0',
            'autores'       => 'required|array|min:1',
            'autores.*'     => 'exists:Autor,CodAu',
            'assuntos'      => 'required|array|min:1',
            'assuntos.*'    => 'exists:Assunto,CodAs',
        ];
    }
}
