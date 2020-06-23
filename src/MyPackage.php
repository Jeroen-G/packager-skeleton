<?php

namespace :uc:vendor\:uc:package;

use Adaptcms\Auth\Models\Permission;
use Adaptcms\Base\Models\Package;

class :uc:package
{
  /**
  * Sync Permissions
  *
  * @return void
  */
  /*
  public function syncPermissions()
  {
    $permissions = [
      // list permission names here, such as `admin.:lc:package.index`
    ];

    Permission::syncPackagePermissions($permissions);
  }
  */

  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
