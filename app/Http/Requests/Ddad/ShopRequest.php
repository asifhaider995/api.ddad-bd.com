<?php

namespace App\Http\Requests\Ddad;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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

        $rules  = [
            'name' => 'required|unique:shops,name',
            'address' => 'required',
            'owner_name'=> 'required',
            'owner_nid'=> 'required',
            'nid'=> 'nullable',
            'licence'=> 'nullable',
            'kcp_name'=> 'required',
            'kcp_mobile_number'=> 'required',
            'payment_per_ad'=> 'required',
            'payment_due_date'=> 'nullable',
            'isp_id'=> 'required',
            'location_id'=> 'required',
            'device_id'=> 'nullable',
            'android_imei'=> 'required_with:device_id',
            'android_label'=> 'required_with:device_id',
        ];

        if($this->route()->getName() == 'shops.update') {
            $rules['name'] = 'required';
        }

        return $rules;
    }
}
