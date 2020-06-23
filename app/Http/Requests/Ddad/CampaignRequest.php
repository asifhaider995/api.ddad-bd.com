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
            'title' => 'required|max:50',
            'secondary_video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ];

        if($this->route()->getName() !== 'campaigns.update') {
            $rules['primary_video'] = 'required|mimes:mp4,ogx,oga,ogv,ogg,webm';
            $rules['package'] = 'required';
            $rules['placement'] = 'required';
            $rules['starting_date'] = 'required';
            $rules['duration_month'] = 'required';
            $rules['locations'] = 'required';
        }

        if(Auth::user()->isAdmin())
        {
            $rules['primary_queue'] = 'required_with:primary_video';
            $rules['secondary_queue'] = 'required_with:secondary_video';
            $rules['client_id'] = 'required';
            $rules['package'] = 'required';
            $rules['placement'] = 'required';
            $rules['starting_date'] = 'required';
            $rules['duration_month'] = 'required';
            $rules['locations'] = 'required';
        }

        return $rules;
    }
}
