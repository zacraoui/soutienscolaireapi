<?php
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
class QuestionsOptionsController extends Controller
{
    public function index()
    {
        return Http::get("http://127.0.0.1:8000/api/v1/getQuestion");
    }
}
