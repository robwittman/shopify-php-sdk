<?php

namespace Shopify;

class CommentTest extends TestCase
{
    private $blog_id = 123456;

    public function testCommentIndex()
    {
        $comments = Comment::all(123456);
        $this->assertInstanceOf('\Shopify\Comment', $comments[0]);
    }

    public function testCommentGet()
    {
        $comment = Comment::get(1234, 123456);
        $this->assertInstanceOf('\Shopify\Comment', $comment);
    }

    public function testCommentApprove()
    {
        $comment = Comment::get(1234, 123456);
        $this->assertTrue($comment->approve());
    }

    public function testMarkCommentAsSpam()
    {
        $comment = Comment::get(1234, 123456);
        $this->assertTrue($comment->markAsSpam());
    }

    public function testUnMarkCommentAsSpam()
    {
        $comment = Comment::get(1234, 123456);
        $this->assertTrue($comment->unmarkAsSpam());
    }

    public function testRemoveComment()
    {
        $comment = Comment::get(1234, 123456);
        $this->assertTrue($comment->remove());
    }

    public function testRestoreComment()
    {
        $comment = Comment::get(1234, 123456);
        $this->assertTrue($comment->restore());
    }
}
