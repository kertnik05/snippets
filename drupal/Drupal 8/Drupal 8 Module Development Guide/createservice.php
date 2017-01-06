<?php
//Service - an object that does work for me 
//Service Container - An object that has array of services

//Folder Structure - modulename/src/servicename/classname.php
namespace Drupal\modulename\servicefoldername;

class ServicenameGenerator {
    public function getRoar($length){
        return $length;
    }
}


//Folder Structure - modulename/src/Controller/NameController.php
namespace Drupal\modulename\Controller;
use Drupal\modulename\servicefoldername\ServicenameGenerator;

class NameController 
{
    public function functionname($variablefromurl){
        $servicenameGerator = new ServicenameGenerator();
        $roar = $servicenameGerator->getRoar($variablefromurl);
        return new Response($roar);
    }
   
}




//Folder Structure - modulename/services.yml
services:
    modulename.servicename_generator:
        class Drupal\modulename\servicefoldername\ServicenameGenerator


//Display list of services from terminal - your services is now viewable in terminal console 
//$ drupal container:debug 

//using service from container in controller
namespace Drupal\modulename\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\modulename\servicefoldername\ServicenameGenerator;

class NameController extends ControllerBase
{   
    private $somevar;

    public function __contruct(ServicenameGenerator $somevar){
        $this->somevar = $somevar;
    }

     public function functionname($variablefromurl){
        $roar = $this->somevar->getRoar($variablefromurl);
        return new Response($roar);
    }

    public static function create(ContainerInterface $container) {
     $somevar = $container->get('modulename.servicename_generator');
     return new static($somevar);
    }
   
}

//$ drupal container:debug | grep log

namespace Drupal\modulename\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\modulename\servicefoldername\ServicenameGenerator;
use Drupal\Core\Logger\LoggerChannelFactory

class NameController extends ControllerBase
{   
    private $somevar;
    private $somevarFactory;

    public function __contruct(ServicenameGenerator $somevar, LoggerChannelFactoryInterface $somevarFactory){
        $this->somevar = $somevar;
        $this->somevarFactory = $somevarFactory;
    }

     public function functionname($variablefromurl){
       
        $roar = $this->somevar->getRoar($variablefromurl);
        $this->somevarFactory->get('default')->debug($roar); // this logs it into localhost/admin/dblog

        //keyValue is a service from ControllerBase 
        $keyValueStore = $this->keyValue('somestring');
        $keyValueStore->set('roar_string',  $roar);
        $keyValueStore->get('roar_string');
        return new Response($roar);
    }

    public static function create(ContainerInterface $container) {
     $somevar = $container->get('modulename.servicename_generator');
     $somevarFactory = $container->get('logger.factory');
     return new static($somevar, $somevarFactory);
    }
   
}


//using service from container in your service
//$ drupal container:debug | grep keyvalue
//Folder Structure - modulename/src/servicename/classname.php
namespace Drupal\modulename\servicefoldername;
use Drupal\Core\KeyValueStore/KeyValueFactoryInterface;
class ServicenameGenerator {
    
    private $keyValueFactory;
    public function __contruct(KeyValueFactoryInterface $keyValueFactory){
        $this->keyValueFactory = $keyValueFactory;
    }
    public function getRoar($length){
        $key = 'roar_'.$length;
        $store = $this->keyValueFactory->get('somestring');
        if ($store->has($key)){
            return $store->get($key);
        }
        $string = $length;
        $store->set($key,$string);

        return $string;
    }
}
//Folder Structure - modulename/services.yml
services:
    modulename.servicename_generator:
        class Drupal\modulename\servicefoldername\ServicenameGenerator
        arguments: 
            - '@keyvalue'



//Add multiple parameter to service
namespace Drupal\modulename\servicefoldername;
use Drupal\Core\KeyValueStore/KeyValueFactoryInterface;
class ServicenameGenerator {
    
    private $keyValueFactory;
    public function __contruct(KeyValueFactoryInterface $keyValueFactory, $useCache){
        $this->keyValueFactory = $keyValueFactory;
    }
    public function getRoar($length){
        $key = 'roar_'.$length;
        $store = $this->keyValueFactory->get('somestring');
        if ($this->useCache && $store->has($key)){
            return $store->get($key);
        }
        $string = $length;

        if ($this->useCache){
            $store->set($key,$string); 
        }

        return $string;
    }
}

//Folder Structure - modulename/services.yml
parameters:
    modulename.use_keyvalue_cache: true

services:
    modulename.servicename_generator:
        class Drupal\modulename\servicefoldername\ServicenameGenerator
        arguments: 
            - '@keyvalue'
            - %modulename.use_keyvalue_cache%


//Override Drupal Core Services
//settings.local.php loads development.services.yml
parameters:
    modulename.use_keyvalue_cache: false
services:
  cache.backend.null:
    class: Drupal\Core\Cache\NullBackendFactory

//Folder Structure - /drupal-8/core/core.services.yml - most service are coming from this file
//Folder Structure - /drupal-8/sites/default/default.services.yml
//development.services.yml - to override /drupal-8/core/core.services.yml and default.services.yml services settings during development
