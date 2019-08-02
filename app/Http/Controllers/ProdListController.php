<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Classlist;
use App\Product;
use DB;
use Illuminate\Support\Facades\Storage;

class ProdListController extends Controller
{


    public function showList(Request $req)
    {
        $classId = $req->get('class_id');
        $classes = Classlist::all();

        if ($classId != null) {
            $prods = Product::with('classlist')->where('class_id', $classId )->paginate(6);
            $prods->appends(['class_id' => $classId])->links();
            return view('prodlist.table', ['prods' => $prods, 'classes' => $classes]);
        }
        $prods = Product::with('classlist')->paginate(6);
        return view('prodlist.table', ['prods' => $prods, 'classes' => $classes]);



    }


    public function delete(Request $req)
    {
        $prod = Product::find($req->get('id'));


        //Storage::disk('public')->delete($prod->image);
        Storage::delete($prod->image);
        $prod ->delete();

        return redirect('table');

    }
    public function showFullPage($id)
    {


        $prod = Product::find($id);
        return view('prodlist.fullprodpage', compact('prod'));
    }
    public function imgIsValid($image)
    {
        if (in_array($image->getClientOriginalExtension(), ['png', 'jpg', 'jpeg', 'bmp', 'gif']) and $image->getSize() < 8388608) {
            return true;
        }
        return false;
    }
    public function saveProd(Request $req)
    {

        if ($image = $req->file('prodimage') and $this->imgIsValid($image)) {

            $path = $image->store('/public/'.$req->user()->id);

            //dd('/upload/'.$req->user()->id, $image);
            //$path = Storage::disk('public')->put('//'.$req->user()->id, $req->file('prodimage') );
            //dd(Storage::url($req->$path));
        } else {
            $path = NULL;
        }
        Product::create ([

            'name' => trim(htmlspecialchars($req->get('name'))),
            'description' => trim(htmlspecialchars($req->get('description'))),
            'class_id' => $req->get('class_id'),
            'image' => $path

        ]);


        //return $this->showTable();
        return redirect('/table');
    }
    public function addProdPage()
    {
        $classes = Product::all();
        return view('prodlist.addprodpage', compact('classes'));


    }
    public function editProd(Request $req)
    {
        //$prod = DB::table('products')->join('classlist', 'products.class_id', '=', 'classlist.class_id')->select('products.id', 'products.name', 'products.description', 'products.image', 'classlist.class_name')->where('products.id', '=', $req->id)->get();
        $prod = App\Product::find($req->id);
        $classes = App\Classlist::all();
        //$classes = Product::find();
        return view('prodlist.editprodpage', compact('prod','classes'));

    }
    public function saveEdited(Request $req)
    {
        //$prod = App\Product::find($req->id);

        if ($image = $req->file('prodimage') and $this->imgIsValid($image)) {
            $path = $image->store('/public/'.$req->user()->id);
            //$old_img = App\Product::find($req->id);
            $old_img = Product::where('id', '=', $req->id)->first()->image;
            Product::where('id', '=', $req->id)->update(['image' => $path]);
            if(Storage::exists($old_img)) {
                Storage::delete($old_img);
            }

        }

        App\Product::where('id', '=', $req->id)->update([
            'name' => trim(htmlspecialchars($req->name)),
            'description' => trim(htmlspecialchars($req->description)),
            'class_id' => $req->class_id
            ]);


        return redirect('table');
    }

}
