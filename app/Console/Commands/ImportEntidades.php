<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\EntidadesImport;
use Maatwebsite\Excel\Facades\Excel;
class ImportEntidades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keyrus:Entidades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        $this->info("Importando datos excel ");

        Excel::import(new EntidadesImport, storage_path('spie.xlsx'));
    }
}
