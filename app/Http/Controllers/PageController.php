<?php

namespace App\Http\Controllers;

use App\Mail\NewMail;
use App\Page;
use App\Video;
use App\Pagina;
use App\Fotografia;
use App\Slider;
use App\Orcamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource. FRONT END
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // Home
    {
      return view('home');
    }

    public function slider(){

      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $sliders = Slider::all();
      return view('index', ['sliders' => $sliders, 'shareComponent' => $shareComponent]); // Homepage with Carousel
    }

    public function sobre()
    {
      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $paginas = Pagina::all();
      //$paginas = Pagina::where('title','Sobre');
      return view('pages/sobre', ['paginas' => $paginas,  'shareComponent' => $shareComponent]); // pagina sobre

      //$pagina = Pagina::firstWhere("title", "sobre")->first();
      //return view('pages.sobre', ['pagina' => $pagina]); // pagina sobre
    }

    public function fotografias() // pagina fotografias
    {

      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');
      $paginas = Pagina::all();
      //$paginas = Pagina::where('title','fotografias');
      $fotografias = Fotografia::orderBy('order', 'asc')->paginate(10);
       return view('pages/fotografias', ['fotografias' => $fotografias, 'paginas' => $paginas, 'shareComponent' => $shareComponent]);
    }

    public function videos()  // pagina videos
    {
      // $videos = Video::orderBy('category_id', 'asc')->get();
      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $paginas = Pagina::all();
      //$paginas = Pagina::where('title','videos');
      $videos = Video::select("*")
      ->where("category_id", 2)
      ->orderBy("order", "asc")->get();

       return view('pages/videos', ['videos' => $videos, 'paginas' => $paginas, 'shareComponent' => $shareComponent]);
    }

    public function corporate()   // pagina corporate
    {

      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      //$paginas = Pagina::all();
      $pagina = Pagina::where('title','corporate')->first();
      $videos = Video::select("*")
      ->where("category_id",5)
      ->orderBy("order", "asc")->get();

       return view('pages/corporate', ['videos' => $videos, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function precos()   // pagina preços
    {
      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      //$paginas = Pagina::all();
      $pagina = Pagina::where('title','precos')->first();
       return view('pages/precos', [ 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }


    public function cookies()   // pagina cookies
    {
      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $paginas = Pagina::all();
      //$paginas = Pagina::where('title','politica de cookies');
       return view('pages/politica-de-cookies', [  'paginas' => $paginas, 'shareComponent' => $shareComponent]);
    }

    public function privacidade()   // pagina preços
    {
      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $paginas = Pagina::where('title','Politica de privacidade');
       return view('pages/politica-de-privacidade', [  'paginas' => $paginas, 'shareComponent' => $shareComponent]);
    }


   public function contactos()   // pagina contactos
    {
      $shareComponent = \Share::page('http://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','contactos')->first();

       return view('pages/contactos',  ['pagina' => $pagina, 'shareComponent' => $shareComponent]);

    }

    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:9',
            'msg' => 'required'
        ],

        [
            'name.required'     => 'O nome é de preenchimento obrigatório',
            'email.required'    => 'O email é de preechimento obrigatório',
            'email.email'       => 'Introduza um email válido',
            'phone.required'    => 'O número de telefone é de preechimento obrigatório',
            'phone.digits'      => 'Introduza um número de telefone válido',
            'msg'               => 'Deixe-nos a sua menssagem para o podermos esclarecer'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg

        );
        $subject = 'Pedido de Contacto';
        Mail::to('andreteixeira.csn@gmail.com')->send(new NewMail($data,$subject));
        return back()->with('success', 'Email enviado com sucesso! Entraremos em contacto em breve!');

    }
}
