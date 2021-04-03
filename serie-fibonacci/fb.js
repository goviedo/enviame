fib = function(numMax){
    for(var fibArray = [0,1], i=0,j=1,k=0; k<numMax;i=j,j=x,k++ ){
        x=i+j;
        fibArray.push(x);
//      console.log(x);
    }
    return fibArray;
}

// Cantidad de fibonacci a buscar
fibArray = fib(1000);

divisores = [];
candidatos = [];
let a = '';
for(j=0;j<=fibArray.length;j++) {
  let i = 0;
  let n = fibArray[j];
  for(i=1;i<=n;i++) {
    let esDivisible = n%i==0?true:false;

    if(esDivisible) {
      divisores.push(i);
    }
  }
  a = n+':'+divisores.join([separator = ',']);
  if(divisores.length>=1000) {
    candidatos.push(a);
    console.log('encontre con '+divisores.length+' divisores');
    break;
  }
  divisores = [];
  a = '';
};

console.dir(candidatos);



