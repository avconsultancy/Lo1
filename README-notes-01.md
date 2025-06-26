Migrations
    -- Used to execute DDL (TABLE CREATE,UPDATE ...)
    ---- Create a migration
    php artisan make:migration create_emp_table
    -- created inside database/migrations
    ( Update Migration)
    -- run
    php artisan migrate

    Now Create a Model : Class mapped to Table
    inside app\Models

    Now Create a Repo
    app\Repo
    app\Repo\EmpRepo.php                INTERFACE
    app\Repo\EmpRepoImpl.php            IMPLEMENTATION
    
    