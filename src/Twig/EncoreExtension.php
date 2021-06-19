<?php

namespace App\Twig;

use Psr\Container\ContainerInterface;
use Symfony\WebpackEncoreBundle\Asset\TagRenderer;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class EncoreExtension extends AbstractExtension
{
    public function __construct(
        private TagRenderer $tagRenderer
    ) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('script_tags', [$this, 'legacyEntry'], ['is_safe' => ['html']]),
            new TwigFunction('link_tags', [$this, 'linkEntry'], ['is_safe' => ['html']]),
        ];
    }

    public function legacyEntry($name): string
    {
        return $this->tagRenderer->renderWebpackScriptTags($name, null, 'legacy', ['nomodule' => null]) .
            $this->tagRenderer->renderWebpackScriptTags($name, null, 'modern', ['type' => 'module']);
    }

    public function linkEntry(string $name): string
    {
        return $this->tagRenderer->renderWebpackLinkTags($name, null, 'legacy');
    }
}
