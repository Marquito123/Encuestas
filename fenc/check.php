<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="Regional") {
        if(this.checked) $('#regional').val(this.value);
        else $('#regional').val("0");
    }
    if(this.id=="nacional") {
        if(this.checked) $('#id_nacional').val(this.value);
        else $('#id_nacional').val("");
    }
});
</script>
</head>
<body>
    <div class="col-md-6">
                    <input  type="checkbox" value="2" name="Regional" id="Regional">
                    Regional
                
          </div>
      <input type="text" name="Regional" class="form-control" id="regional">
    </div>
</body>
</html>