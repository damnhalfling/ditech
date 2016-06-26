
$(".conteudo-editar .editControlers a.link-conteudo").click(function(e){
	e.preventDefault();
        var obj = $(e.target).parents(".conteudo-editar")
	var modulo = obj.parents(".conteudo-container");

	parent.liveEditable("conteudo", obj, modulo);

});


$(".linha-editar .editControlers a.link-linha").click(function(e){
	e.preventDefault();
        var obj = $(e.target).parents(".linha-editar");
	var modulo = obj.parents(".linha-container");

	parent.liveEditable("linha", obj, modulo);

});
