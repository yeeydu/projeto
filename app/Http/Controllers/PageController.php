<?php

namespace App\Http\Controllers;

use App\Mail\NewMail;
use App\Pack;
use App\Page;
use App\Video;
use App\Pagina;
use App\Fotografia;
use App\Slider;
use App\Orcamento;
use App\Testimonial;
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

      $shareComponent = \Share::page('https://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $sliders = Slider::all();
      $testimonials = Testimonial::all();
      $fotografias = Fotografia::orderBy('order', 'desc')->paginate(6);
      return view('index', ['sliders' => $sliders, 'fotografias' => $fotografias, 'testimonials' => $testimonials, 'shareComponent' => $shareComponent]); // Homepage with Carousel
    }

    

    public function sobre()
    {
      $shareComponent = \Share::Page('https://diogopinto.pt', 'Sobre')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','Sobre')->first();
      return view('pages/sobre', ['pagina' => $pagina,  'shareComponent' => $shareComponent]); // pagina sobre
    }

    public function fotografias() // pagina fotografias
    {

      $shareComponent = \Share::page('https://diogopinto.pt', 'Fotografia')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','fotografias')->first();
      $fotografias = Fotografia::orderBy('order', 'asc')->paginate(10);
       return view('pages/fotografias', ['fotografias' => $fotografias, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }


    public function videos()  // pagina videos
    {
      // $videos = Video::orderBy('category_id', 'asc')->get();
      $shareComponent = \Share::page('https://diogopinto.pt', 'Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','videos')->first();
      $videos = Video::select("*")
      ->where("category_id", 2)
      ->orderBy("order", "asc")->get();

       return view('pages/videos', ['videos' => $videos, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function corporate()   // pagina corporate
    {

      $shareComponent = \Share::page('https://diogopinto.pt', 'Fotografia & Video Corporate')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','corporate')->first();
      $videos = Video::select("*")
      ->where("category_id", 5)
      ->orderBy("order", "asc")->get();

       return view('pages/corporate', ['videos' => $videos, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function precos()   // pagina preços
    {
      $shareComponent = \Share::page('https://diogopinto.pt', 'Fotografia & Video Preços')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','precos')->first();
      $packs =Pack::where('is_active','1')->orderBy('order', 'asc')->paginate(10);
       return view('pages/precos', [ 'pagina' => $pagina, 'shareComponent' => $shareComponent, 'packs' => $packs]);
    }

    public function packShow(Pack $pack){

        $pagina = Pagina::where('title','precos')->first();
        return view('pages/pack-show', [ 'pagina' => $pagina, 'pack' => $pack]);
    }


    public function cookies()   // pagina cookies
    {
      $shareComponent = \Share::page('https://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');


      $pagina = Pagina::where('title','politica de cookies')->first();
       return view('pages/politica-de-cookies', [  'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function privacidade()   // pagina preços
    {
      $shareComponent = \Share::page('https://diogopinto.pt', 'Fotografia & Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('title','Politica de privacidade')->first();
       return view('pages/politica-de-privacidade', [  'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }


   public function contactos()   // pagina contactos
    {
      $shareComponent = \Share::page('https://diogopinto.pt', 'Contactos')
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
