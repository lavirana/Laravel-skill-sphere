<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\App;
use App\Helpers\StringHelper;
use App\Contracts\PaymentGatewayInterface;
use App\Helpers\MathHelper;
use App\Contracts\MessageSenderInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    protected $helper, $gateway, $math, $sender;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StringHelper $helper, PaymentGatewayInterface $gateway, MathHelper $math, MessageSenderInterface $sender)
    {
        //$this->middleware('auth');
        $this->helper = $helper;
        $this->gateway = $gateway;
        $this->math = $math;
        $this->sender = $sender;

    }
    public function sum()
    {
        return $this->math->add(10, 15); // Output: 25
    }
    public function sendMessage2()
    {
        return $this->sender->send('9876543210', 'Hello Ashish!');
    }

    public function index()
    {
        $all_categories = Category::with('subcategories')->get();
        $categories = Category::with('courses')->get();
        return view('welcome', compact('all_categories','categories'));
    }

    public function check_service_provider(){
        return $this->helper->toUpper('ashish rana');
    }

    public function charge(){
        return $this->gateway->charge(500);
    }

    public function check_macro(){
        $name = collect(['ashish' , 'rana']);
        return $uppername = $name->toUpper();
    }



    public function check_macro3(){
        return Str::prefixHello('Lavi');
    }
        public function check_macro4(){
            $data = ['name' => 'Lavi', 'email' => null];
        return Arr::removeNulls($data); // ['name' => 'Lavi']
        }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        // This will broadcast the message to frontend
        broadcast(new MessageSent($message))->toOthers();
        return response()->json(['success' => true]);
    }

    public function show()
    {
        $all_categories = Category::with('subcategories')->get();
        return view('home', compact('all_categories'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $categories = Category::with(['courses' => function ($q) use ($query) {
            $q->where('title', 'like', "%$query%");
        }])->get();
        return view('search_results', compact('categories'))->render();
    }
    
}
