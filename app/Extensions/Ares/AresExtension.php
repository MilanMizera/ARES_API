<?php

declare(strict_types=1);

namespace App\Extensions\Ares;

use Nette;

class AresExtension extends Nette\DI\CompilerExtension
{

    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();
        $builder->addDefinition($this->prefix('aresData'))
            ->setFactory(\App\Extensions\Ares\Ares::class);
    }
}
