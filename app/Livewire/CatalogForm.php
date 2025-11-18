<?php

namespace App\Livewire;

use App\Models\RequestForm;
use App\Settings\GeneralSetting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CatalogForm extends Component
{
    #[Validate('required|min:8')]
    public $request_name = "";

    #[Validate('required|min:5')]
    public $request_email = "";

    #[Validate('required|min:8')]
    public $request_phone = "";

    protected $clientIp = null;
    protected $userAgent = null;
    protected $sessionLocale = null;

    public function render()
    {
        return view('livewire.catalog-form');
    }

    public function send()
    {
        // $this->validate();

        $this->clientIp = request()->getClientIp();
        $this->userAgent = request()->userAgent();
        $this->sessionLocale = app()->getLocale();

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
}
