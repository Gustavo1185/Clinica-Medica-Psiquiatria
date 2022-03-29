
jQuery.validator.addMethod("accept", function(value, element, param) {
    return value.match(new RegExp("." + param + "$"));
  });


$(document).ready(function () {
    $("#formCadastrar").validate({
        rules: {
            cpf:{
                required: true,
                cpfBR: true

            },
            nome:{
                required: true,
                accept: "[a-zA-Z]+" 
                
            },
            RG:{
                required: true
            },
            orgao_emissor:{
                required: true
            },
            data_emissao:{
                required: true
            },
            sexo:{
                required: true
            },
            data_nascimento:{
                required: true
            },
            logradouro:{
                required: true
            },
            numero:{
                required: true
            },
            CEP:{
                required: true,
                postalcodeBR: true
            },
            cidade:{
                required: true
            },
            estado:{
                required: true
            },
            telefone:{
                required: true
            },
            celular:{

            },
            celular2:{

            },
            cod_funcionario:{
                required: true
            },
            email:{
                required: true
            },
            usuario:{
                required: true
            },
            senha:{
                required: true
            },
            repetir_senha:{
                required: true
            },
            crm:{
                required: true
            },
            especialidade:{
                required: true,
                accept: "[a-zA-Z]+" 
                
            }

        }
        
    })
})

$().ready(function() {
	setTimeout(function () {
		$('#msg').hide(); 
	}, 5000); 
});



function HabilDesab(){  
    if(document.getElementById('defaultCheck1').checked == true){ 	 
       document.getElementById('enviar').disabled = ""  }  
    if(document.getElementById('btnhab').checked == false){ 	
       document.getElementById('enviar').disabled = "disabled"  }	
}



$(document).ready(function () {

    $("#buscar").validate({
        rules: {
            buscaF: {
                required: true
            },
            valorF:{
                required: true 
            },
            buscaE:{
                required: true 
            },
            crm1:{
                required: true 
            }

        }
    });
    
    $('#buscaF').on('change', function() {
        if (document.getElementById("buscaF").selectedIndex == 1) {
            $("#formGroupExampleInput").mask("000.000.000-00")
           
        }else if (document.getElementById("buscaF").selectedIndex == 2) {
            $("#formGroupExampleInput").mask("#", {
                maxlength: false,
                translation: {
                    '#': {pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/, recursive: true}
                }
            });
            
        }
    });
    $('#buscaE').on('change', function() {
        if (document.getElementById("buscaE").selectedIndex == 1) {
            $("#formGroupExampleInput").mask("000000000000000")
            
        }else if (document.getElementById("buscaE").selectedIndex == 2) {
            $("#formGroupExampleInput").mask("#", {
                maxlength: false,
                translation: {
                    '#': {pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/, recursive: true}
                }
            });
           
        }
    });

    $('#crm1').on('change', function() {
        if (document.getElementById("crm1").selectedIndex == 1) {
            $("#formGroupExampleInput").mask("SS-0000000000")
            
        }else if (document.getElementById("crm1").selectedIndex == 2) {
            $("#formGroupExampleInput").mask("#", {
                maxlength: false,
                translation: {
                    '#': {pattern: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/, recursive: true}
                }
            });
           
        }
    });

});

$("#checkTodos").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkTodos").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

var checkTodos = $("#checkTodos");
checkTodos.click(function () {
  if ( $(this).is(':checked') ){
    $('input:checkbox').prop("checked", true);
    
  }else{
    $('input:checkbox').prop("checked", false);
    
  }
});



$('input[type=checkbox]').on('change', function () {
    var total = $('input[type=checkbox]:checked').length;
    if(total>1){
        $("#add").prop('disabled', true);
     }else{
        $("#add").prop('disabled', false);
     }
});
 
$(document).ready(function(){
	$('.btn-deletar').click(function(ev){
		if(!$('#confirmFalse').length){
			$('body').append('include "modal.php"');
		}
        $('#confirmTrue').on('click', function() {
            $('button[name="delete"').trigger('click')
        });

        $('#confirmFalse').modal({show: true});
		return false;
		
	});
});
$(document).ready(function(){
    $("#autoUpdate").css("display", "none");
    $('.form-check-input').change(function(){
        if(this.checked)
            $('#autoUpdate').fadeIn('slow');
        else
            $('#autoUpdate').fadeOut('slow');

    });
});
