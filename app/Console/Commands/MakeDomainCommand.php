<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\table;
use function Laravel\Prompts\info;

class MakeDomainCommand extends Command
{
    protected $signature = 'make:domain {name}';
    protected $description = 'Make a new domain.';
    protected array $folders = [
        'Actions',
        'Commands',
        'Contracts',
        'Data',
        'Enums',
        'Events',
        'Exceptions',
        'Listeners',
        'Models',
        'Notifications',
        'Policies',
        'Providers',
        'States',
        'Traits',
        'QueryBuilders',
    ];

    public function handle(): void
    {
        $domain = str($this->argument('name'))->camel()->ucfirst()->value();
        $path = str(app_path('Domains'))->append('/')->append($domain);

        $this->newLine();

        $folders = multiselect(
            label: 'What folders should I create within the domain?',
            options: $this->folders,
            default: ['Actions', 'Data', 'Enums', 'Events', 'Listeners', 'Models'],
            hint: 'Leave the default option if you don\'t know what to choose.'
        );

        if (!File::exists($path->value())) {
             File::makeDirectory($path->value());
            info("Domain $domain has been created.");
        } else {
            info("Domain $domain is exists.");
        }

        $this->newLine();

        $table = [];

        foreach ($folders as $folder) {
            $folder_path = $path->append('/')->append($folder)->value();
            if (!File::exists($folder_path)) {
                 File::makeDirectory($folder_path);
                $table[] = [$folder, $folder_path];
            }
        }
        table(
            ['Folder', 'Path'],
            $table
        );
    }
}
