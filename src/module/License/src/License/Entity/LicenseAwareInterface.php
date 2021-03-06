<?php
/**
 * Athene2 - Advanced Learning Resources Manager
 *
 * @author      Aeneas Rekkas (aeneas.rekkas@serlo.org)
 * @license     MIT License
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link        https://github.com/serlo-org/athene2 for the canonical source repository
 */
namespace License\Entity;

interface LicenseAwareInterface
{
    /**
     * @param LicenseInterface $license
     * @return self
     */
    public function setLicense(LicenseInterface $license);

    /**
     * @return LicenseInterface
     */
    public function getLicense();
}
