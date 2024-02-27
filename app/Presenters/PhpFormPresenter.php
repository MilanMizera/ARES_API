<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\CorporateInformation;

final class PhpFormPresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private CorporateInformation $corporateInformation,
    ) {
    }


    

    protected function createComponentPhpForm(): Form
    {
        $form = new Form;
        $form->addInteger('ico', 'IČO:')
            ->setRequired('Prosím, vyplňte dané pole.');

        $form->addSubmit('send', 'odeslat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {

        $this->corporateInformation->apiResponse($data->ico);
      
        //$this->redirect('ShowData:showData');
    }



}
