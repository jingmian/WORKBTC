<?php

/**
 * 
 */
class WebApplication extends CBehavior {

    private $__name;

    public function getName() {
        return $this->__name;
    }

    public function runEnd($name) {
        $this->__name = $name;
        $this->onRunEnd = array(&$this, 'changePath');
        $this->onRunEnd(new CEvent($this->owner));
        $this->owner->run();
    }

    public function onRunEnd(CEvent $event) {
        $this->raiseEvent('onRunEnd', $event);
    }

    public function changePath(CEvent $event) {
        $event->sender->controllerPath .= DIRECTORY_SEPARATOR . $this->getName();
        $event->sender->viewPath .= DIRECTORY_SEPARATOR . $this->getName();
    }

}

?>