<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportDataToSeeder extends Command
{
    protected $signature = 'export:data-to-seeder';
    protected $description = 'Export database data to seeder files';

    public function handle()
    {
        // Get all tables
        $tables = DB::select('SELECT name FROM sqlite_master WHERE type="table" AND name != "migrations" AND name != "sqlite_sequence"');

        foreach ($tables as $table) {
            $tableName = $table->name;
            $data = DB::table($tableName)->get();

            if ($data->count() > 0) {
                // Create seeder content
                $seederContent = "<?php\n\n";
                $seederContent .= "namespace Database\\Seeders;\n\n";
                $seederContent .= "use Illuminate\\Database\\Seeder;\n";
                $seederContent .= "use Illuminate\\Support\\Facades\\DB;\n\n";
                $seederContent .= "class {$tableName}Seeder extends Seeder\n";
                $seederContent .= "{\n";
                $seederContent .= "    public function run()\n";
                $seederContent .= "    {\n";

                foreach ($data as $row) {
                    $rowArray = get_object_vars($row);
                    $seederContent .= "        DB::table('{$tableName}')->insert([\n";
                    foreach ($rowArray as $column => $value) {
                        $value = is_string($value) ? "'" . addslashes($value) . "'" : $value;
                        $value = is_null($value) ? 'null' : $value;
                        $seederContent .= "            '{$column}' => {$value},\n";
                    }
                    $seederContent .= "        ]);\n";
                }

                $seederContent .= "    }\n";
                $seederContent .= "}\n";

                // Save seeder file
                File::put(database_path("seeders/{$tableName}Seeder.php"), $seederContent);
                $this->info("Created seeder for table: {$tableName}");
            }
        }
    }
}
