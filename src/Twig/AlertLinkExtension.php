<?php

namespace App\Twig;

use ArrayObject;
use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AlertLinkExtension extends AbstractExtension
{

    public function __construct(
        protected RouterInterface $router
    )
    {
    }

    public function getFilters()
    {
        return [
            new TwigFilter('alertLink', [$this, 'alertLink'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function alertLink(string $text): string
    {
        $ret = preg_replace_callback("/(app_[\w_]+)(?:\{(?:(\w)+=(\w)(?:,(\w)+=(\w))*)?})?(?:\[(\w*)])?/u", function($matches) {
            $obj = new ArrayObject($matches);
            $it = $obj->getIterator();

            $it->next();
            $route = $it->current();
            $it->next();

            $params = [];
            $linkText = null;

            $i = 2;

            while( $it->valid() )
            {
                $key = $it->current();
                $it->next();
                $val = $it->current();

                if ($it->count() % 2 == 1 && $i+1 === $it->count()) {
                    $linkText = $key;
                    break;
                }

                if (!empty($key)) {
                    $params = [$key => $val];
                }

                $it->next();

                $i += 2;
            }





            $url = $this->router->generate($route, $params);

            $linkText = htmlspecialchars($linkText ?? $url);

            return "<a href='$url'>$linkText</a>";

        }, $text);

        return $ret;
    }
}