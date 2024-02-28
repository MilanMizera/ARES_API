<?php
declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class PhpFormPresenter extends Nette\Application\UI\Presenter
{
   

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


        $url = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/' . $data->ico;

        $response = file_get_contents( $url, FALSE, stream_context_create(array(
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
 