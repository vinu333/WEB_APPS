function coloravg(a,b){
   var r = Math.floor(((parseInt("0x"+a.slice(1,3))+parseInt("0x"+b.slice(1,3)))/2));
   var g = Math.floor(((parseInt("0x"+a.slice(3,5))+parseInt("0x"+b.slice(3,5)))/2));
   var bl = Math.floor(((parseInt("0x"+a.slice(5,7))+parseInt("0x"+b.slice(5,7)))/2));

   h1 = r.toString(16).padStart(2,"0");
   h2 = g.toString(16).padStart(2,"0");
   h3 = bl.toString(16).padStart(2,"0");
    y = "#"+h1+h2+h3;

   return y;
}
console.log(coloravg("#11111A","#333333"));
