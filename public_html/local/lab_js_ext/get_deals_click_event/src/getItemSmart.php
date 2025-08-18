<?php

use Bitrix\Crm\Service\Container;

$entityTypeId = ваш_ID_смарт-процесса; // например, 128
$itemId = ID_элемента;

$factory = Container::getInstance()->getFactory($entityTypeId);
if ($factory) {
    $item = $factory->getItem($itemId);
    if ($item) {
        $customFieldValue = $item->get('UF_CRM_XXXXXXX'); // код кастомного поля
        echo 'Значение кастомного поля: ' . $customFieldValue;

        // Альтернативно можно получить все пользовательские поля:
        $userFields = $factory->getUserFields();
        foreach ($userFields as $field) {
            $fieldName = $field['FIELD_NAME'];
            $fieldValue = $item->get($fieldName);
            echo "{$fieldName}: {$fieldValue}<br>";
        }
    }
}
