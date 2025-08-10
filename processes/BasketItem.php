<!--
Create class for the different items that can be processed
Allow packages, flights, and hotels to be handled for account, basket, and booking processes
-->

<?php

class BasketItem {
    public $id;
    public $type;

    public function __construct($id, $type) {
        $this->id = $id;
        $this->type = $type;
    }
}

?>