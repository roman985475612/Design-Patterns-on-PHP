<?php
namespace Strategy;

abstract class BaseSave implements IFileSaver
{
    public function __construct(
        protected string $filepath,
    ) {}
}