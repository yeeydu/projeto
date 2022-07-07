<!DOCTYPE html>
<html>
<head>
    <title>Pack email</title>
</head>
<body>

<h1>Pedido de Orçamento - {{ $data['packName'] }}</h1>
<p>Nome do Pack escolhido: {{ $data['packName'] }}</p>
@if($data['extras'] == 'Nenhum')
    <p>Nenhum extra selecionado</p>
@else
    <h4>Extras Selecionados:</h4>
    @foreach($data['extras'] as $extra)
        <p>Nome do extra selecionado: {{ $extra['name'] }} preço: {{ $extra['price'] }} €</p>
    @endforeach
@endif

<p>Preço Total Selecionado: {{ $data['total_price'] }} €</p>
<p>Nome: {{ $data['name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
<p>NºTelemóvel: {{ $data['phone'] }}</p>
<p>Local do Evento: {{ $data['msg'] }}</p>
<p>Data do Evento: {{ $data['deventDate'] }}</p>


</body>
</html>

