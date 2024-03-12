<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Extensions\Ares\Ares;


final class PhpFormPresenter extends Nette\Application\UI\Presenter
{



    public function __construct(
        private Ares $ares

    ) {
    }


    public function renderPhpForm(): void
    {
    }

    protected function createComponentPhpForm(): Form
    {
        $form = new Form;
        $form->addText('ico', 'IČO:')
            ->setRequired('Prosím, vyplňte dané pole.')
            ->addRule(Form::MaxLength, 'IČO musí obsahovat přesně 8 znaků.', 8)
            ->addRule(Form::MinLength, 'IČO musí obsahovat přesně 8 znaků', 8);


        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {

        $apiResponse= $this->ares->provideData($data->ico);

        // Přesměrování na DruhyPresenter s daty
        bdump($apiResponse);
        $this->redirect('ShowData:showData', ['apiResponse' => $apiResponse]);
    }
}


