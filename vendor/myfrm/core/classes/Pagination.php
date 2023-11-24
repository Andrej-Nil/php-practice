<?php

namespace myfrm;

class Pagination
{
    public int $count_pages = 1;
    public int $current_pages = 1;
    public string $uri = '';
    public int $mid_size = 2;
    public int $all_pages = 7;


    public function __construct(
        public int $page = 1,
        public int $per_page = 1,
        public int $total = 1
    )
    {

    }
}