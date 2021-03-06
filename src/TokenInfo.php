<?php

/**
 * Copyright (c) 2017 François Kooman <fkooman@tuxed.net>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace fkooman\OAuth\Server;

use DateTime;

class TokenInfo
{
    /** @var string */
    private $authKey;

    /** @var string */
    private $userId;

    /** @var string */
    private $scope;

    /** @var \DateTime */
    private $expiresAt;

    /** @var string|null */
    private $tokenIssuer = null;

    /**
     * @param string    $authKey
     * @param string    $userId
     * @param string    $scope
     * @param \DateTime $expiresAt
     */
    public function __construct($authKey, $userId, $scope, DateTime $expiresAt)
    {
        $this->authKey = $authKey;
        $this->userId = $userId;
        $this->scope = $scope;
        $this->expiresAt = $expiresAt;
    }

    /**
     * @param string $tokenIssuer
     *
     * @return void
     */
    public function setIssuer($tokenIssuer)
    {
        $this->tokenIssuer = $tokenIssuer;
    }

    /**
     * @return string
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return int
     */
    public function getExpiresIn(DateTime $dateTime)
    {
        return $this->expiresAt->getTimestamp() - $dateTime->getTimestamp();
    }

    /**
     * @return string|null
     */
    public function getIssuer()
    {
        return $this->tokenIssuer;
    }
}
