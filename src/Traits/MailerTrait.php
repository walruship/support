<?php
/*
 * Walruship Co.,Ltd
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the 3-clause BSD license that is
 * available through the world-wide-web at this URL:
 * https://walruship.com/LICENSE.txt
 *
 * @author          Walruship Co.,Ltd
 * @copyright       Copyright (c) 2023 Walruship
 * @link            https://walruship.com/LICENSE.txt
 */

namespace Walruship\Support\Traits;

use Walruship\Support\Mailer;

trait MailerTrait
{
    /**
     * The Mailer instance.
     *
     * @var \Walruship\Support\Mailer
     */
    protected $mailer;

    /**
     * Returns the Mailer instance.
     *
     * @return \Walruship\Support\Mailer
     */
    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     * Sets the Mailer instance.
     *
     * @param \Walruship\Support\Mailer $mailer
     *
     * @return $this
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;

        return $this;
    }
}
