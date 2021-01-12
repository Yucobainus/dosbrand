<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\ProductModel;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProductRequest;

class productController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function productForm(Request $request)
    {
        $datas = $request->session()->get('adminaut');
        if (empty($datas) == false) {
            $logandpass = end($datas);
            if ($logandpass->name == "test" && $logandpass->password == "test") {
                return view('admin/addProduct');
            } else {
                return redirect()->route('show-aut');
            }
        } else {
            return redirect()->route('show-aut');
        }
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function addProduct(ProductRequest $req)
    {

        $pr = new ProductModel;

        $pr->name = $req->input("name");
        $pr->collection = $req->input("collection");
        $pr->size = $req->input("size");
        $pr->color1 = $req->input("color1");
        $pr->color2 = $req->input("color2");
        $pr->color3 = $req->input("color3");
        $pr->sheet = $req->input("sheet");
        $pr->fill = $req->input("fill");
        $pr->description = $req->input("description");
        $pr->price = $req->input("price");

        $destinationPath = 'pictures/products/';

        $fileName = $req->input('name') . "Main";
        $req->file('mainPhoto')->move($destinationPath, $fileName);
        $pr->mainPhoto = $destinationPath . $fileName;

        $images = "";
        $i = 1;
        if (empty($req->file('photo') == false)) {
            foreach ($req->file('photo') as $file) {
                $pictureName = $req->input('name') . $i;
                $file->move($destinationPath, $pictureName);
                $images .= $destinationPath . $pictureName . ";";
                $i++;
            }
            $images .= $destinationPath . $fileName;
            $pr->images = $images;
        }
        $pr->save();
        return redirect()->route('add-product');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showProductList(Request $request)
    {
        $datas = $request->session()->get('adminaut');
        if (empty($datas) == false) {
            $logandpass = end($datas);
            if ($logandpass->name == "test" && $logandpass->password == "test") {
                $pr = new ProductModel;
                return view('admin/productList', ['data' => $pr->all()]);
            } else {
                return redirect()->route('show-aut');
            }
        } else {
            return redirect()->route('show-aut');
        }


    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function productDelete($id)
    {
        ProductModel::find($id)->delete();
        return redirect()->route('admin');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function productUpdate($id, Request $request)
    {
        $datas = $request->session()->get('adminaut');
        if (empty($datas) == false) {
            $logandpass = end($datas);
            if ($logandpass->name == "test" && $logandpass->password == "test") {
                $product = new ProductModel;
                return view('admin/productUpdate', ['data' => $product->find($id)]);
            } else {
                return redirect()->route('show-aut');
            }
        } else {
            return redirect()->route('show-aut');
        }
    }

    public function updatePr($id, Request $req)
    {
        $pr = ProductModel::find($id);
        $pr->name = $req->input("name");
        $pr->collection = $req->input("collection");
        $pr->size = $req->input("size");
        $pr->color = $req->input("color");
        $pr->sheet = $req->input("sheet");
        $pr->fill = $req->input("fill");
        $pr->description = $req->input("description");
        $pr->price = $req->input("price");

//        $destinationPath = 'pictures/products/photo/';
//        $fileName = $req->file('photo1')->getClientOriginalName();
//        $req->file('photo1')->move($destinationPath, $fileName);
//        $pr->photo1 = $destinationPath . $fileName;
//
//        $destinationPath = 'pictures/products/photo/';
//        $fileName = $req->file('photo2')->getClientOriginalName();
//        $req->file('photo2')->move($destinationPath, $fileName);
//        $pr->photo2 = $destinationPath . $fileName;
//
//        $destinationPath = 'pictures/products/photo/';
//        $fileName = $req->file('photo3')->getClientOriginalName();
//        $req->file('photo3')->move($destinationPath, $fileName);
//        $pr->photo3 = $destinationPath . $fileName;
//
//        $destinationPath = 'pictures/products/';
//        $fileName = $req->file('photo4')->getClientOriginalName();
//        $req->file('photo4')->move($destinationPath, $fileName);
//        $pr->photo4 = $destinationPath . $fileName;


        $pr->save();
        return redirect()->route('admin');
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addToCart(Request $req)
    {
        $this->validate($req, ['color' => 'required', 'size' => 'required']);
        $sess = $req->session()->get('cart');
        $count = 0;
        if (empty($sess) == false) {
            foreach ($sess as $el) {
                if ($el->id == $req->id) {
                    $count++;
                }
            }
        }
        if ($count == 0) {
            $req->session()->push("cart", (object)["id" => $req->id, "color" => $req->color, "size" => $req->size, "name" => $req->name, "photo" => $req->photo, "price" => $req->price, "count" => $req->count]);
            return response()->json(['success' => 'Товар успешно добавлен в корзину!']);
        } else {
            return response()->json(['success' => 'Вы уже добавили этот товар.']);
        }

    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmOrder(Request $req)
    {
        $promocodes = Promo::all();
        $deleted = $req->deleted;
        $session = $req->session()->get('cart');

        $this->validate($req, ['name' => 'required', 'phone' => 'required|numeric']);

        $keys = array();

        if (empty($deleted) == false) {

            for ($i = 0; $i < sizeof($deleted); $i++) {
                for ($j = 0; $j < sizeof($session); $j++) {
                    if ($deleted[$i] == $session[$j]->id) {
                        array_push($keys, $session[$j]);
                    }
                }
            }


            $diffCart = array_udiff($session, $keys, function ($obj_a, $obj_b) {
                return $obj_a->id - $obj_b->id;
            });

            $filteredCart = array();

            foreach ($diffCart as $el) {
                array_push($filteredCart, $el);
            }
        } else {
            $filteredCart = $session;
        }


        $allPrice = 0;
        foreach ($filteredCart as $el) {
            $allPrice = $allPrice + ((int)$el->price * (int)$el->count);
        }

        $promoc = 0;

        foreach ($promocodes as $el) {
            if ($el->name == $req->promo) {
                $promoc = $el->promo;
            }
        }

        $promoc = ($allPrice * $promoc) / 100;

        $priceWithPromo = $allPrice - $promoc;

        $email = "";
        if (empty($filteredCart) == false) {
            for ($i = 0; $i < sizeof($filteredCart); $i++) {
                $email = $email . $filteredCart[$i]->name . " в колличестве" . $filteredCart[$i]->count . " , размеры " . $filteredCart[$i]->size . ", цвета " . $filteredCart[$i]->color . "\n";
            }
            Mail::send(['text' => 'email'], ['name' => $req->name, 'phone' => $req->phone, 'tg' => $req->telegram, 'priceWithPromo' => $priceWithPromo, 'price' => $allPrice, "email" => $email], function ($message) {
                $message->to('dosconnection@gmail.com', 'DOSBRAND')->subject('Новый заказ!');
                $message->from('dosconnection@gmail.com', 'Dosbrand');
            });
            $message = "Сообщение отправлено!";
        } else {
            $message = "Всё отчистилось!";
        }
        $req->session()->forget('cart');
        return response()->json(['data' => $message]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function promoForm(Request $request)
    {

        $datas = $request->session()->get('adminaut');
        if (empty($datas) == false) {
            $logandpass = end($datas);
            if ($logandpass->name == "test" && $logandpass->password == "test") {
                return view('admin.promo');
            } else {
                return redirect()->route('show-aut');
            }
        } else {
            return redirect()->route('show-aut');
        }


    }

    /**
     * @param AddToCartRequest $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addPromo(AddToCartRequest $req)
    {
        $promo = new Promo;
        $promo->name = $req->name;
        $promo->promo = $req->sale;
        $promo->save();
        return redirect()->route('admin');
    }


}
