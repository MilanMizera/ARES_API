<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Extensions\Ares\Ares;

final class JsFormPresenter extends Nette\Application\UI\Presenter
{

    public function __construct(
        private Ares $ares

    ) {
    }

    public function actionData( string $ico): void
    {
        $data = $this->ares->provideData( $ico);

        $this->sendJson($data);
    }


    public function renderjsForm()

    {
    }








}




