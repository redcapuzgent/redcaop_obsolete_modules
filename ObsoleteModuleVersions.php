<?php

namespace uzgent\ObsoleteModuleVersions;



use \Exception;

// Declare your module class, which must extend AbstractExternalModule
class ObsoleteModuleVersions extends \ExternalModules\AbstractExternalModule {


    public function getObsoleteDirectories()
    {
        $allModuleDirs = \ExternalModules\ExternalModules::getModulesInModuleDirectories();
        $activeModuleDirs = $this->getActiveModuleDirectories();
        $obsoleteDirectories = [];
        foreach ($allModuleDirs as $currentDir)
        {
            if (!in_array($currentDir, $activeModuleDirs))
            {
                    $obsoleteDirectories []= $currentDir;
            }
        }
        return $obsoleteDirectories;
    }

    public function getObsoleteAbsoluteDirectories()
    {
        $allModuleDirs = \ExternalModules\ExternalModules::getModulesInModuleDirectories();
        $activeModuleDirs = $this->getActiveModuleDirectories();
        $moduleParentDirs = \ExternalModules\ExternalModules::getModuleDirectories();
        $obsoleteDirectories = [];
        foreach ($allModuleDirs as $currentDir)
        {
            if (!in_array($currentDir, $activeModuleDirs))
            {
                foreach($moduleParentDirs as $parentDir)
                {
                    if (file_exists($parentDir . DIRECTORY_SEPARATOR . $currentDir))
                    {
                        $obsoleteDirectories []= $parentDir . DIRECTORY_SEPARATOR . $currentDir;
                    }
                }
            }
        }
        return $obsoleteDirectories;
    }

    /**
     * @return string[] directories.
     */
    public function getActiveModuleDirectories()
    {
        $moduleDirs = [];
        foreach(\ExternalModules\ExternalModules::getEnabledModules() as $module => $version)
        {
            $moduleDirs []= $module."_".$version;
        }
        return $moduleDirs;
    }


}
