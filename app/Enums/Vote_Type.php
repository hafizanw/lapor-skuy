<?php

namespace App\Enums;

enum Vote_Type: string
{
    case Upvote   = 'upvote';
    case Downvote = 'downvote';
}
