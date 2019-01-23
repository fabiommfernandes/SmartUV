$(document).ready(function(){
 
    $.ajax({
        url:"buscarDados.php",
        type: "GET",
        success: function(data){
                    
        var horas = [];
        var dados = [];
            
        for(var i in data){
            horas.push(data[i].created_at);
            dados.push(data[i].idUV_Praia);
            
            
        }
     
            
        var chartdata = {
            labels: horas,
            datasets:[
                {
                label: "Indice UV",
                fill: false,
                responsive: true,
                lineTension: 0,
                backgroundColor:"rgba(59,80,150,0.75)",
                borderColor: "rgba(59,80,150,1)",
                pointHoverBackgroundColor: "rgba(200,80,150,1)",
                pointHoverBorderColor: "rgba(20,200,150,1)",
                data: dados
                }
            ]
        };
        
        var ctx = $("#mycanvas");
        var LineGraph = new Chart(ctx, {
            type: 'line',
            data: chartdata
        });
            
    },
           error: function(data){
        
    }
        
    });
    
    
    
    
    
    
    
    
    
});