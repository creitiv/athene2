<?php
/**
 * Athene2 - Advanced Learning Resources Manager
 *
 * @author    Aeneas Rekkas (aeneas.rekkas@serlo.org)
 * @license   LGPL-3.0
 * @license   http://opensource.org/licenses/LGPL-3.0 The GNU Lesser General Public License, version 3.0
 * @link      https://github.com/serlo-org/athene2 for the canonical source repository
 * @copyright Copyright (c) 2013-2014 Gesellschaft für freie Bildung e.V. (http://www.open-education.eu/)
 */
namespace Ui\Factory;

use Ui\Renderer\PhpDebugRenderer;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PhpDebugRenderFactory implements FactoryInterface {
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new PhpDebugRenderer();
        $service->setResolver($serviceLocator->get('Zend\View\Resolver\AggregateResolver'));
        $service->setHelperPluginManager($serviceLocator->get('ViewHelperManager'));
        return $service;
    }
}
