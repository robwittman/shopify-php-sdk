<?php
/**
 *
 * Shopify\Object\GiftCard
 *
 * A gift card is a an alternative payment method, and has a code which is entered
 * during checkout. It has a balance which can be redeemed over multiple checkouts,
 * and can be assigned to a specific customer (optional). Gift card codes cannot
 * be retrieved once created – only the last four digits can be retrieved.
 *
 * MIT License
 *
 * Copyright (c) Rob Wittman 2016
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
 *
 * @package Shopify
 * @author Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/gift_card
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class GiftCard extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * A unique numeric identifier of the application that issued the gift card
     * (if it was issued by an application).
     * @var string
     */
    protected $api_client_id;

    /**
     * A unique numeric identifier of the user that issued the gift card (if it was issued by a user).
     * @var integer
     */
    protected $user_id;

    /**
     * A unique numeric identifier of the order that caused the creation of this
     * gift card (if it was created by an order).
     * @var integer
     */
    protected $order_id;

    /**
     * A unique numeric identifier of the line_item that caused the creation of
     * this gift card (if it was created by an order).
     * @var string
     */
    protected $line_item_id;

    /**
     * The balance of the gift card.
     * @var float
     */
    protected $balance;

    /**
     * The currency of the gift card.
     * @var string
     */
    protected $currency;

    /**
     * The gift card code which consists of a minimum of 8 alphanumeric characters.
     * For security reasons, this is only available upon creation of the gift card.
     * @var string
     */
    protected $code;

    /**
     * The last four characters of the gift card code. Because gift cards are
     * alternate payment methods, the full code cannot be retrieved.
     * @var string
     */
    protected $last_characters;

    /**
     * The text of an optional note that a shop owner can attach to the gift card. Not visible to merchants.
     * @var string
     */
    protected $note;

    /**
     * When specified, the gift card will be rendered using gift_card.SUFFIX.liquid
     * instead of gift_card.liquid.
     * @var string
     */
    protected $template_suffix;

    /**
     * The date and time when the gift card was disabled. The API returns this value in ISO 8601 format.
     * @var string
     */
    protected $disabled_at;

    /**
     * The date and time when the gift card expires. The format must be YYYY-MM-DD.
     * @var string
     */
    protected $expires_on;

    public function getApiClientId()
    {
        return $this->get('api_client_id');
    }

    public function setApiClientId($api_client_id)
    {
        $this->set('api_client_id', $api_client_id);
        return $this;
    }

    public function getUserId()
    {
        return $this->get('user_id');
    }

    public function setUserId($user_id)
    {
        $this->set('user_id', $user_id);
        return $this;
    }

    public function getOrderId()
    {
        return $this->get('order_id');
    }

    public function setOrderId($order_id)
    {
        $this->set('order_id', $order_id);
        return $this;
    }

    public function getLineItemId()
    {
        return $this->get('line_item_id');
    }

    public function setLineItemId($line_item_id)
    {
        $this->set('line_item_id', $line_item_id);
        return $this;
    }

    public function getBalance()
    {
        return $this->get('balance');
    }

    public function setBalance($balance)
    {
        $this->set('balance', $balance);
        return $this;
    }

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function setCurrency($currency)
    {
        $this->set('currency', $currency);
        return $this;
    }

    public function getCode()
    {
        return $this->get('code');
    }

    public function setCode($code)
    {
        $this->set('code', $code);
        return $this;
    }

    public function getLastCharacters()
    {
        return $this->get('last_characters');
    }

    public function setLastCharacters($last_characters)
    {
        $this->set('last_characters', $last_characters);
        return $this;
    }

    public function getNote()
    {
        return $this->get('note');
    }

    public function setNote($note)
    {
        $this->set('note', $note);
        return $this;
    }

    public function getTemplateSuffix()
    {
        return $this->get('template_suffix');
    }

    public function setTemplateSuffix($template_suffix)
    {
        $this->set('template_suffix', $template_suffix);
        return $this;
    }

    public function getDisabledAt()
    {
        return $this->get('disabled_at');
    }

    public function setDisabledAt($disabled_at)
    {
        $this->set('disabled_at', $disabled_at);
        return $this;
    }

    public function getExpiresOn()
    {
        return $this->get('expires_on');
    }

    public function setExpiresOn($expires_on)
    {
        $this->set('expires_on', $expires_on);
        return $this;
    }
}
