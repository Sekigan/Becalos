
document.getElementById("h").addEventListener("click", ocultar_buscador);
document.getElementById("f4").addEventListener("click", ocultar_buscador);

function ocultar_buscador(){

    $("#search").hide()
	busca.style.width = 0;

}

var consulta = $("#searchTable").DataTable()
busca = document.getElementById("inputBusqueda");
$("#inputBusqueda").keyup(function(){
	consulta.search($(this).val()).draw();

	

	if ($("#inputBusqueda").val() == ""){
		$("header2").css({
			"height": "0px",
			"background": "none"
		})

		$("#search").hide()
		busca.style.width = 0;
	} else {
		$("#search").fadeIn(300);
		busca.style.width = "290px";
	}
})