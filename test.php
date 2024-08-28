<?php

require 'vendor/autoload.php';

use Illuminate\Container\Container;
use Illuminate\Config\Repository as Config;


interface MyInterface
{
    public function performAction();
}

class MyImplementation implements MyInterface
{
    public function performAction()
    {
        return "Action performed!";
    }
}

class MyClass
{
    protected $myDependency;

    public function __construct(MyInterface $myDependency)
    {
        $this->myDependency = $myDependency;
    }

    public function doSomething()
    {
        return $this->myDependency->performAction();
    }
}

// 创建容器实例
$container = new Container();

// 绑定接口到实现
$container->bind(MyInterface::class, MyImplementation::class);

// 解析并使用 MyClass
$instance = $container->make(MyClass::class);
echo $instance->doSomething();  // 输出 "Action performed!"

