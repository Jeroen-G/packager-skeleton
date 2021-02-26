<?php

// Available placeholders: 
// - :uc:vendor, :uc:package (UpperCase) 
// - :lc:vendor, :lc:package (lowercase)
// - :kc:vendor, :kc:package (kebab-case)

return [
    'src/MyPackage.php' => 'src/:uc:package.php',
    'config/mypackage.php' => 'config/:kc:package.php',
    'src/Facades/MyPackage.php' => 'src/Facades/:uc:package.php',
    'src/MyPackageServiceProvider.php' => 'src/:uc:packageServiceProvider.php',
];