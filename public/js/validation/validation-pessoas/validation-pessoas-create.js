$.validator.setDefaults({
    ignore: []
});

jQuery.validator.addMethod("nomeValidation", function(value, element){
    regex = new RegExp('^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$');
    return regex.test($('#nome').val());
}, "O nome não pode ter números ou caracteres inválidos")

jQuery.validator.addMethod("datadenascimentoValidation", function(value, element){
    regex = new RegExp('^[0-3][0-9]\/[0-3][0-9]\/(?:[0-9]{2})?[0-9]{2}$');
    return regex.test($('#datadenascimento').val());
}, "Data de nascimento inválida")

jQuery.validator.addMethod("uniqueCPFValidation", function(value, element){
    var cpf = $('#cpf').val();
    if(cpf != ''){
        var valor;
        $.ajax({
            async: false,
            type: "GET",
            url:'/cpf/ajax',
            dataType: 'json',
            data: {cpf: cpf}
        }).done(function (data){
            valor = data;
        })
        return valor;
    }
    return true;
}, "CPF já registrado no sistema.")

jQuery.validator.addMethod("cpf", function (value, element) {
    value = jQuery.trim(value);
    if(value != ''){
        value = value.replace('.', '');
        value = value.replace('.', '');
        cpf = value.replace('-', '');
        while (cpf.length < 11) cpf = "0" + cpf;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (i = 0; i < 11; i++) {
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
        b = 0;
        c = 11;
        for (y = 0; y < 10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
        return true;
    }
    return true;
}, "Informe um CPF válido.");

jQuery.validator.addMethod("uniqueRGValidation", function(value, element){
    var rg = $('#rg').val();
    if(rg != ''){
        var valor;
        $.ajax({
            async: false,
            type: "GET",
            url:'/rg/ajax',
            dataType: 'json',
            data: {rg: rg}
        }).done(function (data){
            valor = data;
        })
        return valor;
    }
    return true;
}, "RG já registrado no sistema.")

jQuery.validator.addMethod("ruaValidation", function(value, element){
    var valor = $('#rua').val();
    if(valor != ''){
        regex = new RegExp('^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$');
        return regex.test($('#rua').val());
    }
    else{
        return true;
    }
}, "A rua não pode ter números ou caracteres inválidos")

jQuery.validator.addMethod("paiValidation", function(value, element){
    var valor = $('#nomepai').val();
    if(valor != ''){
        regex = new RegExp('^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$');
        return regex.test($('#nomepai').val());
    }
    else{
        return true;
    }
}, "O nome do pai não pode ter números ou caracteres inválidos")

jQuery.validator.addMethod("maeValidation", function(value, element){
    var valor = $('#nomemae').val();
    if(valor != ''){
        regex = new RegExp('^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$');
        return regex.test($('#nomemae').val());
    }
    else{
        return true;
    }
}, "O nome da mãe não pode ter números ou caracteres inválidos")

function apagar_anexos(){
    document.getElementById('anexos').value = '';
    document.getElementById('anexos').value = '';
    }
$('#anexos').on('change', function() {
    var numb = $(this)[0].files[0].size / 1300 / 1300;
    numb = numb.toFixed(2);
    if (numb > 2) {
        apagar_anexos();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'O arquivo deve possuir no máximo 3 MegaBytes.',
          });

    }
    });
    function change_anexos(){
        string = document.getElementById("anexos").value.split('.');
        if(string[string.length-1] != 'pdf'){
            apagar_anexos();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Todos arquivos devem ser no formato PDF!',
              });

        }
        };


            $('#anexos').on('change', function() {
                if(document.getElementById("anexos").files.length > 5){
                    apagar_anexos();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'O número máximo de arquivos por candidato é 5!',
                      });
                 }

                });

               /* $('#anexos').change(function(){
                    var files = $(this)[0].files;
                    if(files.length > 2){
                        alert("you can select max 10 files.");
                    }else{
                        alert("correct, you have selected less than 10 files");
                    }
                });
                */

$(document).ready(function() {
    $('input[type=radio][name=opcao]').change(function() {
        $('#errorTxt1').hide();
        $('#opcaovalidation').val('1');
    });

    $("#formInscricao").validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",

        rules: {
            nome: {
                required: true,
                minlength: 3,
                maxlength: 50,
                nomeValidation: true
            },
            nomesocial: {
                required: true,
                minlength: 3,
                maxlength: 50,
                nomesocialValidation: true
            },
            cpf: {
                required: true,
                minlength: 14,
                maxlength: 14,

                cpf: true
            },

            rg: {
                required: true,
                minlength: 6,
                maxlength: 13,

            },
            datadenascimento: {
                required: true,
                datadenascimentoValidation: true
            },
            nomepai: {
                required: true,
                paiValidation: true
            },
            nomemae: {
                required: true,
                maeValidation: true
            },

            rua: {
                required: true,
            },
            numero: {
                required: true,
            },
            complemento: {
                required: true,
            },
            cep: {
                required: true,
                minlength: 9,
                maxlength: 9,
            },
            bairro: {
                required: true,
            },
            cidade: {
                required: true,
            },
            email: {
                required: true,
            },
            telefoneresidencial: {
                required: true,
            },
            telefonecelular: {
                required: true,
            },
            escolaridade: {
                required: true,
            },
            curso: {
                required: true,
            },
            semestre: {
                required: true,
            },
            instituicao: {
                required: true,
            },
            turno: {
                required: true,
            },
            cursosrealizados: {
                required: true,
            },
            outrosconhecimentos: {
                required: true,
            },
            jafoiestagiario: {
                required: true,
            },

            opcao: 'required',
        },

    });
})
