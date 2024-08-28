<?php

namespace Cmx\Elf\Provider;

use Illuminate\Support\ServiceProvider;

class ElfServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 检查是否在 Laravel 环境中运行，并发布配置文件
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/Config/cmx_elf_config.php' => config_path('cmx_elf_config.php'),
            ], 'cmx-elf-config');
        } else {
            // 非 Laravel 环境中的处理方式
            $this->publishes([
                __DIR__.'/Config/cmx_elf_config.php' => base_path('cmx_elf_config.php'),
            ], 'cmx-elf-config');
        }
    }

    public function register()
    {
        // 在这里你可以选择是否使用 `mergeConfigFrom`
        // 例如，如果想让配置文件默认加载并且用户可以覆盖它：
        // $this->mergeConfigFrom(__DIR__.'/Config/yourpackage.php', 'yourpackage');
    }
}
