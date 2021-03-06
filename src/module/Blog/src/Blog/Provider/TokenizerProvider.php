<?php
/**
 * Athene2 - Advanced Learning Resources Manager
 *
 * @author      Aeneas Rekkas (aeneas.rekkas@serlo.org)
 * @license     MIT License
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link        https://github.com/serlo-org/athene2 for the canonical source repository
 */
namespace Blog\Provider;

use Blog\Entity\PostInterface;
use Blog\Exception;
use Token\Provider\AbstractProvider;
use Token\Provider\ProviderInterface;

class TokenizerProvider extends AbstractProvider implements ProviderInterface
{
    public function getData()
    {
        return [
            'title' => $this->getObject()->getTitle(),
            'blog'  => $this->getObject()->getBlog()->getName(),
            'id'    => $this->getObject()->getId()
        ];
    }

    protected function validObject($object)
    {
        if (!$object instanceof PostInterface) {
            throw new Exception\InvalidArgumentException(sprintf(
                'Expected PostInterface but got `%s`',
                get_class($object)
            ));
        }
    }
}
