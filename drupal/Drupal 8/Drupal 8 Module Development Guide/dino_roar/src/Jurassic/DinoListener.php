<?php

namespace Drupal\dino_roar\Jurassic;

use Drupal\Core\Logger\LoggerChannelFactoryInterface; 
use Symfony\Component\EventDispatcher\EventSubscriberInterface; //Step 1: Find the Event to listen $ drupal container:debug | grep logger drupal-8/vendor/symfony/event-dispatcher/EventSubscriberInterface.php
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;  //drupal-8/vendor/symfony/http-kernel/KernelEvents.php

//Step 2.
class DinoListener implements EventSubscriberInterface
{
    private $loggerFactory;
    //LoggerChannelFactoryInterface is just an additional action added to event
    public function __construct(LoggerChannelFactoryInterface $loggerFactory)
    {
        $this->loggerFactory = $loggerFactory;
    }
    //Step 5: $event returns GetResponseEvent
    public function onKernelRequest(GetResponseEvent $event)
    {
        //var_dump($event); die;
        $request = $event->getRequest(); //from Symfony\Component\HttpKernel\KernelEvents
        $shouldRoar = $request->query->get('roar');

        if ($shouldRoar) {
            $this->loggerFactory->get('default')
                ->debug('ROOOOOOOOAR');
        }
    }


    //Step3. getSubscribedEvents From EventSubscriberInterface
    public static function getSubscribedEvents()
    {
        return [
            //Step 4:Classname::ConstantName => 'functionameyouliketocall - onKernelRequest()',
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

}