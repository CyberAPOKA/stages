
var bairros = [
    {'id' : '1','bairro' : 'Centro'},
    {'id' : '2','bairro' : 'Scharlau'},
    {'id' : '3','bairro' : 'Feitoria'},
    {'id' : '4','bairro' : 'Morro do Espelho'},
    {'id' : '5','bairro' : 'Campina'},
    {'id' : '6','bairro' : 'Cristo Rei'},

    {'id' : '7','bairro' : 'Jardim América'},
    {'id' : '8','bairro' : 'Rio dos Sinos'},
    {'id' : '9','bairro' : 'São Miguel'},
    {'id' : '10','bairro' : 'Santo André'},
    {'id' : '11','bairro' : 'Pinheiro'},
    {'id' : '12','bairro' : 'Santos Dumont'},
    {'id' : '13','bairro' : 'Arroio da Manteiga'},
    {'id' : '14','bairro' : 'Rio Branco'},
    {'id' : '15','bairro' : 'São José'},

    {'id' : '16','bairro' : 'Santa Teresa'},
    {'id' : '17','bairro' : 'Padre Reus'},
    {'id' : '18','bairro' : 'Campestre'},
    {'id' : '19','bairro' : 'Duque de Caxias'},
    {'id' : '20','bairro' : 'Vicentina'},
    {'id' : '21','bairro' : 'São João Batista'},
    {'id' : '22','bairro' : 'Fião'},
    {'id' : '23','bairro' : 'Boa Vista'},
    {'id' : '24','bairro' : 'Fazenda São Borja'},
    {'id' : '25','bairro' : 'Loteamento Parque Recreio'},

    ]


$(document).ready(function() {

    bairros.forEach(item => {
        $(".ulbairro").append(`
            <li>
                <label>
                    <input data-id="0" class="item-option" name="bairro[]" value="${item.bairro}" type="checkbox">${item.bairro}</label></li> `
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
    $("body").on("keyup", ".search-button2", function() {
        let search_content = $('.search-button2').val().trim().toLowerCase();
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
        $('.dropdown-advanced2 .container-elements').removeClass('opened');
        $('.dropdown-advanced2 .container-buttons').removeClass('opened');

        $('.dropdown-advanced2 .container-elements').addClass('closed');
        $('.dropdown-advanced2 .container-buttons').addClass('closed');

        $('.options-selected span').html('('+($('.item-option:checked').length)+') seleccionados');
        $('.search-button2').val("");
        $('.item-option').parent('label').parent('li').show();
    });

    $("body").on("click", ".container-buttons .cancel", function() {
        $('.dropdown-advanced2 .container-elements').removeClass('opened');
        $('.dropdown-advanced2 .container-buttons').removeClass('opened');

        $('.dropdown-advanced2 .container-elements').addClass('closed');
        $('.dropdown-advanced2 .container-buttons').addClass('closed');
        $('.search-button2').val("");
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
   $("body").on("click", ".dropdown-advanced-fire-action2", function() {
       if ( $('.dropdown-advanced2 .container-elements').hasClass('opened') ) {
           $('.dropdown-advanced2 .container-elements').removeClass('opened');
           $('.dropdown-advanced2 .container-buttons').removeClass('opened');

           $('.dropdown-advanced2 .container-elements').addClass('closed');
           $('.dropdown-advanced2 .container-buttons').addClass('closed');
       }
       else {
           $('.dropdown-advanced2 .container-elements').addClass('opened');
           $('.dropdown-advanced2 .container-buttons').addClass('opened');

           $('.dropdown-advanced2 .container-elements').removeClass('closed');
           $('.dropdown-advanced2 .container-buttons').removeClass('closed');
       }

   });
});

