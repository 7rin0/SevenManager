<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\CommentBundle\Entity\BaseComment as BaseComment;

/**
* @ORM\Entity
* @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
*/
class Comment extends BaseComment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Thread of this comment
     *
     * @var Thread
     * @ORM\ManyToOne(targetEntity="Application\Sonata\CommentBundle\Entity\Thread")
     */
    protected $thread;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
