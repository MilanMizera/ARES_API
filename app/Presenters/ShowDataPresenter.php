<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


final class ShowDataPresenter extends Nette\Application\UI\Presenter
{

    public function renderShowData(array $apiResponse): void
    {

        
        $this->template->data = $apiResponse;
    }
}
