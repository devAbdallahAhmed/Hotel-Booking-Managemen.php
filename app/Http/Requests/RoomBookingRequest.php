<?php

namespace App\Http\Requests;

use App\Models\Apartment\Apartment;
use App\Models\Hotel\Hotel;
use Illuminate\Foundation\Http\FormRequest;

class RoomBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function id($id)
    {
        $room = Apartment::find($id);
        $hotel = Hotel::find($id);
    }
    public function rules(): array
    {

        return [
            'check_in'  => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
        ];
    }

    public function messages(): array
    {
        return [
            'check_in.required'  => 'The check-in date is required.',
            'check_in.date'      => 'Please enter a valid date.',
            'check_in.after_or_equal' => 'The check-in date must be today or a future date.',

            'check_out.required' => 'The check-out date is required.',
            'check_out.date'     => 'Please enter a valid date.',
            'check_out.after'    => 'The check-out date must be after the check-in date.',
        ];
    }

}
