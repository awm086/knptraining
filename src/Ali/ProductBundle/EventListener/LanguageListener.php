<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ali
 * Date: 4/15/14
 * Time: 5:39 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Ali\ProductBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Bridge\Monolog\Logger;

class LanguageListener {

    private $logger;

    function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $request->query->get('language');
        $this->logger->addInfo("In onKernelRequest");

    }
}