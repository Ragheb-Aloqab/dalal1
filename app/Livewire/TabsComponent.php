<?php

namespace App\Livewire;

use App\Models\Provider;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class TabsComponent extends Component
{
    use WithFileUploads;
    public $activeTab = 'profile';
    public $followings;
    public $notifications;
    public $unreadNotifications;
    public $user;
    public $name;
    public $email;
    public $phone;
    public $current_password;
    public $new_password;
    public $confirm_password;
    public $avatar;
    public $pasteAvatar;


    protected $rules = [
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
        'confirm_password' => 'required|string|min:8',
    ];

    public function updateAvatar()
    {
        $this->validate(['avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);
        if ($this->avatar) {
            $path = $this->avatar->store('avatars', 'public');
            $user = Auth::user(); // Get the authenticated user
            $u =  $user->update(['avatar' => $path]);
            session()->flash('avatar', 'تم تحديث صورة الملف الشخصي بنجاح.' . $u);
        }
    }

    public function updatePassword()
    {
        $this->validate();

        if (!Hash::check($this->current_password, Auth::user()->getAuthPassword())) {
            $this->addError('current_password', 'كلمة المرور الحالية غير صحيحة.');
            return;
        }

        auth()->user()->update(['password' => Hash::make($this->new_password)]);

        // Clear input fields
        $this->reset(['current_password', 'new_password', 'confirm_password']);

        session()->flash('password_success', 'تم تحديث كلمة المرور بنجاح.');
    }
    public function mount()
    {
        $this->user  = User::findOrFail(Auth::user()->getAuthIdentifier());
        $this->followings =  $this->user->following;
        // $this->unreadNotifications = $this->user->unreadNotifications()->orderBy('created_at', 'desc')->get();
        // $this->notifications = $this->user->notifications()->whereNotNull('read_at')->orderBy('created_at', 'desc')->get();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->avatar = null;
        $this->pasteAvatar = $this->user->avatar;
        $this->refreshNotifications();
    }
    public function markAsRead($notificationId)
    {
        dd($notificationId);
        $notification = $this->user->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        // Refresh the notifications list
        $this->refreshNotifications();
    }

    public function deleteNotification($notificationId)
    {
       
        $notification = $this->user->notifications()->find($notificationId);

        if ($notification) {
            $notification->delete();
        }

        // Refresh the notifications list
        $this->refreshNotifications();
    }

    private function refreshNotifications()
    {
        $this->unreadNotifications = $this->user->unreadNotifications()->orderBy('created_at', 'desc')->get();
        $this->notifications = $this->user->notifications()->whereNotNull('read_at')->orderBy('created_at', 'desc')->get();
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function toggleFollow($providerId)
    {
        $provider = Provider::find($providerId);
        if ($provider) {
            $this->user->toggleFollow($provider);
        }
        $user  = Auth::user();
        $this->followings =  $user->following;
    }
    public function render()
    {

        return view('livewire.tabs-component');
    }

    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:255',
        ], [
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.min' => 'يجب أن يحتوي الاسم على 3 أحرف على الأقل.',
            'name.max' => 'لا يمكن أن يتجاوز الاسم 255 حرفًا.',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->save();

        session()->flash('name', 'تم تحديث الاسم بنجاح!');
    }

    public function updateEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',
        ]);

        $user = Auth::user();
        $user->email = $this->email;
        $user->save();

        session()->flash('email', 'تم تحديث البريد الإلكتروني بنجاح!');
    }

    public function updatePhone()
    {
        $this->validate([
            'phone' => 'required|string|min:9|max:15|unique:users,phone,' . Auth::id(),
        ], [
            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.string' => 'يجب أن يكون رقم الهاتف نصًا.',
            'phone.min' => 'يجب أن يتكون رقم الهاتف من 10 أحرف على الأقل.',
            'phone.max' => 'يجب ألا يتجاوز رقم الهاتف 15 حرفًا.',
            'phone.unique' => 'رقم الهاتف مستخدم بالفعل.',
        ]);

        $user = Auth::user();
        $user->phone = $this->phone;
        $user->save();

        session()->flash('phone', 'تم تحديث رقم الهاتف بنجاح!');
    }
}
