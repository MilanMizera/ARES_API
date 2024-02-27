<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\CorporateInformation;

final class ShowDataPresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private CorporateInformation $CorporateInformation,
    ) {
    }



    public function renderShowData(): void {
    
      
        if (!isset($this->template->data)) {
            $this->template->data = null;
          }
    }

}