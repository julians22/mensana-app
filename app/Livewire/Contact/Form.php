<?php

namespace App\Livewire\Contact;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{

    #[Validate('required|string|max:125')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $phone = '';

    #[Validate('required|string|max:255')]
    public $message = '';

    public function render()
    {
        return view('livewire.contact.form');
    }

    #[On('formSubmitted')]
    public function submit($token) :void
    {
        // dd($token);
        $this->validate();
        $this->validateToken($token);

        $this->reset();

        $this->dispatch('contact-submited');
    }

    public function validateToken(string $token) :void
    {
        // validate Google reCaptcha.
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('captcha.captcha_secretkey'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);
        $throw = fn ($message) => throw ValidationException::withMessages(['recaptcha' => $message]);
        if (! $response->successful() || ! $response->json('success')) {
            $throw($response->json(['error-codes'])[0] ?? 'An error occurred.');
        }
        // if response was score based (the higher the score, the more trustworthy the request)
        if ($response->json('score') < 0.6) {
            $throw('We were unable to verify that you\'re not a robot. Please try again.');
        }
    }

}
