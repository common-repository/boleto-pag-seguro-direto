<script language="JavaScript" type="text/javascript">
 /* Mscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function mnum(v){
    v=v.replace(/\D/g,"")                    
    return v
}

function mcep(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/^(\d{5})(\d)/,"$1$2")         
    return v
}
function mcpf(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/^(\d{5})(\d)/,"$1$2")         
    return v
}

function mdata(v){
    v=v.replace(/\D/g,"");                    
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}

function mvalor(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");
        
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");
    return v;
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que n�o � d�gito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca par�nteses em volta dos dois primeiros d�gitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca h�fen entre o quarto e o quinto d�gitos
    return v;
}

//-->
</script>