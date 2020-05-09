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
        return [
            'name' => 'required',
            'address' => 'required',
            'owner_name'=> 'required',
            'owner_nid'=> 'required',
            'document'=> 'nullable',
            'kcp_name'=> 'required',
            'kcp_mobile_number'=> 'required',
            'payment_per_ad'=> 'required',
            'average_visit'=> 'nullable',
            'status'=> 'required|in:active,inactive',
            'payment_due_date'=> 'nullable',
            'zone_id'=> 'required',
            'detector_id'=> 'required',
            'tv_id'=> 'required',
            'android_box_id'=> 'required',
            'isp_id'=> 'required',
        ];
    }
}
