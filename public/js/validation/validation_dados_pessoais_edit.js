$.validator.setDefaults({
    ignore: []
});


jQuery.validator.addMethod("nameValidation", function(value, element){
regex = new RegExp('^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$');
return regex.test($('#name').val());
}, "O nome não pode ter números ou caracteres inválidos.")




jQuery.validator.addMethod("data_nascimentoValidation", function(value, element){
    var data = document.getElementById("data_nascimento").value; // pega o valor do input
   data = data.replace(/\//g, "-"); // substitui eventuais barras (ex. IE) "/" por hífen "-"
   var data_array = data.split("-"); // quebra a data em array

   // para o IE onde será inserido no formato dd/MM/yyyy
   if(data_array[0].length != 4){
      data = data_array[2]+"-"+data_array[1]+"-"+data_array[0]; // remonto a data no formato yyyy/MM/dd
   }

   // comparo as datas e calculo a idade
   var hoje = new Date();
   var nasc  = new Date(data);
   var idade = hoje.getFullYear() - nasc.getFullYear();
   var m = hoje.getMonth() - nasc.getMonth();
   if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;

   if(idade >= 10 && idade <= 100){
      return true;
   }

   return false;

}, "Data de nascimento inválida")

jQuery.validator.addMethod("cepValidation", function(value, element) {

    return this.optional(element) || /^[0-9]{5}-[0-9]{3}$/.test(value);
  }, "Por favor, digite um CEP válido");

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

if($('#form_dados_pessoais'). length > 0){
$('#form_dados_pessoais').validate({
    rules:{
        name:{
            minlength: 3,
            maxlength: 50,
            nameValidation: true,
            fullNameValidation: true,
        },
        cpf: {
        minlength: 14,
        maxlength: 14,
        cpf: true
    },
        birthday: {
            data_nascimentoValidation: true
        },
        postal_code: {
            cepValidation: true
        },

    },
    messages:{
        cpf:{
            minlength: 'Insira 14 caracteres',
        },
    }
})
}
