<?php

namespace App\EventSubscriber;

use App\Repository\GlobalsRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;


    /**
     * @var GlobalsRepository
     */
    private $catrepository;

    public function __construct(Environment $twig, GlobalsRepository $globalsRepository)
    {
        $this->twig = $twig;
        $this->globalrepo = $globalsRepository;
    }

    public function onControllerEvent(ControllerEvent $event)
    {
        $this->twig->addGlobal('globals', $this->globalrepo->findOneBy(['id' => 1]));
    }

    public static function getSubscribedEvents()
    {
        
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
