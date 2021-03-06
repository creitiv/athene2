<?php
/**
 * Athene2 - Advanced Learning Resources Manager
 *
 * @author      Aeneas Rekkas (aeneas.rekkas@serlo.org)
 * @license     MIT License
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link        https://github.com/serlo-org/athene2 for the canonical source repository
 */
namespace Term\Entity;

interface TermEntityAwareInterface
{

    /**
     * @param TermEntityInterface $term
     * @return self
     */
    public function setTerm(TermEntityInterface $term);

    /**
     * @return TermTermEntityInterfaceModelInterface
     */
    public function getTerm();
}
