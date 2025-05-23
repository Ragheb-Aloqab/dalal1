<?php

namespace App\Livewire\Provider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProviderEdit extends Component
{
    use WithFileUploads;

    public $provider;
    public $location;
    public $commercial_number;
    public $personal_id_number;
    public $account_status;

    public $commercial_certificate_image;
    public $avatar;
    public $paste_commercial_certificate_image;
    public $new_personal_id_image;
    public $paste_personal_id_image;

    public $paste_avatar;

    // New user fields
    public $name;
    public $email;
    public $password;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->paste_avatar = Auth::user()->avatar;

        $this->provider = Auth::user()->userable; // Assuming the user is authenticated as a provider
        $this->location = $this->provider->location;
        $this->commercial_number = $this->provider->commercial_number;
        $this->personal_id_number = $this->provider->personal_id_number;
        $this->paste_personal_id_image = $this->provider->personal_id_image;
        $this->account_status = $this->provider->account_status;
        $this->paste_commercial_certificate_image = $this->provider->commercial_certificate_image;
        // Load current user info

    }

    // Update location
    public function updateLocation()
    {
        $this->validate(['location' => 'required|string|max:255']);
        $this->provider->update(['location' => $this->location]);
        session()->flash('location', 'تم تحديث الموقع بنجاح.');
    }

    // Update commercial number
    public function updateCommercialNumber()
    {
        $this->validate(['commercial_number' => 'required|numeric|unique:providers,commercial_number,' . $this->provider->id]);
        $this->provider->update(['commercial_number' => $this->commercial_number]);
        session()->flash('commercial_number', 'تم تحديث رقم السجل التجاري بنجاح.');
    }

    // Update personal ID number
    public function updatePersonalIdNumber()
    {
        $this->validate(['personal_id_number' => 'required|string|unique:providers,personal_id_number,' . $this->provider->id]);
        $this->provider->update(['personal_id_number' => $this->personal_id_number]);
        session()->flash('personal_id_number', 'تم تحديث رقم البطاقة الشخصية بنجاح.');
    }

    // Update account status
    public function updateAccountStatus()
    {
        $this->validate(['account_status' => 'required|in:active,inactive,suspended']);
        $this->provider->update(['account_status' => $this->account_status]);
        session()->flash('message', 'تم تحديث حالة الحساب بنجاح.');
    }

    // Update user name
    public function updateName()
    {
        $this->validate(['name' => 'required|string|max:255']);
        Auth::user()->update(['name' => $this->name]);
        session()->flash('name', 'تم تحديث اسم المستخدم بنجاح.');
    }

    // Update user email
    public function updateEmail()
    {
        $this->validate(['email' => 'required|email|unique:users,email,' . Auth::id()]);
        Auth::user()->update(['email' => $this->email]);
        session()->flash('email', 'تم تحديث البريد الإلكتروني بنجاح.');
    }

    // Update password
    public function updatePassword()
    {
        $this->validate(['password' => 'required|string|min:8|confirmed']);
        Auth::user()->update(['password' => Hash::make($this->password)]);
        session()->flash('password', 'تم تحديث كلمة المرور بنجاح.');
    }

    // Update avatar
    public function updateAvatar()
    {
        $this->validate(['avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);
        if ($this->avatar) {
            $path = $this->avatar->store('avatars', 'public');
            $this->user->update(['avatar' => $path]);
            $this->avatar =  null;
            session()->flash('avatar', 'تم تحديث صورة الملف الشخصي بنجاح.');
        }
    }

    // Define validation rules for updating images
    protected function imageRules()
    {
        return [
            'commercial_certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'new_personal_id_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    // Method to update the commercial certificate image
    public function updateCommercialCertificateImage()
    {
        $this->validate(['commercial_certificate_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);

        if ($this->commercial_certificate_image) {
            $path = $this->commercial_certificate_image->store('commercial_certificates', 'public');
            $this->provider->update(['commercial_certificate_image' => $path]);
            $this->paste_commercial_certificate_image = $this->provider->commercial_certificate_image;
            session()->flash('commercial_certificate_image', 'تم تحديث صورة السجل التجاري بنجاح.');
        }
    }

    // Method to update the personal ID image
    public function updatePersonalIdImage()
    {
        $this->validate(['new_personal_id_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);

        if ($this->new_personal_id_image) {
            $path = $this->new_personal_id_image->store('personal_ids', 'public');
            $this->provider->update(['personal_id_image' => $path]);
            $this->new_personal_id_image = null;
            session()->flash('new_personal_id_image', 'تم تحديث صورة البطاقة الشخصية بنجاح.');
        }
    }

    public function render()
    {
        return view('livewire.provider.provider-edit');
    }
}