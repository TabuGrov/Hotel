<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="#">
     
        <select name="elejir_comida" onchange="mostrarValor(this.value);">
 
            <option value="1">Pizza</option>
            <option value="17">Hamburguesa</option>
            <option value="23">Kebab</option>
        
        </select>
        
        
        
        <input type="text" name="comida" id="comida" value="" />
    
    </form>
<script>
    var mostrarValor = function(x){
        if (x==1) {
            document.getElementById('comida').value=x;
        }
        else if (x==17) {
            document.getElementById('comida').value=x;
        }
        else{ document.getElementById('comida').value='No seleccionado';}
        }
        
</script>
</body>
</html>