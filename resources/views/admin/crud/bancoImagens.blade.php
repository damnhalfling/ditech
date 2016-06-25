@if($imagens)
<ul id="bancoImagens"><li><a href="0">Nenhuma Foto</a></li>
    @foreach($imagens as $imagem)
        <li><a href="{{$imagem->id}}"> {{Html::image($imagem->imagem,null,["width"=>"100","height"=>"100"])}}   </a></li>
    @endforeach
</ul>
{!! $imagens->links() !!}
@endif

