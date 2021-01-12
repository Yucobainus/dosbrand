<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\False_;
use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home(Request $request)
    {
        $pr = new ProductModel;
        $session = $request->session()->get('cart');
        $sessionFiltered = array();
        if (empty($session) == false) {
            foreach ($session as $el) {
                array_push($sessionFiltered, $el);
            }
        }
        $sizeOfCart = sizeof($sessionFiltered);
        $allPrice = 0;
        foreach ($sessionFiltered as $el) {
            $allPrice = $allPrice + ((int)$el->price * (int)$el->count);
        }
        return view('home', ['prod' => $pr->all(), 'session' => $sessionFiltered, 'cartSize' => $sizeOfCart, 'allPrice' => $allPrice]);
    }

    public function showProduct(Request $request, $id)
    {
        $pr = new ProductModel;

        $session = $request->session()->get('cart');
        $sessionFiltered = array();
        if (empty($session) == false) {
            foreach ($session as $el) {
                array_push($sessionFiltered, $el);
            }
        }
        $sizeOfCart = sizeof($sessionFiltered);
        $allPrice = 0;
        foreach ($sessionFiltered as $el) {
            $allPrice = $allPrice + ((int)$el->price * (int)$el->count);
        }
        return view('block/product', ['product' => $pr->find($id), 'session' => $sessionFiltered, 'cartSize' => $sizeOfCart, 'allPrice' => $allPrice]);
    }


    public function showAut()
    {
        return view('admin.aut');
    }

    public function showAdmin(Request $request)
    {
        $datas = $request->session()->get('adminaut');
        if (empty($datas) == false) {
            $logandpass = end($datas);
            if ($logandpass->name == "test" && $logandpass->password == "test") {
                return view('admin.admin');
            } else {
                return redirect()->route('show-aut');
            }
        } else {
            return redirect()->route('show-aut');
        }
    }

    public function adminAut(Request $req)
    {
        $name = $req->login;
        $password = $req->pass;
        if ($name = "test" && $password = "test") {
            $req->session()->push("adminaut", (object)['name' => $req->login, 'password' => $req->pass]);
            return redirect()->route('admin');
        } else {
            return view('admin.aut');
        }
    }

}
