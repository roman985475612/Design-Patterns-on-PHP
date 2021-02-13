<?php
namespace Decorator;


abstract class PageDecorator implements IPage
{
    public function __construct(
        protected IPage $page,
    ) {}
}