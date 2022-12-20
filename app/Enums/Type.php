<?php

namespace App\Enums;

enum Type: string
{
    case Student = "student";
    case Teacher = "teacher";
    case Admin = "admin";
}
