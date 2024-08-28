<?php

namespace Cmx\Elf\Caches;
use Exception;
use Illuminate\Config\Repository as Config;

class TestCache
{

    protected $config;
    /**
     * @throws Exception
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getTestConfig(){
        return $this->config->get('cmx.a.b');
    }

}

