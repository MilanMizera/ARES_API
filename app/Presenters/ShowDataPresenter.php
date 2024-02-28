<?php

namespace App\Presenters;

use Nette;


final class ShowDataPresenter extends Nette\Application\UI\Presenter
{
    

    public function renderShowData( array $data): void {

        bdump($data);
        $this->template->data = $data;
 
       
    }



    public function actionProcessData($data)
    {
        // Zde zpracujte přijatá data
        $this->template->data = $data;
    }

}