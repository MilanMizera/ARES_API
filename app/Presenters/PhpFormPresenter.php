<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class PhpFormPresenter extends Nette\Application\UI\Presenter
{


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


        $url = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/' . $data->ico;

        $response = file_get_contents($url, FALSE, stream_context_create(array(
            'http' => array(
                'ignore_errors' => true
            )
        )));

        $data = json_decode($response, true);

        bdump($data);

        // Přesměrování na DruhyPresenter s daty
        $this->redirect('ShowData:showData', ['data' => $data]);
    }
}
