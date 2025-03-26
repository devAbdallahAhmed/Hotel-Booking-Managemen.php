<?php
use Illuminate\Support\Facades\Auth;


function admins()
{
    return Auth::guard('admin')->user()->name;
}
