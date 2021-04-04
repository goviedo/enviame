function palindrome(str) {
  var reversa = str.toLowerCase().split("").reverse().join("");
  return reversa === str.toLowerCase();
}

var palabra = process.argv.slice(2)[0];
console.log(palabra);

let si = palindrome(palabra);

if(si) {
  console.log('La palabra ' + palabra + ' es palindrome');
} else {
  console.log('La palabra ' + palabra + ' no es palindrome');
}

// NOTA: Si tuvieramos las palabras separadas, podriamos aplicar
// este algoritmos para determinar cuales son las palabras palindromes.
