<?php

namespace Didublab\CookielawBundle\Cookielaw;

use Symfony\Component\DependencyInjection\ContainerInterface;


class Cookielaw
{
    /**
     * @var ContainerInterface
     */
    private $container;

    private $cookieName;
    private $cookieValue;
    private $cookieDays;
    private $cookieReadmoreRoute;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->cookieName = $this->container->getParameter('didublab_cookielaw.cookie_name');
        $this->cookieValue = $this->container->getParameter('didublab_cookielaw.cookie_value');
        $this->cookieDays = $this->container->getParameter('didublab_cookielaw.cookie_days');
        $this->cookieReadmoreRoute = $this->container->getParameter('didublab_cookielaw.cookie_readmore_route');
    }

    /**
     * @return mixed
     */
    public function getCookieName()
    {
        return $this->cookieName;
    }

    /**
     * @return mixed
     */
    public function getCookieValue()
    {
        return $this->cookieValue;
    }

    /**
     * @return mixed
     */
    public function getCookieDays()
    {
        return $this->cookieDays;
    }

    /**
     * @return mixed
     */
    public function getCookieReadmoreRoute()
    {
        return $this->cookieReadmoreRoute;
    }

}