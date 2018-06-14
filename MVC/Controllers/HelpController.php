<?php
namespace Controllers;

use Libs\Controller;


class HelpController extends Controller
{
    public function __construct()
    {
        echo "We are in HelpController";
    }

    public function index()
    {
       echo "OK bro";
    }
}