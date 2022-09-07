<?php

// Available placeholders: :uc:vendor, :uc:package, :lc:vendor, :lc:package
return [
    'config/mypackage.php' => 'config/:lc:package.php',
    'src/Facades/MyPackage.php' => 'src/Facades/:uc:package.php',
    'src/MyPackageServiceProvider.php' => 'src/:uc:packageServiceProvider.php',
    'src/Repository/MyPackageRepository.php' => 'src/Repository/:uc:packageRepository.php',
    'src/Http/Controllers/MyPackageController.php' => 'src/Http/Controllers/:uc:packageController.php',
    'src/Models/MyPackage.php' => 'src/Models/:uc:package.php',
    'src/Contracts/MyPackageRepositoryInterface.php' => 'src/Contracts/:uc:packageRepositoryInterface.php',
    'src/Subscribers/MyPackageEventSubscriber.php' => 'src/Subscribers/:uc:packageEventSubscriber.php'
];