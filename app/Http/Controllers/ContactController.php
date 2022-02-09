<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function confirm(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $inputs = $request;
        return view('confirm', ['form' => $inputs]);
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Contact::create($form);
        return redirect(route('thanks'));
    }
    public function thanks()
    {
        return view('thanks');
    }
    public function search(Request $request)
    {
        $keywords = $request;

        if ($keywords->input('fullname') === null && $keywords->input('gender') === null && $keywords->input('date_from') === null && $keywords->input('date_until') === null && $keywords->input('email') === null) {
            $query = Contact::query();
        } else {
            $query = Contact::query();
            if ($keywords->gender === null) {
                $query->where('fullname', 'LIKE', "%{$keywords->fullname}%");
                $query->where('email', 'LIKE', "%{$keywords->email}%");
                if ($keywords->date_from !== null && $keywords->date_until === null) {
                    $query->whereDate('created_at', '>=', $keywords->date_from);
                } elseif ($keywords->date_from === null && $keywords->date_until !== null) {
                    $query->whereDate('created_at', '<=', $keywords->date_until);
                } elseif ($keywords->date_from !== null && $keywords->date_until !== null) {
                    $query->whereDate('created_at', '>=', $keywords->date_from);
                    $query->whereDate('created_at', '<=', $keywords->date_until);
                }
            } else {
                $query->where('gender', $keywords->gender);
                $query->where('fullname', 'LIKE', "%{$keywords->fullname}%");
                $query->where('email', 'LIKE', "%{$keywords->email}%");
                if ($keywords->date_from !== null && $keywords->date_until === null) {
                    $query->whereDate('created_at', '>=', $keywords->date_from);
                } elseif ($keywords->date_from === null && $keywords->date_until !== null) {
                    $query->whereDate('created_at', '<=', $keywords->date_until);
                } elseif ($keywords->date_from !== null && $keywords->date_until !== null) {
                    $query->whereDate('created_at', '>=', $keywords->date_from);
                    $query->whereDate('created_at', '<=', $keywords->date_until);
                }
            }
        }
        $items = $query->Paginate(10);
        return view('admin')->with(['items' => $items, 'keywords' => $keywords]);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect(route('admin'));
    }
}
