<?php
/**
 * \Shopify\Comment
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/comment
 */
namespace Shopify;

use Shopify\Fields\CommentStatuses;

class Comment extends AbstractObject
{
    protected static $classUrl = 'comments';
    protected static $classHandle = 'comment';

    public function approve()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/approve' , 'POST', array('comment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function markAsSpam()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/spam' , 'POST', array('comment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function unmarkAsSpam()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/not_spam' , 'POST', array('comment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function remove()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/remove' , 'POST', array('comment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function restore()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/restore' , 'POST', array('comment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }
}
