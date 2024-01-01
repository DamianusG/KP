<?php 
    interface DbConnInterface {
        public function dbConnect();
        public function dbDisconnect();
    }
?>