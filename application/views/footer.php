       
</body>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>assets/js/mascaras_jquery.js" type="text/javascript"></script> 
  <script src="<?php echo base_url();?>assets/js/mascaras.js" type="text/javascript"></script>  
  <script type="text/javascript">
    $(document).ready(function(e) {
        $("#datepicker").datepicker({
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            dateFormat: 'dd/mm/yy',
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    });
</script>
  <script>
    $('input').keyup(function(e) {            
      var code = e.keyCode || e.which;
      if(code == 109 || code == 189) { //Enter keycode
         //Do something
          var valor = $(this).val();
        $(this).val(valor.replace(/[-]/g, ''))
    }
  });

$('input').change(function(e) {
   var valor = $(this).val();
   $(this).val(valor.replace(/[-]/g, ''))
});
  </script>
  <script type="text/javascript">
        $(document).ready(function () {
          jQuery("#iCpf").mask("999.999.999-99");
          jQuery("#iCel").mask("(99)99999-9999");
          jQuery("#iTel").mask("(99)9999-9999");
          jQuery("#iRG").mask("99.999.999-99");
          jQuery("#iCEP").mask("99.999-999");
        });
  </script>
</html>  