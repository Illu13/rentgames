<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {


        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            $url = route('dashboard');
            return (new MailMessage)
                ->subject('Verificar Dirección de Correo Electrónico')
                ->greeting('¡Hola!')
                ->line('Haz clic en el botón de abajo para verificar tu dirección de correo electrónico.')
                ->line('Gracias por registrarte en RentGames.')
                ->line('Si no has solicitado esta acción, ignora este correo electrónico')
                ->action('Verificar Dirección de Correo Electrónico', $url)
                ->salutation('¡Esperamos que pase un buen día!');
        });
    }
}
