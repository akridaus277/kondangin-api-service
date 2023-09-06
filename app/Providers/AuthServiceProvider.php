<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->greeting('Selamat bergabung di Kondangin!')
                ->subject('Verifikasi Email Kamu')
                ->line('Data registrasi kamu telah berhasil kami terima. Verifikasi email kamu dengan mengklik tombol di bawah ini:')
                ->action('Verifikasi Email', $url)
                ->line('Bila ada pertanyaan, silahkan hubungi kami.');

        });
        ResetPassword::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->greeting('Atur Ulang Kata Sandi?')
                ->subject('Permintaan Atur Ulang Kata Sandi')
                ->line('Kamu mendapatkan email ini karena kami menerima permintaan pengaturan ulang kata sandi pada akun kamu.')
                ->line('Atur ulang kata sandi kamu dengan mengklik tombol di bawah ini:')
                ->action('Atur Ulang Kata Sandi', config('app.url')+"/forgot_password?token=".$url."&email=".urlencode($notifiable->getEmailForPasswordReset()))
                ->line('Link pengaturan ulang kata sandi hanya berlaku dalam waktu :count menit.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
                ->line('Jika kamu tidak merasa melakukan permintaan ini, maka kamu tidak perlu melakukan apapun.')
                ->line('Bila ada pertanyaan, silahkan hubungi kami.');

        });

        //
    }
}
