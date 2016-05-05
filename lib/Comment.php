<?php
/**
 * \Shopify\Comment
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/comment
 */
namespace Shopify;

class Comment extends AbstractObject
{
    protected static $classUrl = 'comments';
    protected static $handle = 'comment';

    public function approve()
    {
        if(self::call(static::$classUrl.'/'.$id.'/approve' , 'POST'))
        {
            $this->status = 'approved';
            return TRUE;
        }
        return FALSE;
    }

    public function spam()
    {
        if(self::call(static::$classUrl.'/'.$id.'/spam' , 'POST'))
        {
            $this->status = 'spam';
            return TRUE;
        }
        return FALSE;
    }

    public function not_spam()
    {
        if(self::call(static::$classUrl.'/'.$id.'/not_spam' , 'POST'))
        {
            $this->status = 'published';
            return TRUE;
        }
        return FALSE;
    }

    public function remove()
    {
        if(self::call(static::$classUrl.'/'.$id.'/remove' , 'POST'))
        {
            $this->status = 'removed';
            return TRUE;
        }
        return FALSE;
    }

    public function restore()
    {
        if(self::call(static::$classUrl.'/'.$id.'/restore' , 'POST'))
        {
            $this->status = 'published';
            return TRUE;
        }
        return FALSE;
    }
}
