<?php

    class AccountInfo
    {
        private $html;

        function __construct($html)
        {
            $this->html = $html;
        }

        public function getHTML()
        {
            return $this->html;
        }
    }

?>