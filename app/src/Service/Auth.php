<?php

namespace App\Service;

use Zend\Stdlib\ArrayObject;
use App\Entity\Sectionks\User as UserEntity;

class Auth
{
    protected ?UserEntity $user = null;

    public function extractDataFromJson(string $data)
    {
        $activeData = \json_decode($data);
        $userData = $activeData->user;
        $organization = $activeData->organization;
        $this->user = new UserEntity();
        $this->user->setId($userData->id);
        $this->user->setFullName($userData->fullName ?? '');
        $this->user->setLastName($userData->lastName ?? '');
        $this->user->setFirstName($userData->firstName ?? '');
        $this->user->setMiddleName($userData->middleName ?? '');
    }

    public function generateDefaultData()
    {
        $input = array('data' => '{"organization":{"id":297,"inn":"4444444414","kpp":"444444414","ogrn":"9999999999914","guid":"E959425D-6515-D43F-C9AF-18889D78BACC","timezone":"+03:00","fullName":"\u041e\u0410\u041e \"\u0410\u0442\u043e\u043c\u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\"","shortName":"\u041e\u0410\u041e \"\u0410\u0442\u043e\u043c\u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\"","organizationTypeTitle":"\u0417\u0430\u043a\u0430\u0437\u0447\u0438\u043a \u043f\u043e 223-\u0424\u0417","accreditationEndDateTime":null},"user":{"id":229,"fullName":"\u042e\u0440\u0430\u043d\u043e\u0432\u0430 \u0410\u043d\u043d\u0430 \u041f\u0430\u0432\u043b\u043e\u0432\u043d\u0430","lastName":"\u042e\u0440\u0430\u043d\u043e\u0432\u0430","middleName":"\u041f\u0430\u0432\u043b\u043e\u0432\u043d\u0430","firstName":"\u0410\u043d\u043d\u0430","certificateSerial":"7C:00:00:83:A0:79:C2:C1:BA:31:02:A9:DE:00:01:00:00:83:A0","canMakeOffer":false}}');

        $_SESSION['__ZF'] = new ArrayObject(['_REQUEST_ACCESS_TIME' => '1587398254.200073957443'], 2);
        $_SESSION['initialized'] = new ArrayObject(['init' => 1], 2);
        $_SESSION['activeUserData'] = new ArrayObject($input, 2);
        $_SESSION['Zend_Auth'] = new ArrayObject(array('storage' => 18138), 2);
        $_SESSION['authType'] = new ArrayObject(array('type' => ''), 2);
    }

    public function isAuth(): bool
    {
        return $this->user ? true : false;
    }

    public function isGuest(): bool
    {
        return $this->user ? false : true;
    }

    public function user(): ?UserEntity
    {
        return $this->user;
    }

    //@TODO сделать автоматическое заполнение организации и мемберс для пользователя
}