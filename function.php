<?php

    function userConnected() {

        if(isset($_SESSION["member"])) {
            return true;
        }

        return false;
        }

?>