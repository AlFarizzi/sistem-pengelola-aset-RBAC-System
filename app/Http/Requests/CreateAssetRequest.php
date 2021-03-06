<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nama_asset" => ['required'],
            "jumlah" => ['required', 'gte:1'],
            "tgl_perolehan" => ['required'],
            "tgl_service" => ['required'],
            "tgl_pajak" => ['required'],
            "plat_nomor" => ['required', 'unique:assets,plat_nomor'] 
        ];
    }
}
