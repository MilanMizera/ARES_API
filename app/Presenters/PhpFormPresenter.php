<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class PhpFormPresenter extends Nette\Application\UI\Presenter
{

    protected function createComponentIcoForm(): Form
    {
        $form = new Form;
        $form->addText('ico', 'IČO:')
            ->setRequired('Prosím vyplňte dané pole')
            //zlepšit podmímku
            ->addRule($form::Pattern, 'Zadejte prosím pouze číslice', '.*[0-9].*');
        $form->addSubmit('send', 'odeslat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {
        // tady zpracujeme data odeslaná formulářem
        // $data->name obsahuje jméno
        // $data->password obsahuje heslo
        $this->flashMessage('Byl jste úspěšně registrován.');
        //$this->redirect('Home:');






    }



}
