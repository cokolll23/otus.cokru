<?php

namespace EventsHandlers;

use Bitrix\Main\Loader;
use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Diag\Debug;
use Bitrix\Iblock\ElementTable;
use \Bitrix\Crm\Service\Container;
use Bitrix\Crm\DealTable;
use Bitrix\Main\Entity;

Loader::includeModule('crm');


Loader::includeModule('iblock');



class OnBeforeCrmDealAddHandler
{
    public static function OnBeforeCrmDealAddHandler(&$arFields)
    {
        // Здесь можно добавить условия, например:
        $vin = $arFields["UF_CRM_DEAL_VIN"];
        $arDeals = DealTable::getList([
            'filter' => [ '=UF_CRM_DEAL_VIN' => $vin ,
                '!=STAGE_ID' => 'WON'],
            'select' => [
                'ID',

            ],
            'order' => [],
        ])->fetchAll();

        Debug::dumpToFile($arDeals, '$arDeals ' . date('d-m-Y; H:i:s'));

        if ($arDeals && count($arDeals)>0) {
            $GLOBALS['APPLICATION']->ThrowException("Сделка не может быть создана! Проверьте заполнение полей");
            return false;
        }

        // Запрещаем добавление сделки
       /* ui-entity-section-control-error-block ui-entity-section-control-error-text
        *  $GLOBALS['APPLICATION']->ThrowException("Сделка не может быть создана! Проверьте заполнение полей");
        return false;*/


    }

}