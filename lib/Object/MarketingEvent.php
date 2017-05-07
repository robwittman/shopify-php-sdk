<?php
/**
 *
 * Shopify\Object\MarketingEvent
 *
 * Marketing events represent actions taken by your app, on behalf of a merchant,
 * to market products, collections, discounts, pages, blog posts, the homepage, etc.
 *
 * Marketing events should represent actions that target multiple potential customers,
 * because they’re intended to aggregate traffic, etc. For example, if your app
 * sends emails to customers, do not create a different marketing event for each
 * individual who is emailed; create a marketing event for a related set of emails.
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
 */

namespace Shopify\Object;

class MarketingEvent extends AbstractObject
{
    public static function getApiHandle()
    {
        return 'marketing_events';
    }

    /**
     * The specific type of marketing event. Must be one of the allowed values
     * ('ad', 'post', 'message', 'seo', 'sem', 'transaction', 'affiliate', 'loyalty').
     * @var string
     */
    protected $event_type;

    /**
     * A broader marketing event type that is focused only on the channel.
     * Must be one of the allowed values ("search", "display", "social", "email", "referral", "conversational").
     * @var string
     */
    protected $marketing_channel;

    /**
     * A boolean field to specify whether this event is paid or organic.
     * @var boolean
     */
    protected $paid;

    /**
     * The destination domain of the marketing event.
     * Required unless marketing_channel is one of email/referral/conversational/display.
     * @var string
     */
    protected $referring_domain;

    /**
     * The budget of the ad campaign.
     * @var float
     */
    protected $budget;

    /**
     * The currency for the budget.
     * @var string
     */
    protected $currency;

    /**
     * The type of the budget; must be either “daily” or “lifetime”.
     * @var string
     */
    protected $budget_type;

    /**
     * The timestamp when the marketing action was started, or when the email was sent,0
     *  or when the Facebook post was made live, etc.
     * @var string
     */
    protected $started_at;

    /**
     * For events with a duration, when the event was supposed to end.
     * @var string
     */
    protected $scheduled_to_end_at;

    /**
     * For events with a duration, when the event actually ended. This may differ
     * from “scheduled_to_end_at”, if the ad was stopped early, etc.
     * @var string
     */
    protected $ended_at;

    /**
     * The UTM parameters used in the links provided in the marketing event.
     * @var string
     */
    protected $utm_parameters;

    /**
     * A human-readable description of the marketing event
     * @var string
     */
    protected $description;

    /**
     * A link to manage the marketing event, generally in the Shopify app’s interface.
     * @var string
     */
    protected $manage_url;

    /**
     * A link to view the live version of the post/ad, or to view a rendered
     * preview of the post/ad/email in the Shopify app.
     * @var string
     */
    protected $preview_url;

    /**
     * A list of the items that were marketed in the marketing event. It’s a list
     * of dictionaries with type keys and id keys.
     * @var string
     */
    protected $marketed_resources;

    public function getEventType()
    {
        return $this->get('event_type');
    }

    public function setEventType($event_type)
    {
        $this->set('event_type', $event_type);
        return $this;
    }

    public function getMarketingChannel()
    {
        return $this->get('marketing_channel');
    }

    public function setMarketingChannel($marketing_channel)
    {
        $this->set('marketing_channel', $marketing_channel);
        return $this;
    }

    public function getPaid()
    {
        return $this->get('paid');
    }

    public function setPaid($paid)
    {
        $this->set('paid', $paid);
        return $this;
    }

    public function getReferringDomain()
    {
        return $this->get('referring_domain');
    }

    public function setReferringDomain($referring_domain)
    {
        $this->set('referring_domain', $referring_domain);
        return $this;
    }

    public function getBudget()
    {
        return $this->get('budget');
    }

    public function setBudget($budget)
    {
        $this->set('budget', $budget);
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

    public function getBudgetType()
    {
        return $this->get('budget_type');
    }

    public function setBudgetType($budget_type)
    {
        $this->set('budget_type', $budget_type);
        return $this;
    }

    public function getStaredAt()
    {
        return $this->get('started_at');
    }

    public function setStaredAt($started_at)
    {
        $this->set('started_at', $started_at);
        return $this;
    }

    public function getScheduledToEndAt()
    {
        return $this->get('scheduled_to_end_at');
    }

    public function setScheduledToEndAt($scheduled_to_end_at)
    {
        $this->set('scheduled_to_end_at', $scheduled_to_end_at);
        return $this;
    }

    public function getEndedAt()
    {
        return $this->get('ended_at');
    }

    public function setEndedAt($ended_at)
    {
        $this->set('ended_at', $ended_at);
        return $this;
    }

    public function getUtmParameters()
    {
        return $this->get('utm_parameters');
    }

    public function setUtmParameters($utm_parameters)
    {
        $this->set('utm_parameters', $utm_parameters);
        return $this;
    }

    public function getDescription()
    {
        return $this->get('description');
    }

    public function setDescription($description)
    {
        $this->set('description', $description);
        return $this;
    }

    public function getManageUrl()
    {
        return $this->get('manage_url');
    }

    public function setManageUrl($manage_url)
    {
        $this->set('manage_url', $manage_url);
        return $this;
    }

    public function getPreviewUrl()
    {
        return $this->get('preview_url');
    }

    public function setPreviewUrl($preview_url)
    {
        $this->set('preview_url', $preview_url);
        return $this;
    }

    public function getMarketedResources()
    {
        return $this->get('marketed_resources');
    }

    public function setMarketedResources($marketed_resources)
    {
        $this->set('marketed_resources', $marketed_resources);
        return $this;
    }

}
