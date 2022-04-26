
var cursos = [
    {'id' : '1','curso' : 'Administração'},
    {'id' : '2','curso' : 'Administração Pública e Social'},
    {'id' : '3','curso' : 'Agronomia'},
    {'id' : '4','curso' : 'Análise e Desenvolvimento de Sistemas'},
    {'id' : '5','curso' : 'Arquitetura e Urbanismo'},
    {'id' : '6','curso' : 'Arquivologia'},

    {'id' : '7','curso' : 'Artes Visuais'},
    {'id' : '8','curso' : 'Biblioteconomia'},
    {'id' : '9','curso' : 'Arquitetura e Urbanismo'},
    {'id' : '10','curso' : 'Biologia'},
    {'id' : '11','curso' : 'Biomedicina'},
    {'id' : '12','curso' : 'Ciência da Computação'},
    {'id' : '13','curso' : 'Ciências Contábeis'},
    {'id' : '14','curso' : 'Ciências Econômicas'},
    {'id' : '15','curso' : 'Ensino Médio'},

    {'id' : '16','curso' : 'Técnico em Informática'},
    {'id' : '17','curso' : 'Técnico em Contabilidade'},
    {'id' : '18','curso' : 'Técnico em Meio Ambiente'},

    ]


$(document).ready(function() {

    cursos.forEach(item => {
        $(".ulcurso").append(`
            <li>
                <label>
                    <input data-id="0" class="item-option" name="curso[]" value="${item.curso}" type="checkbox">${item.curso}</label></li> `
        );
    });

    $("body").on("click", ".re-order-filter", function() {
       $('.select-all-option').prop('checked', false);
       let action = $(this).attr('data-action'),
            list_elements = [];
       $('.item-option').each(function(index) {
            list_elements.push({
                name : $(this).val(),
                id : $(this).attr('data-id'),
            });
       });
       if ( action == "asc" ) {
           list_elements = list_elements.sort((a, b) => {
               if (a.name < b.name) return -1
               return a.name > b.name ? 1 : 0
           });
       }
       else {
           list_elements = list_elements.sort((a, b) => {
               if (a.name < b.name) return -1
               return a.name > b.name ? 1 : 0
           }).reverse();
       }
       $('.container-elements ul').html('');
       for ( let item = 0; item < list_elements.length; item++ ) {
           $('.container-elements ul').append(function() {
               let html = '';
               html = '<li><label><input data-id="'+(list_elements[item].id)+'" class="item-option" value="'+(list_elements[item].name)+'" type="checkbox">'+(list_elements[item].name)+'</label></li>';
               return html;
           });
       }
    });
    $("body").on("keyup", ".search-button3", function() {
        let search_content = $('.search-button3').val().trim().toLowerCase();
        if ( search_content.length > 0 ) {
            $('.item-option').each(function(index) {
                let content = $(this).val().toLowerCase(),
                    element = $(this);
                element.parent('label').parent('li').hide();
                if ( content.indexOf(search_content) >= 0 ) {
                    element.parent('label').parent('li').show();
                }
            });
        }
        else {
            $('.item-option').parent('label').parent('li').show();
        }
    });

    $("body").on("click", ".container-buttons .accept", function() {
        $('.dropdown-advanced3 .container-elements').removeClass('opened');
        $('.dropdown-advanced3 .container-buttons').removeClass('opened');

        $('.dropdown-advanced3 .container-elements').addClass('closed');
        $('.dropdown-advanced3 .container-buttons').addClass('closed');

        $('.options-selected span').html('('+($('.item-option:checked').length)+') seleccionados');
        $('.search-button3').val("");
        $('.item-option').parent('label').parent('li').show();
    });

    $("body").on("click", ".container-buttons .cancel", function() {
        $('.dropdown-advanced3 .container-elements').removeClass('opened');
        $('.dropdown-advanced3 .container-buttons').removeClass('opened');

        $('.dropdown-advanced3 .container-elements').addClass('closed');
        $('.dropdown-advanced3 .container-buttons').addClass('closed');
        $('.search-button3').val("");
        $('.item-option').parent('label').parent('li').show();
    });

   $("body").on("change", ".select-all-option", function() {
        if ( $(this).is(':checked') ) {
            $('.item-option').prop('checked', true);
        }
        else {
            $('.item-option').prop('checked', false);
        }
   });
   $("body").on("click", ".dropdown-advanced-fire-action3", function() {
       if ( $('.dropdown-advanced3 .container-elements').hasClass('opened') ) {
           $('.dropdown-advanced3 .container-elements').removeClass('opened');
           $('.dropdown-advanced3 .container-buttons').removeClass('opened');

           $('.dropdown-advanced3 .container-elements').addClass('closed');
           $('.dropdown-advanced3 .container-buttons').addClass('closed');
       }
       else {
           $('.dropdown-advanced3 .container-elements').addClass('opened');
           $('.dropdown-advanced3 .container-buttons').addClass('opened');

           $('.dropdown-advanced3 .container-elements').removeClass('closed');
           $('.dropdown-advanced3 .container-buttons').removeClass('closed');
       }

   });
});
