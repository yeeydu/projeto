<?php

namespace App\Http\Controllers;

use App\Extra;
use App\Mail\NewMail;
use App\Pack;
use App\Page;
use App\Video;
use App\Pagina;
use App\Fotografia;
use App\Slider;
use App\Category;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\Share;

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

      $shareComponent = \Share::currentPage()
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $sliders = Slider::where('is_active','1')->get();
      $testimonials =Testimonial::where('is_active','1')->orderBy('id', 'desc')->paginate(10);
      $fotografias = Fotografia::where('is_active','1')->orderBy('order', 'desc')->paginate(6);
      return view('index', ['sliders' => $sliders, 'fotografias' => $fotografias, 'testimonials' => $testimonials, 'shareComponent' => $shareComponent]); // Homepage with Carousel
    }



    public function sobre()
    {
      $shareComponent = \Share::page('https://diogopinto.pt/sobre', 'Sou o Diogo um apaixonado pelas artes do cinema e o meu desejo era sem dúvida alguma abraçar a área do cinema. ')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','Sobre')->where('is_active','1')->first();
      return view('pages/sobre', ['pagina' => $pagina,  'shareComponent' => $shareComponent]); // pagina sobre
    }

    public function fotografias() // pagina fotografias
    {

      $shareComponent = \Share::page('https://diogopinto.pt/fotografias', 'Fotografia')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','fotografias')->where('is_active','1')->first();
      $fotografias = Fotografia::where('is_active','1')->orderBy('order', 'asc')->paginate(10);
       return view('pages/fotografias', ['fotografias' => $fotografias, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }


    public function videos()  // pagina videos
    {
      // $videos = Video::orderBy('category_id', 'asc')->get();
      $shareComponent = \Share::page('https://diogopinto.pt/videos', 'Video')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','videos')->where('is_active','1')->first();
      $videos = Video::select("*")
      ->where("category_id", 2)
      ->where('is_active','1')  
      ->orderBy("order", "asc")->get();

       return view('pages/videos', ['videos' => $videos, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function corporate()   // pagina corporate
    {

      $shareComponent = \Share::page('https://diogopinto.pt/corporate', 'Fotografia & Video Corporate')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','corporate')->where('is_active','1')->first();
      $videos = Video::select("*")
      ->where("category_id", 5)
      ->where('is_active','1')
      ->orderBy("order", "asc")->get();

       return view('pages/corporate', ['videos' => $videos, 'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function precos()   // pagina preços
    {
      $shareComponent = \Share::page('https://diogopinto.pt/precos', 'Packs de preços dos nossos serviços')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','precos')->where('is_active','1')->first();
      $packs =Pack::where('is_active','1')->orderBy('order', 'asc')->paginate(10);
       return view('pages/precos', [ 'pagina' => $pagina, 'shareComponent' => $shareComponent, 'packs' => $packs]);
    }

    public function packShow(Pack $pack){

      $shareComponent = \Share::page('https://diogopinto.pt/packs', 'Packas serviços de Fotografia & Video Preços')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

        $pagina = Pagina::where('page_name','precos')->first();
        $extras = Extra::where('is_active','1')->orderBy('order', 'asc')->get();
        return view('pages/pack-show', [ 'pagina' => $pagina, 'pack' => $pack, 'extras' => $extras]);
        
    }


    public function cookies()   // pagina cookies
    {
      $shareComponent = \Share::page('https://diogopinto.pt/politica-de-cookies', 'Politica de cookies')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');


      $pagina = Pagina::where('page_name','politica de cookies')->where('is_active','1')->first();
       return view('pages/politica-de-cookies', [  'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function privacidade()   // pagina privacidade
    {
      $shareComponent = \Share::page('https://diogopinto.pt/politica-de-privacidade', 'Politica de privacidade')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','Politica de privacidade')->where('is_active','1')->first();
       return view('pages/politica-de-privacidade', [  'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }

    public function faqs()   // pagina faqs
    {
      $shareComponent = \Share::page('https://diogopinto.pt/faqs', 'Frequently Asked Questions')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','faqs')->where('is_active','1')->first();
       return view('pages/faqs', [  'pagina' => $pagina, 'shareComponent' => $shareComponent]);
    }


   public function contactos()   // pagina contactos
    {
      $shareComponent = \Share::page('https://diogopinto.pt/contactos', 'Contactos')
      ->facebook('Diogo Pinto')
      ->twitter('Diogo Pinto')
      ->linkedin('Diogo Pinto')
      ->whatsapp('Diogo Pinto');

      $pagina = Pagina::where('page_name','contactos')->where('is_active','1')->first();

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

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg

        ];

//auth()->user()->email
        $subject = 'Pedido de Contacto';
        $viewSend = 'emails.contact-mail';
        Mail::to('andreteixeira.csn@gmail.com')->send(new NewMail($data,$subject,$viewSend));
        return back()->with('success', 'Email enviado com sucesso! Entraremos em contacto em breve!');

    }

    public function packSumbit(Request $request){
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:9',
            'msg'   => 'required',
            'date'  => 'required|after:yesterday'
        ],

            [
                'name.required'     => 'O nome é de preenchimento obrigatório',
                'email.required'    => 'O email é de preechimento obrigatório',
                'email.email'       => 'Introduza um email válido',
                'phone.required'    => 'O número de telefone é de preechimento obrigatório',
                'phone.digits'      => 'Introduza um número de telefone válido',
                'msg'               => 'Deixe-nos a sua menssagem para o podermos esclarecer',
                'date.required'     => 'Data do evento obrigatória',
                'date.after'        => 'Data do evento téra que ser posterior'
            ]);

    if($request->extra){
        $i = 0;
        $arr = [];
        foreach ($request->extra as $extraInfo){
            $extras = json_decode($extraInfo);
            $arr [$i] = [
                'name' => $extras->name,
                'price' => $extras->price
            ];
            $i++;
        }
    }else{
        $arr = 'Nenhum';
    }

        $data = [
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'msg'           => $request->msg,
            'deventDate'    => $request->date,
            'packName'      =>$request->packName,
            'total_price'   =>$request->total_price,
            'extras'        =>$arr
        ];
        //return view('emails.pack-info-mail')->with('data',$data);

        $subject = 'Pedido de Orçamento - '.$request->packName;
        $viewSend = 'emails.pack-info-mail';
        Mail::to('andreteixeira.csn@gmail.com')->send(new NewMail($data,$subject,$viewSend));
        return back()->with('success', 'Email enviado com sucesso! Entraremos em contacto em breve!');
    }
}
