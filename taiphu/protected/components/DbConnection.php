<?php

class DbConnection extends CDbConnection {

    public function createPdoInstance() {
        // Decrypt the password used in config file
        $this->password = mydecrypt($this->password);
        return parent::createPdoInstance();
    }

}

?>