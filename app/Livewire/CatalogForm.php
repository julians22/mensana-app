<?php

namespace App\Livewire;

use App\Models\RequestForm;
use App\Settings\GeneralSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CatalogForm extends Component
{
    #[Validate('required', message: 'Nama Lengkap wajib diisi')]
    #[Validate('string', message: 'Nama Lengkap harus berupa string')]
    #[Validate('max:255', message: 'Nama Lengkap terlalu panjang')]
    #[Validate('min:3', message: 'Nama Lengkap terlalu pendek')]
    public $request_name = "";

    #[Validate('required', message: 'Email wajib diisi')]
    #[Validate('email', message: 'Email tidak valid')]
    #[Validate('max:255', message: 'Email terlalu panjang')]
    public $request_email = "";

    #[Validate('required', message: 'No. Telp wajib diisi')]
    #[Validate('string', message: 'No. Telp harus berupa string')]
    #[Validate('max:255', message: 'No. Telp terlalu panjang')]
    #[Validate('min:8', message: 'No. Telp terlalu pendek')]
    #[Validate('regex:/^([0-9\s\-\+\(\)]*)$/', message: 'No. Telp tidak valid')]
    public $request_phone = "";

    protected $clientIp = null;
    protected $userAgent = null;
    protected $sessionLocale = null;

    public $captcha = null;

    public function render()
    {
        return view('livewire.catalog-form');
    }

    public function send()
    {
        $this->clientIp = request()->getClientIp();
        $this->userAgent = request()->userAgent();
        $this->sessionLocale = app()->getLocale();

        $this->validate();

        $this->validateToken($this->captcha);

        RequestForm::create([
            'name' => $this->request_name,
            'email' => $this->request_email,
            'phone' => $this->request_phone,
            'user_properties' => [
                "ip" => $this->clientIp,
                "user_agent" => $this->userAgent,
                "locale" => $this->sessionLocale
            ]
        ]);

        session()->flash('request_form', 'Berhasil mengirim data, permintaan anda akan kami proses segera');

        $this->reset();

        $this->sendFile();
    }

    public function sendFile() :void
    {

        // Todo

    }

    public function validateToken(?string $token) :void
    {
        $throw = fn ($message) => throw ValidationException::withMessages(['recaptcha' => $message]);

        if (empty($token)) {
            $throw('Please verify');
        }

        // validate Google reCaptcha.
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('captcha.captcha_secretkey_v2'),
            'response' => $token,
            'remoteip' => request()->getClientIp(),
        ]);
        if (! $response->successful() || ! $response->json('success')) {
            $throw($response->json(['error-codes'])[0] ?? 'An error occurred.');
        }
    }
}
