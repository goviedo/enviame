function DiasFactory() {
  this.calcularDias = function(kilometros) {
    if(kilometros < 100) {
      return MismoDia(kilometros);
    } else if(kilometros >= 100 && kilometros <300) {
      return DiaUno(kilometros);
    } else if(kilometros>=300 && kilometros <400) {
      return DiaDos(kilometros);
    } else if(kilometros >= 400 && kilometros  < 500) {
      return DiaTres(kilometros);
    } else if(kilometros >=500) {
      return DiasX(kilometros);
    }
  }

  function Dia(kilometros, dias) {
    this.Kilometros = kilometros;
    this.Dias = dias;
  }

  function MismoDia(kilometros) {
    return new Dia(kilometros, 0);
  }

  function DiaUno(kilometros) {
    return new Dia(kilometros,1); 
  }
  
  function DiaDos(kilometros) {
    return new Dia(kilometros,2); 
  }

  function DiaTres(kilometros) {
    return new Dia(kilometros,3); 
  }

  function DiasX(kilometros) {
    let d = parseInt(kilometros/100);
    return new Dia(kilometros,d); 
  }
}


function numerosAleatorios() {
  let kilometrosAleatorios = [];
  let cantidadNumeros = 15;

  for(let i=0;i<=cantidadNumeros;i++) {
    kilometrosAleatorios.push(Math.floor(Math.random()*2000));
  }

  return kilometrosAleatorios;
}

var fact = new DiasFactory();
var d = numerosAleatorios();

d.forEach((k)=>{
  var a = fact.calcularDias(k); 
  if(a.Kilometros<100) {
    console.log('Se entrega en el mismo día la entrega de ' + a.Kilometros + ' kilometros');
  } else {
    console.log('Se demora ' + a.Dias + ' días en la entrega de ' + a.Kilometros + ' kilometros');
  }
});


