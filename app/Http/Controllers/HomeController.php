<?php

namespace App\Http\Controllers;

use App\Mail\SentInvoice;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate(2);
        $orders_by_user = Order::where('user_id', Auth::id())->get();
        return view('home', compact('users', 'orders_by_user'));
    }
    public function userinsert(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'created_at' => Carbon::now()
        ]);

        return back()->with('user_status', 'User Added Successfully');
    }

    public function downloadinvoice($id)
    {
        $data = Order::find($id);
        $order_details = OrderDetails::where('order_id', $id)->get();
        $pdf = Pdf::loadView('pdf.invoice', compact('data', 'order_details'));
        return $pdf->download('invoice.pdf');
    }
    public function sendinvoice($id)
    {
        Mail::to(Auth::user()->email)->send(new SentInvoice($id));
    }
}
