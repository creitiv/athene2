<?php
/**
 * Athene2 - Advanced Learning Resources Manager
 *
 * @author      Aeneas Rekkas (aeneas.rekkas@serlo.org)
 * @license     MIT License
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link        https://github.com/serlo-org/athene2 for the canonical source repository
 */
namespace Link\Entity;

use Type\Entity\TypeAwareInterface;

interface LinkInterface extends TypeAwareInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @return LinkableInterface
     */
    public function getChild();

    /**
     * @return LinkableInterface
     */
    public function getParent();

    /**
     * @param int $position
     * @return self
     */
    public function setPosition($position);

    /**
     * @param LinkableInterface $child
     * @return self
     */
    public function setChild(LinkableInterface $child);

    /**
     * @param LinkableInterface $parent
     * @return self
     */
    public function setParent(LinkableInterface $parent);
}
