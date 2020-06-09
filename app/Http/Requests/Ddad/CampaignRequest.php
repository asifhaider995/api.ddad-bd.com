<?php

namespace App\Http\Requests\Ddad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CampaignRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
        ];

        if($this->route()->getName() !== 'campaigns.update') {
            $rules['primary_video'] = 'required';
            $rules['package'] = 'required';
            $rules['starting_date'] = 'required';
            $rules['ending_date'] = 'required';
            $rules['locations'] = 'required';
        }

        if(Auth::user()->isAdmin())
        {
            $rules['primary_queue'] = 'required';
            $rules['secondary_queue'] = 'required_with:secondary_video';
            $rules['client_id'] = 'required';
            $rules['package'] = 'required';
            $rules['starting_date'] = 'required';
            $rules['ending_date'] = 'required';
            $rules['locations'] = 'required';
        }

        return $rules;
    }
}
