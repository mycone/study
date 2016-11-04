<?php
/**
 * 观察者模式示例
 * @author ChenHao <dzswchenhao@126.com>
 * @since 1.0
 */

abstract class IServer {
    private $_Observer;
    public function __construct(IObject $Object) {
        $this->_Observer = $Object;
    }
    public function trigger() {
        $this->_Observer->doSomething($this);
    }
}

class Server extends IServer {
    
}

interface IObject {
    public function doSomething($obj);
}

class Object implements IObject {
    private $_IObject;
    public function addIObject(Event $event) {
        $this->_IObject[] = $event;
    }
    public function doSomething($obj) {
        echo get_class($obj).PHP_EOL;
        foreach ($this->_IObject as $event) {
            $event->run();
        }
    }
}

interface Event {
    public function run();
}

class Log implements Event {
    public function run() {
        //write log
        echo 'Write log'.PHP_EOL;
    }
}

class Notice implements Event {
    public function run() {
        //Notice message
        echo 'Notice message'.PHP_EOL;
    }
}

$object = new Object();
$object->addIObject(new Log());
$object->addIObject(new Notice());

$server = new Server($object);
$server->trigger();

//Run Response
//
//Server
//Write log
//Notice message

//2016-11-04 10:28
