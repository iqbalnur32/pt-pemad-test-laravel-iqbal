<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(
            'App\Interfaces\UserInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Interfaces\KlienInterface',
            'App\Repositories\KlienRepository'
        );
        $this->app->bind(
            'App\Interfaces\TipePekerjaanInterface',
            'App\Repositories\TipePekerjaanRepository'
        );
        $this->app->bind(
            'App\Interfaces\PekerjaanInterface',
            'App\Repositories\PekerjaanRepository'
        );
        $this->app->bind(
            'App\Interfaces\ProyekInterface',
            'App\Repositories\ProyekRepository'
        );
        $this->app->bind(
            'App\Interfaces\PenawaranJasaInterface',
            'App\Repositories\PernawaranJasaRepository'
        );
        $this->app->bind(
            'App\Interfaces\PermintaanJasaInterface',
            'App\Repositories\PermintaanJasaRepository'
        );
        $this->app->bind(
            'App\Interfaces\TagihanInterface',
            'App\Repositories\TagihanRepository'
        );
        $this->app->bind(
            'App\Interfaces\PembayaranInterface',
            'App\Repositories\PembayaranRepository'
        );
        $this->app->bind(
            'App\Interfaces\PesananInterface',
            'App\Repositories\PesananRepository'
        );
        $this->app->bind(
            'App\Interfaces\ReferensiPerusahaanInterface',
            'App\Repositories\ReferensiPerusahaanRepository'
        );
    }
}

?>