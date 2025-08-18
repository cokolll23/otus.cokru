<?php
use Bitrix\Main\Loader;
use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Page\Asset;
use \Bitrix\Crm\Service\Container;

if (file_exists(__DIR__ . '/../app/autoloader.php')) {
    require_once __DIR__ . '/../app/autoloader.php';
}

$eventManager = \Bitrix\Main\EventManager::getInstance();

//CUtil::InitJSCore(array('jquery3', 'popup', 'ajax', 'date'));
\Bitrix\Main\UI\Extension::load('lab_js_ext.get_deals_click_event');

// Добавить таб в карточку контакта
$eventManager->addEventHandler('crm', 'onEntityDetailsTabsInitialized',['EventsHandlers\onEntityDetailsTabsInitializedHandler','onEntityDetailsTabsInitializedHandler']);

