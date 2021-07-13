<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {serviceName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service class';

    private $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $serviceName = $this->argument('serviceName');
        if ($serviceName === '' || is_null($serviceName) || empty($serviceName) || !$serviceName) {
            return $this->error('Service Name Invalid..!');
        }

        $file = "${serviceName}.php";
        $path = app_path();

        $file = $path . "/Services/$file";

        $folderFile = "";
        $className = $serviceName;

        if (str_contains($serviceName, '/')) {
            $arrFolder = explode('/', $serviceName);
            $className = $arrFolder[count($arrFolder) - 1];
            unset($arrFolder[count($arrFolder) - 1]);
            $folderFile = join('/', $arrFolder);
        }

        $nameSpace = 'App\Services' . (strlen($folderFile) ? '\\' . $folderFile : '');
        $composerDir = "{$path}/Services/{$folderFile}";

        $contentFile = "<?php

        namespace {$nameSpace};

        class {$className}
        {
            //
        }

        ?>";

        if ($this->files->isDirectory($composerDir)) {

            if ($this->files->isFile($file))
                return $this->error($serviceName . ' Service Already exists!');

            $this->files->makeDirectory($composerDir, 0777, true, true);

            if (!$this->files->put($file, $contentFile))
                return $this->error('Something went wrong!');

            $this->info("$serviceName generated!");
        } else {
            $this->files->makeDirectory($composerDir, 0777, true, true);

            if (!$this->files->put($file, $contentFile))
                return $this->error('Something went wrong!');
            $this->info("$serviceName generated!");
        }

        return 0;
    }
}
