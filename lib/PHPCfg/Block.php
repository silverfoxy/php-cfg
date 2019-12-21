<?php

declare(strict_types=1);

/**
 * This file is part of PHP-CFG, a Control flow graph implementation for PHP
 *
 * @copyright 2015 Anthony Ferrara. All rights reserved
 * @license MIT See LICENSE at the root of the project for more info
 */

namespace PHPCfg;

class Block
{
    /** @var int */
    public $blockId;
    /** @var Op[] */
    public $children = [];

    /** @var Block[] */
    public $parents = [];

    /** @var Op\Phi[] */
    public $phi = [];

    public $dead = false;

    // flag that represents if the block has been covered
    public $covered = false;

    public function __construct(self $parent = null, $blockId = -1)
    {
        $this->blockId = $blockId;
        if ($parent) {
            $this->parents[] = $parent;
        }
    }

    public function create()
    {
        return new static();
    }

    public function addParent(self $parent)
    {
        if (! in_array($parent, $this->parents, true)) {
            $this->parents[] = $parent;
        }
    }
}
