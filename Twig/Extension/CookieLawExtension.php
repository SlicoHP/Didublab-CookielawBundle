<?php

namespace Didublab\CookielawBundle\Twig\Extension;

use Didublab\CookielawBundle\Cookielaw\Cookielaw;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CookieLawExtension extends AbstractExtension
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var ContainerInterface
     */
    private $containerBuilder;

    /**
     * @var Cookielaw
     */
    private $cookielaw;

    public function __construct(Cookielaw $cookielaw, Environment $environment, ContainerInterface $containerBuilder)
    {
        $this->environment = $environment;
        $this->containerBuilder = $containerBuilder;
        $this->cookielaw = $cookielaw;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction(
                'cookie_law',
                [$this, 'renderCookieLaw'],
                ['is_safe' => ['html']]
            )
        ];
    }

    public function renderCookieLaw()
    {
        $cookie = $this->containerBuilder->get('request_stack')->getCurrentRequest()
            ->cookies->get($this->cookielaw->getCookieName());

        // cookies are accepted!
        if(isset($cookie)){return false;}

        try {
            return $this->environment->render('@DidublabCookielaw/cookielaw_template.html.twig', [
                'didublab_cookielaw_cookie_name' => $this->cookielaw->getCookieName(),
                'didublab_cookielaw_cookie_value' => $this->cookielaw->getCookieValue(),
                'didublab_cookielaw_cookie_days' => $this->cookielaw->getCookieDays(),
                'didublab_cookielaw_cookie_readmore_route' => $this->cookielaw->getCookieReadmoreRoute()
            ]);
        } catch (LoaderError $e) {
            throw new Exception($e->getMessage());
        } catch (RuntimeError $e) {
            throw new Exception($e->getMessage());
        } catch (SyntaxError $e) {
            throw new Exception($e->getMessage());
        }
    }
}