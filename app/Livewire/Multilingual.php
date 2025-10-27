<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Multilingual extends Component
{
    public $defaultLanguage;

    public function mount()
    {
        $setting = Setting::select('languages', 'default_language')->first();

        $this->defaultLanguage = $setting->default_language;
    }

    function updatedDefaultLanguage()
    {
        $this->defaultLanguage = "message changed";
    }

    public function defaultLanguage($value)
    {

        // // Update the default language in the database
        // $setting = Setting::first();
        // $setting->default_language = $this->defaultLanguage;
        // $setting->save();

        // // Optionally, provide feedback to the user
        // session()->flash('message', 'Default language updated successfully.');
    }

    public function render()
    {
        return view('livewire.multilingual');
    }
}
