<?php

    class UserProfile {

        private $userId;
        private $name;
        private $rankId;

        private $settingId;
        private $languageId;
        private $numberFormatId;

        private $language;
        private $numberFormat;

        private $profilePicName;


        function __construct($userId, $name, $rankId, $settingId, $languageId, $language, $numberFormatId, $numberFormat, $profilePicName) {
            $this -> userId = $userId;
            $this -> name = $name;
            $this -> rankId = $rankId;
            $this -> settingId = $settingId;
            $this -> languageId = $languageId;
            $this -> language = $language;
            $this -> numberFormatId = $numberFormatId;
            $this -> numberFormat = $numberFormat;
            $this -> profilePicName = $profilePicName;
        }

        function getUserId() {
            return $this->userId;
        }

        function getName() {
            return $this->name;
        }

        function getSettingId() {
            return $this->settingId;
        }

        function getRankId() {
            return $this->rankId;
        }

        function getLanguageId() {
            return $this->languageId;
        }

        function getLanguage() {
            return $this->language;
        }

        function getNumberFormatId() {
            return $this->numberFormatId;
        }

        function getNumberFormat() {
            return $this->numberFormat;
        }

        function getProfilePicName() {
            return $this->profilePicName;
        }

        function setLanguageId($languageId) {
            $this -> languageId = $languageId;
        }

        function setLanguage($language) {
            $this -> language = $language;
        }

        function setNumberFormatId($numberFormatId) {
            $this -> numberFormatId = $numberFormatId;
        }

        function setNumberFormat($numberFormat) {
            $this -> numberFormat = $numberFormat;
        }

        function setProfilePicName($profilePicName) {
            $this -> profilePicName = $profilePicName;
        }

    }

?>