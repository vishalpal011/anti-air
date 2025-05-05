<?php

namespace App\Providers;

use App\Models\MailConfiguration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
class MailConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $config = MailConfiguration::first();

        if ($config) {
            Config::set('mail.mailer', $config->mailer);
            Config::set('mail.host', $config->host);
            Config::set('mail.port', $config->port);
            Config::set('mail.username', $config->username);
            Config::set('mail.password', $config->password);
            Config::set('mail.encryption', $config->encryption);
            Config::set('mail.from.address', $config->from_address);
            Config::set('mail.from.name', $config->from_name);
        }
    }
}
