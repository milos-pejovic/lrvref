<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LocationExists implements Rule
{
    private $title;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        error_log('Title: ' . $this->title);
        
        $location_google_id = $value;
        // Do a DB search with thid Google Places ID.
            // If it exists, the value is valid.
        // If not, do a Google Places API Details call with the ID.
            // If exists, value is valid. Enter the result into the DB.
            // If not, the value is not valid.
        
        if ($value == 'test' || $value == '') {
            return false;
        } 
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please enter a valid location for the :attribute';
    }
}
