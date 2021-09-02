<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class TopicsController extends Controller
{
    public function index()
    {
        return Http::get("http://127.0.0.1:8000/api/v1/gettopics");
    }

}
