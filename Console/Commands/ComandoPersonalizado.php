<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class ComandoPersonalizado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuarios:listar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera una tabla con los usuarios registrados en el sistema.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cabecera = ['Nombres y Apellidos', 'Email', 'Fecha y Hora creado'];

        $usuarios = User::all(['name', 'email', 'created_at'])->toArray();

        $this->table($cabecera, $usuarios);

        $this->info('Listado Correctamente !');
    }
}
