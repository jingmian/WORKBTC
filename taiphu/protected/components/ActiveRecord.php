<?php

/**
 * ActiveRecord All active model should be extends from this base class.
 */
class ActiveRecord extends CActiveRecord {

    /**
     * This function will be call before save record into database
     */
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                if (property_exists(get_called_class(), 'created_date')) {
                    $this->created_date = date('Y-m-d h:i:s', time());
                }
            }
            if (property_exists(get_called_class(), 'updated_date')) {
                $this->updated_date = date('Y-m-d h:i:s', time());
            }
        }
        return true;
    }

}

?>