<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    */

    // 'path' => [

    //     'migration'         => database_path('migrations/'),

    //     'model'             => app_path('Models/'),

    //     'datatables'        => app_path('DataTables/'),

    //     'livewire_tables'   => app_path('Http/Livewire/'),

    //     'repository'        => app_path('Repositories/'),

    //     'routes'            => base_path('routes/web.php'),

    //     'api_routes'        => base_path('routes/api.php'),

    //     'request'           => app_path('Http/Requests/'),

    //     'api_request'       => app_path('Http/Requests/API/'),

    //     'controller'        => app_path('Http/Controllers/'),

    //     'api_controller'    => app_path('Http/Controllers/API/'),

    //     'api_resource'      => app_path('Http/Resources/'),

    //     'schema_files'      => resource_path('model_schemas/'),

    //     'seeder'            => database_path('seeders/'),

    //     'database_seeder'   => database_path('seeders/DatabaseSeeder.php'),

    //     'factory'           => database_path('factories/'),

    //     'view_provider'     => app_path('Providers/ViewServiceProvider.php'),

    //     'tests'             => base_path('tests/'),

    //     'repository_test'   => base_path('tests/Repositories/'),

    //     'api_test'          => base_path('tests/APIs/'),

    //     'views'             => resource_path('views/'),

    //     'menu_file'         => resource_path('views/layouts/menu.blade.php'),
    // ],

    'path' => [

        'migration'         => base_path('Modules/DocumentManager/Database/Migrations/'),

        'model'             => base_path('Modules/DocumentManager/Models/'),

        'datatables'        => base_path('Modules/DocumentManager/DataTables/'),

        'livewire_tables'   => base_path('Modules/DocumentManager/Http/Livewire/'),

        'repository'        => base_path('Modules/DocumentManager/Repositories/'),

        'routes'            => base_path('Modules/DocumentManager/Routes/web.php'),

        'api_routes'        => base_path('Modules/DocumentManager/Routes/api.php'),

        'request'           => base_path('Modules/DocumentManager/Http/Requests/'),

        'api_request'       => base_path('Modules/DocumentManager/Http/Requests/API/'),

        'controller'        => base_path('Modules/DocumentManager/Http/Controllers/'),

        'api_controller'    => base_path('Modules/DocumentManager/Http/Controllers/API/'),

        'api_resource'      => base_path('Modules/DocumentManager/Http/Resources/'),

        'schema_files'      => base_path('Modules/DocumentManager/model_schemas/'),

        'seeder'            => base_path('Modules/DocumentManager/Database/Seeders/'),

        'database_seeder'   => base_path('Modules/DocumentManager/Database/Seeders/DatabaseSeeder.php'),

        'factory'           => base_path('Modules/DocumentManager/Database/factories/'),

        'view_provider'     => base_path('Modules/DocumentManager/Providers/ViewServiceProvider.php'),

        'tests'             => base_path('Modules/DocumentManager/Tests/'),

        'repository_test'   => base_path('Modules/DocumentManager/Tests/Repositories/'),

        'api_test'          => base_path('Modules/DocumentManager/Tests/APIs/'),

        'views'             => base_path('Modules/DocumentManager/Resources/views/'),

        'menu_file'         => base_path('Modules/DocumentManager/Resources/views/layouts/menu.blade.php'),
    ],
    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    |
    */

    // 'namespace' => [

    //     'model'             => 'App\Models',

    //     'datatables'        => 'App\DataTables',

    //     'livewire_tables'   => 'App\Http\Livewire',

    //     'repository'        => 'App\Repositories',

    //     'controller'        => 'App\Http\Controllers',

    //     'api_controller'    => 'App\Http\Controllers\API',

    //     'api_resource'      => 'App\Http\Resources',

    //     'request'           => 'App\Http\Requests',

    //     'api_request'       => 'App\Http\Requests\API',

    //     'seeder'            => 'Database\Seeders',

    //     'factory'           => 'Database\Factories',

    //     'tests'             => 'Tests',

    //     'repository_test'   => 'Tests\Repositories',

    //     'api_test'          => 'Tests\APIs',
    // ],

    // 'namespace' => [

    //     'model'             => 'Modules\DocumentManager\Models',

    //     'datatables'        => 'Modules\DocumentManager\DataTables',

    //     'livewire_tables'   => 'Modules\DocumentManager\Http\Livewire',

    //     'repository'        => 'Modules\DocumentManager\Repositories',

    //     'controller'        => 'Modules\DocumentManager\Http\Controllers',

    //     'api_controller'    => 'Modules\DocumentManager\Http\Controllers\API',

    //     'api_resource'      => 'Modules\DocumentManager\Http\Resources',

    //     'request'           => 'Modules\DocumentManager\Http\Requests',

    //     'api_request'       => 'Modules\DocumentManager\Http\Requests\API',

    //     'seeder'            => 'Modules\DocumentManager\Database\Seeders',

    //     'factory'           => 'Modules\DocumentManager\Database\Factories',

    //     'tests'             => 'Modules\DocumentManager\Tests',

    //     'repository_test'   => 'Modules\DocumentManager\Tests\Repositories',

    //     'api_test'          => 'Modules\DocumentManager\Tests\APIs',
    // ],
    'namespace' => [

        'model'             => 'Modules\DtaReview\Models',

        'datatables'        => 'Modules\DtaReview\DataTables',

        'livewire_tables'   => 'Modules\DtaReview\Http\Livewire',

        'repository'        => 'Modules\DtaReview\Repositories',

        'controller'        => 'Modules\DtaReview\Http\Controllers',

        'api_controller'    => 'Modules\DtaReview\Http\Controllers\API',

        'api_resource'      => 'Modules\DtaReview\Http\Resources',

        'request'           => 'Modules\DtaReview\Http\Requests',

        'api_request'       => 'Modules\DtaReview\Http\Requests\API',

        'seeder'            => 'Modules\DtaReview\Database\Seeders',

        'factory'           => 'Modules\DtaReview\Database\Factories',

        'tests'             => 'Modules\DtaReview\Tests',

        'repository_test'   => 'Modules\DtaReview\Tests\Repositories',

        'api_test'          => 'Modules\DtaReview\Tests\APIs',
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    */

    'templates' => 'adminlte-templates',

    /*
    |--------------------------------------------------------------------------
    | Model extend class
    |--------------------------------------------------------------------------
    |
    */

    'model_extend_class' => 'Illuminate\Database\Eloquent\Model',

    /*
    |--------------------------------------------------------------------------
    | API routes prefix & version
    |--------------------------------------------------------------------------
    |
    */

    'api_prefix'  => 'api',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    */

    'options' => [

        'soft_delete' => true,

        'save_schema_file' => true,

        'localized' => false,

        'repository_pattern' => true,

        'resources' => true,

        'factory' => true,

        'seeder' => true,

        'swagger' => true, // generate swagger for your APIs

        'tests' => true, // generate test cases for your APIs

        'excluded_fields' => ['id'], // Array of columns that doesn't required while creating module
    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixes
    |--------------------------------------------------------------------------
    |
    */

    'prefixes' => [

        'route' => '',  // e.g. admin or admin.shipping or admin.shipping.logistics

        'namespace' => '',  // e.g. Admin or Admin\Shipping or Admin\Shipping\Logistics

        'view' => '',  // e.g. admin or admin/shipping or admin/shipping/logistics
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Types
    |
    | Possible Options: blade, datatables, livewire
    |--------------------------------------------------------------------------
    |
    */

    'tables' => 'blade',

    /*
    |--------------------------------------------------------------------------
    | Timestamp Fields
    |--------------------------------------------------------------------------
    |
    */

    'timestamps' => [

        'enabled'       => true,

        'created_at'    => 'created_at',

        'updated_at'    => 'updated_at',

        'deleted_at'    => 'deleted_at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Specify custom doctrine mappings as per your need
    |--------------------------------------------------------------------------
    |
    */

    'from_table' => [

        'doctrine_mappings' => [],
    ],

];
